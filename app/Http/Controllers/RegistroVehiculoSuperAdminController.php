<?php

namespace App\Http\Controllers;

use DB;
use PDF;
use App\Vehiculo;
use App\Parqueadero_usuario;
use App\Marca_vehiculo;
use App\Tipo_vehiculo;
use Illuminate\Http\Request;

class RegistroVehiculoSuperAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vehiculo = Vehiculo::all();
        $tipo_vehiculo = Tipo_vehiculo::all();
        $marca = Marca_vehiculo::all();
        $idusu = auth()->user()->id;
        $nombrepark = Parqueadero_usuario::all()->where('id_usuario', $idusu);
        return view ('superadmin.vehiculo.registroVehiculoSuperAdmin', compact('vehiculo', 'tipo_vehiculo', 'marca', 'nombrepark'));
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
        $vehiculo = new Vehiculo();
        $vehiculo->placa=$request->input('placa');
        $vehiculo->id_marca=$request->input('marca');
        $vehiculo->color=$request->input('color');
        $vehiculo->id_tipo_vehiculo=$request->input('id_tipo_vehiculo');
        $vehiculo->save();
        //return 'registro guardado';
        return redirect('/registroVehiculosSuperAdmin')->with('msg','Se guardo satisfactoriamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $vehiculo = Vehiculo::find($id);
        return view('superadmin.vehiculo.formDeleteVehiculoSuperAdmin', compact('vehiculo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vehiculo = Vehiculo::find($id);
        $tipo_vehiculo = Tipo_vehiculo::all();
        $marca_vehiculo = Marca_vehiculo::all();
        return view('superadmin.vehiculo.formEditVehiculoSuperAdmin', compact('vehiculo', 'tipo_vehiculo', 'tipvehi_vehiculo', 'marca_vehiculo'));
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
        $vehiculo = Vehiculo::find($id);
        $vehiculo -> placa = $request['editplaca'];
        $vehiculo -> id_marca = $request['editmarca'];
        $vehiculo -> color = $request['editcolor'];
        $vehiculo-> id_tipo_vehiculo = $request['editid_tipo_vehiculo'];
        $vehiculo -> update();
        return redirect('/registroVehiculosSuperAdmin')->with('msg','Se modifico satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vehiculo = Vehiculo::find($id);
        $vehiculo->delete();
        return redirect('/registroVehiculosSuperAdmin')->with('msg','Se elimino satisfactoriamente');
    }


    //generar reporte pdf
    public function reporteVehiculo()
    {
        $idusu = auth()->user()->id;
        $parkUsu = Parqueadero_usuario::all()->where('id_usuario', $idusu);
        $vehiculos = Vehiculo::all();
        //return view ('superadmin.pdf.reporteVerAutomoviles', compact('vehiculos'));
        $pdf = PDF::loadView('superadmin.pdf.reporteVerAutomoviles', compact('vehiculos','parkUsu'));
        return $pdf->stream() ;
        //return $pdf->download('reporte automoviles.pdf');
    }
}
