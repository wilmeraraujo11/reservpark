<?php

namespace App\Http\Controllers;

use DB;
use App\Rol;
use App\Vehiculo;
use App\Ingreso_vehiculo;
use App\User;
use App\Reserva;
use App\Parqueadero_usuario;
use App\Cupo;
use App\Piso;
use Illuminate\Http\Request;
use validator;
use Response;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\input;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        //verifica si el usuario esta logueado
        $this->middleware('auth');
    }
    
    public function index()
    {
       //$roles = DB::table('rol')
       //->select('id','nombre')
        //->get();
       //dd($roles);
       $users =  User::all();
       //dd($users);
       $idusu = auth()->user()->id;
            $nombrepark = Parqueadero_usuario::all()->where('id_usuario', $idusu);
            foreach ($nombrepark as $np) {
                $idpark = $np->parqueadero->id;
            }
            $verpisos = Piso::All()->where('parqueadero_id', $idpark)->where('nombre', '1');
            foreach ($verpisos as $vp) {
                $vercupos = $vp->cupos;
            }
       return view('admin.admin', compact('users', 'nombrepark', 'vercupos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$roles = DB::table('rol')
        //->select('id','nombre')
        //->get();
        //dd($roles);
        //este return view('usuario.create');
        $model =  new User();
        $rols = Rol::all();
        return view('admin.form', compact('model','rols'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $idusu = auth()->user()->id;
        $nombrepark = Parqueadero_usuario::all()->where('id_usuario', $idusu);
        foreach ($nombrepark as $np) {
            $idpark = $np->parqueadero->id;
        }
        //para mostrar los cupos del parqueadero seccion derecha
        $verpisos = Piso::All()->where('parqueadero_id', $idpark)->where('nombre', '1');
        foreach ($verpisos as $vp) {
            $vercupos = $vp->cupos;
        }
        //fin para mostrar los cupos del parqueadero seccion derecha
        $idpark = $request->input('id_park');
        $no_doc = $request->get('no_documento');
        $placa = $request->get('placa');
        $fecha_in = date('Y-m-d', time());
        $hora_in = date('H:i:s', time());
        $usuarios = User::all()->where('no_documento', $no_doc);
        $vehiculos = Vehiculo::all()->where('placa', $placa);
        $pisosPark = Piso::all()->where('parqueadero_id', $idpark);

        //datos si ya esta selecciono piso y cupo en la tarjeta de ingreso
        $placaUsu = $request->input('placaUsu');
        $placaUsuarioI = Vehiculo::all()->where('placa', $placaUsu);
        $placaUsuR = $request->input('placaUsuR');
        $placaUsuarioR = Vehiculo::all()->where('placa', $placaUsuR);
        //fin datos si ya esta selecciono piso y cupo en la tarjeta de ingreso
        
        foreach ($usuarios as $key => $us) {
                    $usu = $us;
        }
                
        foreach ($vehiculos as $key => $ve) {
            $vehi = $ve;
        }

        if(count($vehiculos)>0){
            //obtener reserva segun la placa 
            $reservas = Reserva::all()->where('vehiculo_id', $vehi->id)
                                    ->where('fecha_fin','=','')
                                    ->where('hora_fin','=','');
            if(count($reservas)>0)
            {
                foreach ($reservas as $key => $r) {
                    $res = $r;
                }
                //obtener pisos segun el parqueadero y el piso reservado                                            
                $pisos = Piso::all()->where('parqueadero_id', $idpark)
                                    ->where('id', $res->piso_id);
                if (count($pisos)>0)
                {
                    foreach ($pisos as $key => $p) {
                            $piso = $p;
                    }                    
                    $cupos = $piso->cupos->where('id', $res->cupo_id);
                }                   

            }

            //obtener vehiculo ingresado segun la placa 
            $vehiculosIngresados = Ingreso_vehiculo::all()->where('vehiculo_id', $vehi->id)
                                                        ->where('fecha_salida', '=', '')
                                                        ->where('hora_salida', '=', '');
            if(count($vehiculosIngresados)>0)
            {
                foreach ($vehiculosIngresados as $key => $ve) {
                    $vi = $ve;
                }
                //obtener pisos segun el parqueadero y el piso ingresado                                            
                $pisosIngresoV = Piso::all()->where('parqueadero_id', $idpark)
                                    ->where('id', $vi->piso_id);
                if(count($pisosIngresoV)>0)
                {
                    foreach ($pisosIngresoV as $key => $p) {
                        $pi = $p;      
                    }                     
                    $cuposIngresoV = $pi->cupos->where('id', $vi->cupo_id);
                }                    
            }        
                                                                
        }

        if(count($usuarios) < 1 and count($vehiculos) < 1)
        {
            return redirect('/admin')->with('danger', ' * Cedula no registrada * Placa no registrada, Registrar usuario y vehiculo. :-(');
        }
        elseif(count($usuarios) < 1)
        {
            return redirect('/admin')->with('danger', ' * Cedula no registrada, Registrar usuario. :-(');

        }
        elseif(count($vehiculos) < 1)
        {
            return redirect('/admin')->with('danger', ' * Placa no registrada, Registrar vehiculo. :-(');    

        }
        elseif(count($reservas) >= 1)
        {
            
            if($res->parqueadero_id == $idpark)
            {   
                if($res->usuario_id == $usu->id)
                {
                    if(count($placaUsuarioR) < 1)
                    {
                        return view('superadmin.reservas.formVerReservasPark', compact('nombrepark', 'vercupos', 'reservas','usuarios','vehiculos', 'pisos', 'cupos'));
                    }
                    $idparkR = $request->input('id_park');
                    $idcupoR = $request->input('cupoR');
                    $idpisoR = $request->input('pisoR');

                    $ingreso_v = new Ingreso_vehiculo();
                    $ingreso_v->fecha_ingreso=$fecha_in;
                    $ingreso_v->hora_ingreso=$hora_in;
                    $ingreso_v->id_usuario = $usu->id;  
                    $ingreso_v->piso_id = $idpisoR;  
                    $ingreso_v->cupo_id = $idcupoR;  
                    $ingreso_v->id_parqueadero = $idparkR; 
                    $ingreso_v->vehiculo_id = $vehi->id;
                    $ingreso_v->save(); 
                    //se actualiza la tabla de reservas  se ingresa fecha y hora de finalizacion de la reserva
                    $updateR = Reserva::find($res->id);
                    $updateR -> fecha_fin = $fecha_in;
                    $updateR -> hora_fin = $hora_in;
                    $updateR -> update();
                    //se cambia el estado del cupo a reservado
                    $updateCupoI = Cupo::find($idcupoR);
                    $updateCupoI -> estado= '2';
                    $updateCupoI -> desc_estado= 'Ocupado';
                    $updateCupoI -> update();
                    return redirect('/admin')->with('success', ' *registro exitoso. :-)');

                }
                return redirect('/admin')->with('danger', ' *  la reserva pertenece a otro usuario  :-(');
            }
            return redirect('/admin')->with('danger', ' *  En el momento la placa cuenta con una reserva en otro parqueadero  :-(');
            
        }elseif(count($vehiculosIngresados) >= 1)
        {
            if($vi->id_parqueadero == $idpark)
            {
                if($vi->id_usuario == $usu->id)
                {
                    return view('superadmin.vehiculosIngresados.formVerIngresoVehiculosPark', compact('nombrepark', 'vehiculosIngresados', 'vercupos', 'usuarios', 'vehiculos', 'pisosIngresoV', 'cuposIngresoV'));
                }
                return redirect('/admin')->with('danger', ' *  El vehiculo fue ingresado por otro usuario  :-(');
                
            }
            return redirect('/admin')->with('danger', ' *  En el momento el vehiculo se encuentra haciendo uso del servicio en otro parqueadero  :-(');
        }
        else{
            if(count($placaUsuarioI) < 1)
            {
               return view('superadmin.vehiculosIngresados.registroIngresoVehiculosPark', compact('nombrepark', 'vercupos', 'usuarios', 'vehiculos', 'pisosIngresoV', 'cuposIngresoV', 'pisosPark'));
            }
            else{
                $idparkI = $request->input('id_parkI');
                $idcupoI = $request->input('cupoI');
                $idpisoI = $request->input('pisoI');

                $ingreso_v = new Ingreso_vehiculo();
                $ingreso_v->fecha_ingreso=$fecha_in;
                $ingreso_v->hora_ingreso=$hora_in;
                $ingreso_v->id_usuario = $usu->id;  
                $ingreso_v->piso_id = $idpisoI;  
                $ingreso_v->cupo_id = $idcupoI;  
                $ingreso_v->id_parqueadero = $idparkI; 
                $ingreso_v->vehiculo_id = $vehi->id;
                $ingreso_v->save(); 
                
                //se cambia el estado del cupo a reservado
                $updateCupoI = Cupo::find($idcupoI);
                $updateCupoI -> estado= '2';
                $updateCupoI -> desc_estado= 'Ocupado';
                $updateCupoI -> update();
                return redirect('/admin')->with('success', ' * El vehiculo fue ingresado satisfactoriamente. :-)');
            }          
             
        }
        
    }

    public function salidaVehiculo(Request $request){
        $fecha_in = date('Y-m-d', time());
        $hora_in = date('H:i:s', time());
        $placaS = $request->input('placaUsuR');
        $idcupoI = $request->input('idCupoI');
        $idvi = $request->input('idVehiculoI');
        $novedad = $request->input('novedad');

        $vehiculoI = Ingreso_vehiculo::find($idvi);
        $vehiculoI -> fecha_salida = $fecha_in;
        $vehiculoI -> hora_salida = $hora_in;
        $vehiculoI -> novedades = $novedad;
        $vehiculoI -> update();

        $updateCupoI = Cupo::find($idcupoI);
        $updateCupoI -> estado= '0';
        $updateCupoI -> desc_estado= 'Disponible';
        $updateCupoI -> update();


        return redirect('/admin')->with('success', ' *salida exitosa. :-)'.' vehiculo de placa '.$placaS);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id); 
        return view('admin.registroClientes', compact('user')); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return redirect('/admin')->with('success', ' * registro exitoso desde update. :-)');  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $users = User::find($id);
        $users->delete();
        return redirect('/admin')->with('msg','Se elimino satisfactoriamente'); 
    }
}
