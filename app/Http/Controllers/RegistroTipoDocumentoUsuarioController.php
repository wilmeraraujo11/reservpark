<?php

namespace App\Http\Controllers;

use App\Tipo_documento;
use App\Parqueadero_usuario;
use Illuminate\Http\Request;

class RegistroTipoDocumentoUsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipo_doc = Tipo_documento::all();
        $idusu = auth()->user()->id;
        $nombrepark = Parqueadero_usuario::all()->where('id_usuario', $idusu);
        return view('superadmin.tipoDocumento.registroTipoDocUsuSuperAdmin', compact('tipo_doc', 'nombrepark'));
        
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
        $tipo_doc = new Tipo_documento();
        $tipo_doc->nombre=$request->input('cc');
        $tipo_doc->descripcion=$request->input('desc');
        $tipo_doc->save();
        //return 'registro guardado';
        return redirect('/registroTdocUsuarios')->with('msg','Se guardo satisfactoriamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tipo_doc = Tipo_documento::find($id);
        return view('superadmin.tipoDocumento.formDeleteTipoDocUsuSuperAdmin', compact('tipo_doc'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tipo_doc = Tipo_documento::find($id);
        return view('superadmin.tipoDocumento.formEditTipoDocUsuSuperAdmin', compact('tipo_doc'));
        
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
        $tipo_doc = Tipo_documento::find($id);
        $tipo_doc -> nombre=$request['editcc'];
        $tipo_doc -> descripcion=$request['editdesc'];
        $tipo_doc -> update();
        return redirect('/registroTdocUsuarios')->with('msg','Se modifico satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tipo_doc = Tipo_documento::find($id);
        $tipo_doc->delete();
        return redirect('/registroTdocUsuarios')->with('msg','Se elimino satisfactoriamente'); 
    }

    public function webServicesTdoc()
    {
        $tipo_doc = Tipo_documento::All();
        return ['tipo_park' => $tipo_doc];
    }
}
