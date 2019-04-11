<?php

namespace App\Http\Controllers;

use DB;
use App\Rol;
use App\User;
use Illuminate\Http\Request;
use validator;
use Response;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\input;

class RegistroClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /*
    public function __construct()
    {
        //verifica si el usuario esta logueado
        $this->middleware('auth');
    }   
    */
    public function index()
    {
       //$roles = DB::table('rol')
       //->select('id','nombre')
        //->get();
       //dd($roles);
       $users =  User::all();
       //dd($users);
       return view('admin.registroClientes', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$roles = DB::table('rol')
        //->select('id','nombre')
        //->get();
        //dd($roles);
        //este return view('usuario.create');
        $model =  new User();
        $rols = Rol::all();
        return view('admin.form', compact('model','rols'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*$this->validate($request,[
            'name' => 'required',
            'email' => 'required'
        ]);
        $model = User::create($request->all());
        return $model;*/
        $usuario = new User();
        $usuario->tdoc=$request->input('tdoc');
        $usuario->desc_tipo=$request->input('desc_tipo');
        $usuario->no_documento=$request->input('no_documento');
        $usuario->name=$request->input('name');
        $usuario->ape=$request->input('ape');
        $usuario->gen=$request->input('gen');
        $usuario->dir=$request->input('dir');
        $usuario->tel=$request->input('tel');
        $usuario->email=$request->input('email');
        $usuario->password=bcrypt($request->input('password'));
        $usuario->id_rol=$request->input('id_rol');
        $usuario->save();
        //return 'registro guardado';
        return redirect('/registroClientes')->with('msg','Se guardo satisfactoriamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id); 
        return view('admin.registroClientes', compact('user')); 
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
        /*$users = DB::table('usuario')
        ->join('rol','usuario.id_rol','=','rol.id')
        ->select('usuario.id', 'usuario.tdoc', 'usuario.desc_tipo', 'usuario.no_documento', 'usuario.name', 'usuario.ape', 'usuario.gen', 'usuario.dir', 'usuario.tel', 'usuario.email', 'usuario.remember_token', 'rol.id as id_rol', 'rol.nombre')
        ->where('usuario.id','=',$id)
        ->get();*/
        $users2 = DB::table('usuario')
        ->join('rol','usuario.id_rol','=','rol.id')
        ->select('usuario.id_rol as id_rol', 'rol.nombre as nombre')
        ->where('usuario.id','=',$id)
        ->get();
        $rols = Rol::all();
        //$encrypted = Crypt::encryptString('Hello world.');
        $pass = Crypt::decryptString($users->password);
        //$pass = Hash::check('plain-text', $users->password);
        //return $model;
        return view('admin.formeditadmin', compact('users', 'users2', 'rols', 'pass'));
        //dd($pass);
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
        $users -> tdoc=$request['edittdoc'];
        $users -> desc_tipo=$request['editdesc_tipo'];
        $users -> no_documento=$request['editno_documento'];
        $users -> name=$request['editname'];
        $users -> ape=$request['editape'];
        $users -> dir=$request['editdir'];
        $users -> tel=$request['edittel'];
        $users -> gen=$request['editgen'];
        $users -> email=$request['editemail'];
        $users -> password=bcrypt($request['editpassword']);
        $users -> id_rol=$request['editid_rol'];
        $users -> update();
        return redirect('/registroClientes')->with('msg','Se modifico satisfactoriamente');
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
        return redirect('/registroClientes')->with('msg','Se elimino satisfactoriamente'); 
    }
}
