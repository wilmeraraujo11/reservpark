<?php

namespace App\Http\Controllers;

use App\Piso;
use App\Parqueadero;
use Illuminate\Http\Request;

class RegistroPisoParkSuperAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $piso = Piso::all();
        $park = Parqueadero::all();
        return view('superadmin.parqueadero.piso.registroPisoParkSuperAdmin', compact('piso', 'park')); 
        
    }

    public function byPisos($id)
    {
        return Piso::where('parqueadero_id', $id)->get();
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
        $park = Parqueadero::find($request->input('park'));
        $pisos = Piso::all()->where('parqueadero_id',$park->id);
        $pisos = $pisos->count();
        $i = 1;
        $cantpiso = $request->input('cantpiso');
        while($i <= $cantpiso){
            $piso = new Piso();
            $piso->nombre=$pisos+1;
            $piso->parqueadero_id=$request->input('park');
            $piso->save(); 
            $pisos++;
            $i++;
        }
        return redirect('/registroPisoParkSuperAdmin')->with('msg','Se guardo satisfactoriamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $piso = Piso::find($id);
        return view('superadmin.parqueadero.piso.formDeletePisoParkSuperAdmin', compact('piso'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
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
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $piso = Piso::find($id);
        $piso->delete();
        return redirect('/registroPisoParkSuperAdmin')->with('msg','Se elimino satisfactoriamente'); 
    }
}