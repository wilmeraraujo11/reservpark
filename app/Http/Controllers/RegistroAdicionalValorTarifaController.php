<?php

namespace App\Http\Controllers;

use App\Tipo_park;
use App\Adicional_vr_tarifa;
use Illuminate\Http\Request;

class RegistroAdicionalValorTarifaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vr_adicional = Adicional_vr_tarifa::all();
        $tipo_park = Tipo_park::all();
        return view('superadmin.parqueadero.tarifa.adicional_vr_tarifa.registroAdicionalVrTarifa', compact('vr_adicional', 'tipo_park'));
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
        $vr_adicional = new Adicional_vr_tarifa();
        $vr_adicional->vr_adicional = $request->input('vr_adicional');
        $vr_adicional->tipo_park = $request->input('tipo_park');
        $vr_adicional->save();
        //return 'registro guardado';
        return redirect('/adicional_vr_tarifa')->with('success','Se guardo satisfactoriamente :-)');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $vr_adicional = Adicional_vr_tarifa::find($id);
        return view('superadmin.parqueadero.tarifa.adicional_vr_tarifa.formDeleteAdicionalVrTarifa', compact('vr_adicional'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vr_adicional = Adicional_vr_tarifa::find($id);
        $tipo_park_vr = Tipo_park::all()->where('id',$vr_adicional->tipo_park);
        $tipo_park = Tipo_park::all();
        return view('superadmin.parqueadero.tarifa.adicional_vr_tarifa.formEditAdicionalVrTarifa', compact('vr_adicional', 'tipo_park_vr', 'tipo_park'));
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
        $vr_adicional = Adicional_vr_tarifa::find($id);
        $vr_adicional -> vr_adicional = $request['vr_adicionaledit'];
        $vr_adicional -> tipo_park = $request['tipo_parkedit'];
        $vr_adicional -> update();
        return redirect('/adicional_vr_tarifa')->with('success','Se modifico satisfactoriamente :-)');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vr_adicional = Adicional_vr_tarifa::find($id);
        $vr_adicional->delete();
        return redirect('/adicional_vr_tarifa')->with('success','Se elimino satisfactoriamente');  
    }
    public function byValorAdicionalTarifa($id)
    {
        return Adicional_vr_tarifa::where('tipo_park', $id)->get();
    }
}
