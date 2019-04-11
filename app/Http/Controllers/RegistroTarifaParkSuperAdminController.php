<?php

namespace App\Http\Controllers;

Use App\Tarifa;
Use App\Tipo_park;
Use App\Parqueadero_usuario;
use Illuminate\Http\Request;

class RegistroTarifaParkSuperAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tarifa = Tarifa::all();
        $tipo_park = Tipo_park::all();
        $idusu = auth()->user()->id; 
        $nombrepark = Parqueadero_usuario::all()->where('id_usuario', $idusu);
        return view('superadmin.parqueadero.tarifa.registroTarifaParkSuperAdmin', compact('tarifa', 'tipo_park', 'nombrepark')); 
        
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
        $tarifa = new Tarifa();
        $tarifa->nombre=$request->input('nomtarifa');
        $tarifa->valor_id=$request->input('vr_tarifa');
        $tarifa->adicional_id=$request->input('vr_adicional');
        $tarifa->parqueadero_id=$request->input('park');
        $tarifa->save();
        //return 'registro guardado';
        return redirect('/registroTarifaParkSuperAdmin')->with('success','Se guardo satisfactoriamente :-)');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tarifa = Tarifa::find($id);
        return view('superadmin.parqueadero.tarifa.formDeleteTarifaParkSuperAdmin', compact('tarifa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tarifa = Tarifa::find($id);
        $park = Parqueadero::all();
        return view('superadmin.parqueadero.tarifa.formEditTarifaParkSuperAdmin', compact('tarifa', 'park'));
        
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
        $tarifa = Tarifa::find($id);
        $tarifa -> nombre = $request['editnomtarifa'];
        $tarifa -> valor = $request['editvalor'];
        $tarifa -> adicional = $request['editadicional'];
        $tarifa -> parqueadero_id = $request['editpark'];
        $tarifa -> update();
        return redirect('/registroTarifaParkSuperAdmin')->with('msg','Se modifico satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tarifa = Tarifa::find($id);
        $tarifa->delete();
        return redirect('/registroTarifaParkSuperAdmin')->with('msg','Se elimino satisfactoriamente'); 
    }
    
}
