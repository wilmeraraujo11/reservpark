<?php

namespace App\Http\Controllers;

use App\Ubicacion;
use Illuminate\Http\Request;

class RegistroUbicacionSuperAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ubicacion = Ubicacion::all();
        return view('superadmin.parqueadero.ubicacion.registroUbicacionSuperAdmin', compact('ubicacion')); 
        
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
        $ubicacion = new Ubicacion();
        $ubicacion->codigo=$request->input('cod');
        $ubicacion->nombre=$request->input('nom');
        $ubicacion->tipo=$request->input('tipo');
        $ubicacion->descripcion_tipo=$request->input('desc_tipo');
        $ubicacion->id_padre=$request->input('id_padre');
        $ubicacion->save();
        //return 'registro guardado';
        return redirect('/registroUbicacionSuperAdmin')->with('msg','Se guardo satisfactoriamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ubicacion = Ubicacion::find($id);
        return view('superadmin.parqueadero.ubicacion.formDeleteUbicacionSuperAdmin', compact('ubicacion'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ubicacion = Ubicacion::find($id);
        return view('superadmin.parqueadero.ubicacion.formEditUbicacionSuperAdmin', compact('ubicacion'));
        
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
        $ubicacion = Ubicacion::find($id);
        $ubicacion -> codigo=$request['editcod'];
        $ubicacion -> nombre=$request['editnom'];
        $ubicacion -> tipo=$request['edittipo'];
        $ubicacion -> descripcion_tipo=$request['editdesc_tipo'];
        $ubicacion -> id_padre=$request['editid_padre'];
        $ubicacion -> update();
        return redirect('/registroUbicacionSuperAdmin')->with('msg','Se modifico satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ubicacion = Ubicacion::find($id);
        $ubicacion->delete();
        return redirect('/registroUbicacionSuperAdmin')->with('msg','Se elimino satisfactoriamente'); 
    }
}
