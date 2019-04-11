<?php

namespace App\Http\Controllers;

use App\Tipo_vehiculo;
use App\Parqueadero_usuario;
use Illuminate\Http\Request;

class RegistroTipoVehiculoSuperAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Tipo_vehiculo = Tipo_vehiculo::all();
        $idusu = auth()->user()->id;
        $nombrepark = Parqueadero_usuario::all()->where('id_usuario', $idusu);
        return view ('superadmin.vehiculo.tipo_vehiculo.registroTipoVehiculoSuperAdmin', compact('Tipo_vehiculo', 'nombrepark'));
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
        $Tipo_vehiculo = new Tipo_vehiculo();
        $Tipo_vehiculo->nombre=$request->input('nombre');
        $Tipo_vehiculo->save();
        //return 'registro guardado';
        return redirect('/registroTipoVehiculosSuperAdmin')->with('msg','Se guardo satisfactoriamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Tipo_vehiculo = Tipo_vehiculo::find($id);
        return view('superadmin.vehiculo.tipo_vehiculo.formDeleteTipoVehiculoSuperAdmin', compact('Tipo_vehiculo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Tipo_vehiculo = Tipo_vehiculo::find($id);
        return view('superadmin.vehiculo.tipo_vehiculo.formEditTipoVehiculoSuperAdmin', compact('Tipo_vehiculo'));
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
        $Tipo_vehiculo = Tipo_vehiculo::find($id);
        $Tipo_vehiculo -> nombre=$request['editnombre'];
        $Tipo_vehiculo -> update();
        return redirect('/registroTipoVehiculosSuperAdmin')->with('msg','Se modifico satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Tipo_vehiculo = Tipo_vehiculo::find($id);
        $Tipo_vehiculo->delete();
        return redirect('/registroTipoVehiculosSuperAdmin')->with('msg','Se elimino satisfactoriamente');
    }
}
