@extends('superadmin.appsuperadmin')
@section('content')
	<br>
	<div class="row">
        <div class="col-sm-4 col-md-4 col-lg-4 col-xl-4" id="vis">
            <div class="box" style="margin-left: 3%; margin-right: 2%">
              <div class="box-header">
                <h3 class="box-title" style="color: #337ab7; margin-top: 2%"><i>Ingreso de vehiculos</i></h3>       
              </div>
              <form method="POST" action="{{ route('admin.store') }}" enctype="multipart/form-data">
              <div class="box-body">
                
                  @csrf
                  <!--numero de documento-->
                  <div class="form-group">
                    <!--id parqueadero-->
                    @foreach($nombrepark as $np)
                      <input type="hidden" name="id_park" value="{{ $np->parqueadero->id }}" >
                    @endforeach  

                    <input id="no_documento" type="number" name="no_documento" class="form-control{{ $errors->has('no_documento') ? ' is-invalid' : '' }}" value="{{ old('no_documento') }}" required autofocus placeholder="Número de documento">
                    @if ($errors->has('no_documento'))
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('no_documento') }}</strong>
                        </span>
                    @endif
                  </div>
                  <!--numero de placa-->
                  <div class="form-group">
                    <input id="placa" type="text" name="placa" class="form-control{{ $errors->has('no_documento') ? ' is-invalid' : '' }}" value="{{ old('placa') }}" required autofocus placeholder="Ingrese placa: ABC123 ">
                    @if ($errors->has('no_documento'))
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('placa') }}</strong>
                        </span>
                    @endif
                  </div>
                </div>
                <div class="box-footer">
                  <center>
                    <button type="submit" class="btn btn-primary" id="btnBuscar">Buscar</button>
                  </center>
                </div> 
                </form>      
                <!--Mostrar mensajes-->
              	@include('layouts.message')
                </div>
                
                @yield('contentadmin')

            </div>
      <div class="col-sm-7 col-md-7 col-lg-7 col-xl-7" id="val">
	        <div class="box" style="margin-left: 2%; margin-right: 2%; width: 110%; height: 100%;">
	            <div class="box-header">
                <center>
                  <h3 class="box-title" style="color: #337ab7; margin-top: 2%"><i>Cupos</i></h3> 
                </center>
              </div>
            	<div class="box-body">
                @foreach($vercupos as $vc)
                  @if($vc->estado == 0)
                  	<button type="button" title="{{ $vc->desc_estado  }}" class="btn btn-success" style="width: 100px; height: 50px" value="">Cupo: {{ $vc->nombre }}</button>
                  @elseif($vc->estado == 1)
                    <button type="button" title="{{ $vc->desc_estado  }}" class="btn btn-primary" style="width: 100px; height: 50px" value="">Cupo: {{ $vc->nombre }}</button>
                  @else
                    <button type="button" title="{{ $vc->desc_estado  }}" class="btn btn-danger" style="width: 100px; height: 50px" value="">Cupo: {{ $vc->nombre }}</button>
                  @endif
                @endforeach
            	</div> 
	        </div>
	   </div> 
	</div><br>
      
@endsection	
