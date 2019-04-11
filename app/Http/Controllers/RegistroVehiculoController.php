<?php

namespace App\Http\Controllers;

use DB;
use App\Vehiculo;
use App\Tipo_vehiculo;
use App\Parqueadero;
use Illuminate\Http\Request;

class RegistroVehiculoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        //verifica si el usuario esta logueado
        $this->middleware('auth');
    }

    public function index()
    {
        $vehiculos =  Vehiculo::all();
       return view('vehiculo.registroVehiculos', compact('vehiculos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipo_vehiculo =  Tipo_vehiculo::all();
        $park =  Parqueadero::all();
        return view('vehiculo.formIngresoVehiculo', compact('tipo_vehiculo','park'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $vehiculo = new Vehiculo();
        $vehiculo->placa=$request->input('placa');
        $vehiculo->marca=$request->input('marca');
        $vehiculo->color=$request->input('color');
        $vehiculo->id_tipo_vehiculo=$request->input('id_tipo_vehiculo');
        $vehiculo->parqueadero_id=$request->input('parqueadero_id');
        $vehiculo->save();
        //return 'registro guardado';
        return redirect('/registroVehiculos')->with('msg','Se guardo satisfactoriamente');
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
