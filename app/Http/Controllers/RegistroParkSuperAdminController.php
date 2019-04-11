<?php

namespace App\Http\Controllers;

use App\Tipo_park;
use App\Ubicacion;
use App\Parqueadero;
use App\Events\ParqueaderosRegistrados;
use Illuminate\Http\Request;

class RegistroParkSuperAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $park = Parqueadero::all();
        $tipo_park = Tipo_park::all();
        $ubicacion = Ubicacion::all()->where('tipo', '3');
        return view('superadmin.parqueadero.registroParkSuperAdmin', compact('park', 'tipo_park', 'ubicacion')); 
        
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
        $park = new Parqueadero();
        $park->nombre=$request->input('nom');
        $park->direccion=$request->input('dir');
        $park->telefono=$request->input('tel');
        $park->nit=$request->input('nit');
        $park->rut=$request->input('rut');
        $park->longitud=$request->input('long');
        $park->latitud=$request->input('lat');
        $park->id_tipo_park=$request->input('tipo_park');
        $park->id_ubicacion=$request->input('ubi');
        $park->save();
        /*
        $datospark = array(
            'nombre' => $request->input('nom'),
            'direccion' => $request->input('dir'),
            'telefono' => $request->input('tel'),
            'nit' => $request->input('nit'),
            'rut' => $request->input('rut'),
            'longitud' => $request->input('long'),
            'latitud' => $request->input('lat'),
            'id_tipo_park' => $request->input('tipo_park'),
            'id_ubicacion' => $request->input('ubi')             
             );
        event(new ParqueaderosRegistrados($datospark));*/

        //return 'registro guardado';
        return redirect('/registroParkSuperAdmin')->with('msg','Se guardo satisfactoriamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $park = Parqueadero::find($id);
        return view('superadmin.parqueadero.formDeleteParkSuperAdmin', compact('park'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $park = Parqueadero::find($id);
        $tipo_park = Tipo_park::all();
        $ubicacion = Ubicacion::all()->where('tipo', '2');
        return view('superadmin.parqueadero.formEditParkSuperAdmin', compact('park', 'tipo_park', 'ubicacion'));
        
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
        $park = Parqueadero::find($id);
        $park -> nombre=$request['editnom'];
        $park -> direccion=$request['editdir'];
        $park -> telefono=$request['edittel'];
        $park -> nit=$request['editnit'];
        $park -> rut=$request['editrut'];
        $park -> longitud=$request['editlong'];
        $park -> latitud=$request['editlat'];
        $park -> id_tipo_park=$request['edittipo_park'];
        $park -> id_ubicacion=$request['editubi'];
        $park -> update();
        return redirect('/registroParkSuperAdmin')->with('msg','Se modifico satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $park = Parqueadero::find($id);
        $park->delete();
        return redirect('/registroParkSuperAdmin')->with('msg','Se elimino satisfactoriamente'); 
    }
    
    public function getParkByIdTipoPark($id)
    {
        //cupos por piso y estado disponible segun parqueadero
        return Parqueadero::where('id_tipo_park', $id)->get();
    }
    
}
