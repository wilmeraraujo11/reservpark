<?php

namespace App\Http\Controllers;

use App\Genero;
use App\Tipo_documento;
use App\User;
use App\Rol;
use Illuminate\Http\Request;

class CreacionUsuarioPruebaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $genero = Genero::all();
        $tipodoc = Tipo_documento::all();
        $users =  User::all();
        $rols = Rol::all();
        return view('prueba.creacionUsuarioPrueba', compact('users', 'rols', 'genero', 'tipodoc'));
       
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
        $usuario = new User();
        $usuario->no_documento=$request->input('no_documento');
        $usuario->name=$request->input('name');
        $usuario->ape=$request->input('ape');
        $usuario->dir=$request->input('dir');
        $usuario->tel=$request->input('tel');
        $usuario->email=$request->input('email');
        $usuario->password=bcrypt($request->input('password'));
        $usuario->id_tdoc=$request->input('tdoc');
        $usuario->id_gen=$request->input('gen');
        $usuario->id_rol=$request->input('id_rol');
        $usuario->save();
        //return 'registro guardado';
        return redirect('/')->with('msg','Se guardo satisfactoriamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function destroy($id)
    {
        //
    }
}
