<?php

namespace App\Http\Controllers;

use DB;
use App\Rol;
use App\Tipo_documento;
use App\Parqueadero_usuario;
use App\Genero;
use App\User;
use Illuminate\Http\Request;
use validator;
use Response;
use Illuminate\Support\Facades\Crypt;

class RegistroUsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $genero = Genero::all();
        $tipodoc = Tipo_documento::all();
        if(auth()->user()->id_rol == '1')
        {
            $users =  User::all();
            $rols = Rol::all();
            return view('superadmin.usuario.registroUsuarioSuperAdmin', compact('users', 'rols', 'genero', 'tipodoc'));
        }
        elseif(auth()->user()->id_rol == '2')
        {
            $users =  User::all()->where('id_rol', '4');
            $rols = Rol::all()->where('id', '4');
            $idusu = auth()->user()->id;
            $nombrepark = Parqueadero_usuario::all()->where('id_usuario', $idusu);
            return view('superadmin.usuario.registroUsuarioSuperAdmin', compact('users', 'rols', 'genero', 'tipodoc', 'nombrepark'));
        }
    }    
    //api muestra usuarios degun el rol
    public function byRoles($id)
    {
        return User::where('id_rol', $id)->get(); 
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
        $usuario = new User();
        $usuario->no_documento=$request->input('no_documento');
        $usuario->name=$request->input('name');
        $usuario->ape=$request->input('ape');
        $usuario->dir=$request->input('dir');
        $usuario->tel=$request->input('tel');
        $usuario->email=$request->input('email');
        $usuario->password=bcrypt($request->input('password'));
        $usuario->id_tdoc=$request->input('tdoc');
        $usuario->id_gen=$request->input('gen');
        $usuario->id_rol=$request->input('id_rol');
        $usuario->save();
        //return 'registro guardado';
        return redirect('/registrousuarios')->with('msg','Se guardo satisfactoriamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $users = User::find($id);
        return view('superadmin.usuario.formDeleteUsuarioSuperAdmin', compact('users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = User::find($id);
        $genero = Genero::all();
        $tipodoc = Tipo_documento::all();
        $users2 = DB::table('usuario')
        ->join('rol','usuario.id_rol','=','rol.id')
        ->join('genero','usuario.id_gen','=','genero.id')
        ->join('tipo_documento','usuario.id_tdoc','=','tipo_documento.id')
        ->select('usuario.id_rol as id_rol', 'rol.nombre as nombre','usuario.id_gen', 'genero.descripcion as gen',
            'usuario.id_tdoc','tipo_documento.nombre as tdoc')
        ->where('usuario.id','=',$id)
        ->get();
        //$encrypted = Crypt::encryptString('Hello world.');
        //$pass = Crypt::decryptString($users->password);
        //$pass = Hash::check('plain-text', $users->password);
        //return $model;
        if(auth()->user()->id_rol == '1')
        {
            $rols = Rol::all();
            return view('superadmin.usuario.formEditUsuariosSuperAdmin', compact('users', 'genero', 'tipodoc', 'users2', 'rols'));
        }
        elseif((auth()->user()->id_rol == '2') || (auth()->user()->id_rol == '2'))
        {
            $rols = Rol::all()->where('id', '4');
            return view('superadmin.usuario.formEditUsuariosSuperAdmin', compact('users', 'genero', 'tipodoc', 'users2', 'rols'));

        }
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
        $users = User::find($id);
        $users -> no_documento=$request['editno_documento'];
        $users -> name=$request['editname'];
        $users -> ape=$request['editape'];
        $users -> dir=$request['editdir'];
        $users -> tel=$request['edittel'];
        $users -> email=$request['editemail'];
        $users -> password=bcrypt($request['editpassword']);
        $users -> id_tdoc=$request['edittdoc'];
        $users -> id_gen=$request['editgen'];
        $users -> id_rol=$request['editid_rol'];
        $users -> update();
        return redirect('/registrousuarios')->with('msg','Se modifico satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $users = User::find($id);
        $users->delete();
        return redirect('/registrousuarios')->with('msg','Se elimino satisfactoriamente'); 
    }
}
