<?php

namespace App\Http\Controllers;

use App\Parqueadero;
use App\User;
use App\Rol;
use App\Parqueadero_usuario;
use Illuminate\Http\Request;

class RegistroUsuParkSuperAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $park_usu = Parqueadero_usuario::all();
        $park = Parqueadero::all();
        $rols = Rol::all()->where('id','<>','4');
        return view('superadmin.parqueadero.usu_park.registroUsuParkSuperAdmin', compact('park_usu', 'park', 'rols'));
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
        $id_park = $request->get('park');
        $id_usu = $request->get('usu');
        $park_usu = Parqueadero_usuario::all()
            ->where('id_parqueadero', '=', $id_park)
            ->where('id_usuario', '=', $id_usu);
        
        if(count($park_usu) >= 1){
            return redirect('/registroUsuParkSuperAdmin')->with('danger','el ususario ya tiene asignado este paqueadero');    
        }
        $parkusu = new Parqueadero_usuario();
        $parkusu->id_parqueadero = $id_park;
        $parkusu->id_usuario = $id_usu;
        $parkusu->save(); 
        return redirect('/registroUsuParkSuperAdmin')->with('success','Se guardo satisfactoriamente');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $park_usu = Parqueadero_usuario::find($id);
        return view('superadmin.parqueadero.usu_park.formDeleteUsuParkSuperAdmin', compact('park_usu'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $park_usu = Parqueadero_usuario::find($id);
        $rols = Rol::all()->where('id','<>','4');
        $park = Parqueadero::all();
        return view('superadmin.parqueadero.usu_park.formEditUsuParkSuperAdmin', compact('park_usu', 'rols', 'park'));
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
        //pendiente
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $park_usu = Parqueadero_usuario::find($id);
        $park_usu->delete();
        return redirect('/registroUsuParkSuperAdmin')->with('danger','Se elimino satisfactoriamente');
    }
}
