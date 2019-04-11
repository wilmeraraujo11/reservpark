<?php

namespace App\Http\Controllers;

use App\Genero;
use App\Parqueadero_usuario;
use Illuminate\Http\Request;

class RegistroGeneroUsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $genero = Genero::all();
        $idusu = auth()->user()->id;
        $nombrepark = Parqueadero_usuario::all()->where('id_usuario', $idusu);
        return view('superadmin.generoUsu.registroGenUsuSuperAdmin', compact('genero', 'nombrepark'));
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
        $genero = new Genero();
        $genero->nombre=$request->input('gen');
        $genero->descripcion=$request->input('desc');
        $genero->save();
        //return 'registro guardado';
        return redirect('/registroGeneroUsuarios')->with('msg','Se guardo satisfactoriamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $genero = Genero::find($id);
        return view('superadmin.generoUsu.formDeleteGenUsuSuperAdmin', compact('genero'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $genero = Genero::find($id);
        return view('superadmin.generoUsu.formEditGenUsuSuperAdmin', compact('genero'));
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
        $genero = Genero::find($id);
        $genero -> nombre=$request['editgen'];
        $genero -> descripcion=$request['editdesc'];
        $genero -> update();
        return redirect('/registroGeneroUsuarios')->with('msg','Se modifico satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $genero = Genero::find($id);
        $genero->delete();
        return redirect('/registroGeneroUsuarios')->with('msg','Se elimino satisfactoriamente');
    }

    public function webServicesGeneros()
    {
        $genero = Genero::All();
        return ['genero' => $genero];
    }
}
