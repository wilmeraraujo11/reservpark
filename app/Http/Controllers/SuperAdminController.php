<?php

namespace App\Http\Controllers;

use App\Cupo;
use App\Piso;
use App\Parqueadero_usuario;
use Illuminate\Http\Request;

class SuperAdminController extends Controller
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
        if(auth()->user()->id_rol == '1')
        {
            //rol  de tipo superadministrador
            return view('superadmin.superadmin');            
        }
        elseif((auth()->user()->id_rol == '2') || (auth()->user()->id_rol == '3'))
        {
            //rol de tipo administrador
            $idusu = auth()->user()->id;
            $nombrepark = Parqueadero_usuario::all()->where('id_usuario', $idusu);
            foreach ($nombrepark as $np) {
                $idpark = $np->parqueadero->id;
            }
            $verpisos = Piso::All()->where('parqueadero_id', $idpark)->where('nombre', '1');
            foreach ($verpisos as $vp) {
                $vercupos = $vp->cupos;
            }
            return view('admin.admin', compact('nombrepark', 'vercupos'));
        }

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
        //
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
