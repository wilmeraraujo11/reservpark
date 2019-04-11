<?php

namespace App\Http\Controllers;

use DB;
use App\Reserva;
use App\User;
use App\Vehiculo;
use App\Ingreso_vehiculo;
use App\Piso;
use App\Cupo;
use App\Parqueadero;
use App\Parqueadero_usuario;
use App\Tipo_park;
use Illuminate\Http\Request;

class ReservasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipo_park = Tipo_park::all();
        $idusu = auth()->user()->id;
        $nombrepark = Parqueadero_usuario::all()->where('id_usuario', $idusu);
        foreach($nombrepark as $np){
            $id_park = $np->id_parqueadero;
        }
        $pisos = Piso::all()->where('parqueadero_id', $id_park);
        $reservas = Reserva::all()->where('parqueadero_id', $id_park)
                                ->where('fecha_fin','=','')
                                ->where('hora_fin','=','');
        return view('superadmin.reservas.registroReservasPark', compact('tipo_park', 'nombrepark', 'reservas','pisos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fecha_actual= date('Y-m-d', time());
        $hora_actual= date('H:i:s', time());
        $no_doc = $request->input('nodoc');
        $placa = $request->input('placa'); 
        $idpark = $request->input('id_park');
        $idpiso = $request->input('piso');
        $idcupo = $request->input('cupo');
        $usuarios = User::all()->where('no_documento', $no_doc);
        $vehiculos = Vehiculo::all()->where('placa', $placa);
        $pisos = Piso::all()->where('id', $idpiso);
        $cupos = Cupo::all()->where('id',$idcupo);

        foreach ($usuarios as $key => $us) {
                    $usu = $us;
        }

        foreach ($vehiculos as $key => $ve) {
            $vehi = $ve;
        }

        foreach ($pisos as $key => $pi) {
            $pis = $pi; 
        }

        foreach ($cupos as $key => $cu) {
            $cup = $cu;
        }         

        if(count($vehiculos)>0){
        /*$reservas = DB::table('vehiculo')
                            ->join('reserva','vehiculo.id','=','reserva.vehiculo_id')
                            ->join('parqueadero', 'reserva.parqueadero_id', '=', 'parqueadero.id')
                            ->join('piso', 'parqueadero.id', '=', 'piso.parqueadero_id')
                            ->join('cupo', 'piso.id', '=', 'cupo.piso_id')
                            ->select('placa', 'parqueadero.nombre', 'piso.nombre as piso', 'cupo.nombre as cupo', 'cupo.estado as estado_cupo')
                            ->where('vehiculo.placa', $placa)
                            ->where('cupo.estado', 1)
                            ->get();  */
            $reservas = Reserva::all()->where('vehiculo_id', $vehi->id)
                        ->where('fecha_fin','=','')
                        ->where('hora_fin','=','');  

            if(count($reservas)>0)
            {
                foreach ($reservas as $key => $r) 
                {
                    $res = $r;
                }
            }                 

            $vehiculosIngresados = Ingreso_vehiculo::all()->where('vehiculo_id', $vehi->id)
                                                        ->where('fecha_salida', '=', '')
                                                        ->where('hora_salida', '=', '');

            if(count($vehiculosIngresados)>0)
            {
                foreach ($vehiculosIngresados as $key => $ve) {
                    $vi = $ve;
                }
            }                                                                                                
        }
        /*
        if(count($vehiculos)>0){
            $reservas = Reserva::all()->where('vehiculo_id', $vehi->id)
                    ->where('fecha_fin', '==', '')
                    ->where('hora_fin','==', '');       
        }*/
            
        if(count($pisos)<1 and count($cupos)<1)
        {
            return redirect('/reservas')->with('danger', ' * Debe seleccionar el piso y el cupo. :-(');
        }
        elseif(count($pisos)<1)
        {
            return redirect('/reservas')->with('danger', ' * Debe seleccionar el piso. :-(');
        }
        elseif(count($cupos)<1)
        {
            return redirect('/reservas')->with('danger', ' * Debe seleccionar el cupo. :-(');
        }
        elseif(count($usuarios) < 1 and count($vehiculos) < 1)
        {
            return redirect('/reservas')->with('danger', ' * Cedula no registrada * Placa no registrada, Registrar usuario y vehiculo. :-(');
        }
        elseif(count($usuarios) < 1)
        {
            return redirect('/reservas')->with('danger', ' * Cedula no registrada, Registrar usuario. :-(');
        }
        elseif(count($vehiculos) < 1)
        {
            return redirect('/reservas')->with('danger', ' * Placa no registrada, Registrar vehiculo. :-(');
        }
        elseif(count($reservas) >= 1)
        {
            if($res->parqueadero_id == $idpark)
            {   
                if($res->usuario_id == $usu->id)
                {
                    return redirect('/reservas')->with('warning', ' * el vehiculo ya cuenta con una reserva  :-|');
                }
                return redirect('/reservas')->with('danger', ' *  la reserva pertenece a otro usuario  :-(');
            }    
            return redirect('/reservas')->with('danger', ' *  En el momento la placa cuenta con una reserva en otro parqueadero  :-(');
        }
        elseif(count($vehiculosIngresados) >= 1)
        {
            if($vi->id_parqueadero == $idpark)
            {
                if($vi->id_usuario == $usu->id)
                {
                    return redirect('/reservas')->with('warning', ' * El vehiculo se encuentra utilizando el servicio  :-|');
                }
                return redirect('/reservas')->with('danger', ' *  El vehiculo fue ingresado por otro usuario  :-(');
                
            }
            return redirect('/reservas')->with('danger', ' *  En el momento el vehiculo se encuentra haciendo uso del servicio en otro parqueadero  :-(');
        }

        else
        {   
            $reservas = new Reserva();
            $reservas->fecha_inicio=$fecha_actual;
            $reservas->hora_inicio=$hora_actual;
            $reservas->piso_id = $idpiso; 
            $reservas->cupo_id = $idcupo; 
            $reservas->parqueadero_id = $idpark; 
            $reservas->vehiculo_id = $vehi->id;
            $reservas->usuario_id = $usu->id;
            $reservas->save(); 

            //se cambia el estado del cupo a reservado
            $updateCupo = Cupo::find($idcupo);
            $updateCupo -> estado= '1';
            $updateCupo -> desc_estado= 'Reservado';
            $updateCupo -> update();
            return redirect('/reservas')->with('success',' La reserva se ha realizado con exito! :-)');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //metodo utilizado para mostrar mdatos en el modal para cancelar reserva
    public function show($id)
    {
        $reserva = Reserva::find($id);
        return view('superadmin.reservas.formCancelarReserva', compact('reserva'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //metodo utilizado para cancelar reserva
    public function destroy(Request $request, $id)
    {
        $fecha_cancel = "1000-01-01"; 
        $hora_cancel = '00:00:00';
        $idCupo = $request->input('idCupo');
        //se cancela la fecha 
        $updateR = Reserva::find($id);
        $updateR -> fecha_fin = $fecha_cancel;
        $updateR -> hora_fin = $hora_cancel;
        $updateR -> update();
        //se cambia el estado del cupo a disponible
        $updateCupoI = Cupo::find($idCupo);
        $updateCupoI -> estado= '0';
        $updateCupoI -> desc_estado= 'Disponible';
        $updateCupoI -> update();
        return redirect('/reservas')->with('success', ' * La reserva fue cancelada con exito. :-)');  
    }
}
