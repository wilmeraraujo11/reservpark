<?php

namespace App\Http\Controllers;

use App\Tipo_park;
use App\Parqueadero_usuario;
use Illuminate\Http\Request;

class RegistroTipoParkSuperAdminController extends Controller
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
        return view('superadmin.parqueadero.tipo_park.registroTipoParkSuperAdmin', compact('tipo_park', 'nombrepark')); 
        
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
        $tipo_park = new Tipo_park();
        $tipo_park->nombre=$request->input('tpark');
        $tipo_park->descripcion=$request->input('desc');
        $tipo_park->save();
        //return 'registro guardado';
        return redirect('/registroTipoParkSuperAdmin')->with('msg','Se guardo satisfactoriamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tipo_park = Tipo_park::find($id);
        return view('superadmin.parqueadero.tipo_park.formDeleteTipoParkSuperAdmin', compact('tipo_park'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tipo_park = Tipo_park::find($id);
        return view('superadmin.parqueadero.tipo_park.formEditTipoParkSuperAdmin', compact('tipo_park'));
        
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
        $tipo_park = Tipo_park::find($id);
        $tipo_park -> nombre=$request['edittpark'];
        $tipo_park -> descripcion=$request['editdesc'];
        $tipo_park -> update();
        return redirect('/registroTipoParkSuperAdmin')->with('msg','Se modifico satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tipo_park = Tipo_park::find($id);
        $tipo_park->delete();
        return redirect('/registroTipoParkSuperAdmin')->with('msg','Se elimino satisfactoriamente'); 
    }
}
