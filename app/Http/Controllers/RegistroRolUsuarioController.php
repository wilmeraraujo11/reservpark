<?php

namespace App\Http\Controllers;

use App\Rol;
use App\Parqueadero_usuario;
use Illuminate\Http\Request;

class RegistroRolUsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rolusu = Rol::all();
        $idusu = auth()->user()->id;
        $nombrepark = Parqueadero_usuario::all()->where('id_usuario', $idusu);
        return view('superadmin.rol.registroRolUsuarios', compact('rolusu', 'nombrepark'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('superadmin.rol.formCrearRol');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rol = new Rol();
        $rol->nombre=$request->input('nombre');
        $rol->save();
        //return 'registro guardado';
        return redirect('/registroRolUsuarios')->with('success','Se guardo satisfactoriamente');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rol = Rol::find($id);
        return view('superadmin.rol.formDeleteRol', compact('rol'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rol = Rol::find($id);
        return view('superadmin.rol.formEditRol', compact('rol'));
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
        $rol = Rol::find($id);
        $rol -> nombre=$request['nombre'];
        $rol -> update();
        return redirect('/registroRolUsuarios')->with('msg','Se modifico satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rol = Rol::find($id);
        $rol->delete();
        return redirect('/registroRolUsuarios')->with('msg','Se modifico satisfactoriamente');    
    }
}
