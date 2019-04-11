<?php

namespace App\Http\Controllers;

use App\Cupo;
use App\Piso;
use App\Parqueadero;
use Illuminate\Http\Request;

class RegistroCupoParkSuperAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cupo = Cupo::all();
        $piso = Piso::all();
        $park = Parqueadero::all();
        return view('superadmin.parqueadero.cupos.registroCupoParkSuperAdmin', compact('cupo', 'piso', 'park')); 
        
    }

    public function byCupos($id)
    {
        //cupos por piso y estado disponible segun parqueadero
        return Cupo::where('piso_id', $id)->where('estado','0')->get();
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
        $piso = $request->input('piso');
        $park = $request->input('park');
        //$piso = Piso::all()->where('id', $nom);
        $cupos = Cupo::all()->where('piso_id',$piso);
        $cupos = $cupos->count();
        
        $i = 1;
        $cantcupo = $request->input('cantcupo');
        while($i <= $cantcupo){
            $cupo = new Cupo();
            $cupo->nombre = $cupos+1;
            $cupo->piso_id = $piso;
            $cupo->estado = 0; 
            $cupo->desc_estado = 'Disponible'; 
            $cupo->parqueadero_id = $park;
            $cupo->save(); 
            $cupos++;
            $i++;
        }
        return redirect('/registroCupoParkSuperAdmin')->with('msg','Se guardo satisfactoriamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cupo = Cupo::find($id);
        return view('superadmin.parqueadero.cupos.formDeleteCupoParkSuperAdmin', compact('cupo'));
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