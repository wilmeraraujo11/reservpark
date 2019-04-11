@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <!--Tipo de documento-->
                        <div class="form-group row">
                            <label for="tdoc" class="col-md-4 col-form-label text-md-right">{{ __('Tipo de documento') }}</label>

                            <div class="col-md-6">
                                <input type="Radio" name="tdoc" value="CC" required autofocus>CC &nbsp
                                <input type="Radio" name="tdoc" value="TI" required autofocus>TI &nbsp
                                <input type="Radio" name="tdoc" value="CE" required autofocus>CE

                                @if ($errors->has('tdoc'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('tdoc') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <!--Descripcion del tipo de documento-->
                        <div class="form-group row">
                            <label for="desc_tipo" class="col-md-4 col-form-label text-md-right">{{ __('Desc_Tipo_Doc') }}</label>

                            <div class="col-md-6">
                                <input id="desc_tipo" type="text" class="form-control{{ $errors->has('desc_tipo') ? ' is-invalid' : '' }}" name="desc_tipo" value="{{ old('desc_tipo') }}" required autofocus>

                                @if ($errors->has('desc_tipo'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('desc_tipo') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!--Número de documento-->
                        <div class="form-group row">
                            <label for="no_documento" class="col-md-4 col-form-label text-md-right">{{ __('Número de documento') }}</label>

                            <div class="col-md-6">
                                <input id="no_documento" type="text" class="form-control{{ $errors->has('no_documento') ? ' is-invalid' : '' }}" name="no_documento" value="{{ old('no_documento') }}" required autofocus>

                                @if ($errors->has('no_documento'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('no_documento') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <!--Nombre de usuario-->
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombres') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <!--Apellido de usuario-->
                        <div class="form-group row">
                            <label for="ape" class="col-md-4 col-form-label text-md-right">{{ __('Apellidos') }}</label>

                            <div class="col-md-6">
                                <input id="ape" type="text" class="form-control{{ $errors->has('ape') ? ' is-invalid' : '' }}" name="ape" value="{{ old('ape') }}" required autofocus>

                                @if ($errors->has('ape'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('ape') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!--Genero-->
                        <div class="form-group row">
                            <label for="gen" class="col-md-4 col-form-label text-md-right">{{ __('Genero') }}</label>

                            <div class="col-md-6">
                                <input type="Radio" name="gen" value="M" required autofocus>Masculino &nbsp
                                <input type="Radio" name="gen" value="F" required autofocus>Femenino

                                @if ($errors->has('gen'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('gen') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!--Dirección de usuario-->
                        <div class="form-group row">
                            <label for="dir" class="col-md-4 col-form-label text-md-right">{{ __('Dirección') }}</label>

                            <div class="col-md-6">
                                <input id="dir" type="text" class="form-control{{ $errors->has('dir') ? ' is-invalid' : '' }}" name="dir" value="{{ old('dir') }}" required autofocus>

                                @if ($errors->has('dir'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('dir') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <!--Telefono de usuario-->
                        <div class="form-group row">
                            <label for="tel" class="col-md-4 col-form-label text-md-right">{{ __('Telefono') }}</label>

                            <div class="col-md-6">
                                <input id="tel" type="text" class="form-control{{ $errors->has('tel') ? ' is-invalid' : '' }}" name="tel" value="{{ old('tel') }}" required autofocus>

                                @if ($errors->has('tel'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('tel') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <!--Correo electronico-->
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Correo') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <!--Contraseña-->
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Constraseña') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <!--Confirmación password-->
                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirmar contraseña') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>
                        <!--id del rol de usuario-->
                        <div class="form-group row">
                            <label for="rol" class="col-md-4 col-form-label text-md-right">{{ __('Rol') }}</label>

                            <div class="col-md-6">
                                <input id="rol" type="text" class="form-control{{ $errors->has('rol') ? ' is-invalid' : '' }}" name="rol" value="{{ old('rol') }}" required autofocus>

                                @if ($errors->has('rol'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('rol') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
