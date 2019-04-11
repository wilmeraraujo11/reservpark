<?php

namespace App\Http\Controllers;

use App\Marca_vehiculo;
use App\Parqueadero_usuario;
use Illuminate\Http\Request;

class RegistroMarcaVehiculoSuperAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $marca = Marca_vehiculo::all();
        $idusu = auth()->user()->id;
        $nombrepark = Parqueadero_usuario::all()->where('id_usuario', $idusu);
        return view ('superadmin.vehiculo.marca_vehiculo.registroMarcaVehiSuperAdmin', compact('marca', 'nombrepark'));
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
        $marca = new Marca_vehiculo();
        $marca->nombre=$request->input('marca');
        $marca->save();
        //return 'registro guardado';
        return redirect('/registroMarcaVehiculosSuperAdmin')->with('msg','Se guardo satisfactoriamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $marca = Marca_vehiculo::find($id);
        return view('superadmin.vehiculo.marca_vehiculo.formDeleteMarcaVehiSuperAdmin', compact('marca'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $marca = Marca_vehiculo::find($id);
        return view('superadmin.vehiculo.marca_vehiculo.formEditMarcaVehiSuperAdmin', compact('marca'));
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
        $marca = Marca_vehiculo::find($id);
        $marca -> nombre=$request['editmarca'];
        $marca -> update();
        return redirect('/registroMarcaVehiculosSuperAdmin')->with('msg','Se modifico satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $marca = Marca_vehiculo::find($id);
        $marca->delete();
        return redirect('/registroMarcaVehiculosSuperAdmin')->with('msg','Se elimino satisfactoriamente');
    }
}
