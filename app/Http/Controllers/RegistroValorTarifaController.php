<?php

namespace App\Http\Controllers;

use App\Valor_tarifa;
use App\Tipo_park;
use App\Parqueadero_usuario;
use Illuminate\Http\Request;

class RegistroValorTarifaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $valor_tarifa = Valor_tarifa::all();
        $tipo_park = Tipo_park::all();
        return view('superadmin.parqueadero.tarifa.valor_tarifa.registroValorTarifa', compact('valor_tarifa', 'tipo_park'));
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
        $valor_tarifa = new Valor_tarifa();
        $valor_tarifa->vr_tarifa = $request->input('vr_tarifa');
        $valor_tarifa->tipo_park = $request->input('tipo_park');
        $valor_tarifa->save();
        //return 'registro guardado';
        return redirect('/valor_tarifa')->with('success','Se guardo satisfactoriamente :-)');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $valor_tarifa = Valor_tarifa::find($id);
        return view('superadmin.parqueadero.tarifa.valor_tarifa.formDeleteValorTarifa', compact('valor_tarifa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $valor_tarifa = Valor_tarifa::find($id);
        $tipo_park_vr = Tipo_park::all()->where('id',$valor_tarifa->tipo_park);
        $tipo_park = Tipo_park::all();
        return view('superadmin.parqueadero.tarifa.valor_tarifa.formEditValorTarifa', compact('valor_tarifa', 'tipo_park_vr', 'tipo_park'));
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
        $valor_tarifa = Valor_tarifa::find($id);
        $valor_tarifa -> vr_tarifa = $request['vr_tarifaedit'];
        $valor_tarifa -> tipo_park = $request['tipo_parkedit'];
        $valor_tarifa -> update();
        return redirect('/valor_tarifa')->with('success','Se modifico satisfactoriamente :-)');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $valor_tarifa = Valor_tarifa::find($id);
        $valor_tarifa->delete();
        return redirect('/valor_tarifa')->with('success','Se elimino satisfactoriamente');  
    }

    //generar valor tarifa segun tipo de parqueadero
    public function byValorTarifa($id)
    {
        //cupos por piso y estado disponible segun parqueadero
        return Valor_tarifa::where('tipo_park', $id)->get();
    }
}
