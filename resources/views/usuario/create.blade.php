@extends('admin.appadmin')
@section('title','Registrar usuario')
@section('content')
<center>

  <div class="col-lg-4"></div>
  <div class="col-lg-4">
    <h1 style="color:blue; text-align: center;">NUEVO USUARIO</h1>
    <hr>
    <form method="POST" action="/admin" enctype="multipart/form-data">
      @csrf
      <!--tipo de documento-->
      <div class="form-group">
      <select  name="tdoc" class="form-control">
        <option value="">--Seleccione documento--</option>
        <option value="CC">CC</option>
        <option value="TI">TI</option>
        <option value="CE">CE</option>
      </select>
      </div>
      <!--descripcion del tipo de documento-->
      <div class="form-group">
      <select  name="desc_tipo" class="form-control">
        <option value="">--Descripción tipo de documento--</option>
        <option value="Cedula">Cedula</option>
        <option value="Tarjeta de identidad">Tarjeta de identidad</option>
        <option value="Cedula de extranjeria">Cedula de extranjeria</option>
      </select>
      </div>
      <!--numero de documento-->
      <div class="form-group">
        <input id="no_documento" type="text" name="no_documento" class="form-control{{ $errors->has('no_documento') ? ' is-invalid' : '' }}" value="{{ old('no_documento') }}" required autofocus placeholder="Número de documento">
        @if ($errors->has('no_documento'))
            <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('no_documento') }}</strong>
            </span>
        @endif
      </div>
      <!--Nombres-->
      <div class="form-group">
        <input id="name" type="text" name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{ old('name') }}" required autofocus placeholder="Nombres">
        @if ($errors->has('name'))
            <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
      </div> 
      <!--Apellidos-->
      <div class="form-group">
        <input id="ape" type="text" name="ape" class="form-control{{ $errors->has('ape') ? ' is-invalid' : '' }}" value="{{ old('ape') }}" required autofocus placeholder="Apellidos">
        @if ($errors->has('ape'))
            <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('ape') }}</strong>
            </span>
        @endif
      </div> 
      <!--Genero-->
      <div class="form-group">
      <select  name="gen" class="form-control">
        <option value="">--Seleccione genero--</option>
        <option value="M">Masculino</option>
        <option value="F">Femenino</option>
      </select>
      </div>
      <!--Direccion-->
      <div class="form-group">
        <input id="dir" type="text" name="dir" class="form-control{{ $errors->has('dir') ? ' is-invalid' : '' }}" value="{{ old('dir') }}" required autofocus placeholder="Dirección">
        @if ($errors->has('dir'))
            <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('dir') }}</strong>
            </span>
        @endif
      </div>
      <!--Telefono-->
      <div class="form-group">
        <input id="tel" type="text" name="tel" class="form-control{{ $errors->has('tel') ? ' is-invalid' : '' }}" value="{{ old('tel') }}" required autofocus placeholder="Telefono">
        @if ($errors->has('tel'))
            <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('tel') }}</strong>
            </span>
        @endif
      </div>
      <!--Email-->
      <div class="form-group">
        <input id="email" type="email" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}" required autofocus placeholder="Correo electronico">
        @if ($errors->has('email'))
            <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
      </div>
      <!--Password-->
      <div class="form-group">
        <input id="password" type="password" name="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" required autofocus placeholder="Contraseña">
        @if ($errors->has('password'))
            <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
      </div>
      <!--Rol-->
      <div class="form-group">
        <input id="id_rol" type="text" name="id_rol" class="form-control{{ $errors->has('id_rol') ? ' is-invalid' : '' }}" value="{{ old('id_rol') }}" required autofocus placeholder="Rol">
        @if ($errors->has('id_rol'))
            <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('id_rol') }}</strong>
            </span>
        @endif
      </div> 
      
      <button type="submit" class="btn btn-primary form-control">Guardar</button><br><br>
      
  </form>
  <hr>
  </div>
  <div class="col-lg-4"></div>
  </center>
@endsection