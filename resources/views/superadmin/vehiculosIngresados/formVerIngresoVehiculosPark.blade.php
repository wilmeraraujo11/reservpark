@extends('admin.admin')
@section('contentadmin')
<!--tarjeta ver cupo de vusuario y vehiculo con en el parqueaderos-->
<div class="box" style="margin-left: 3%; margin-right: 2%">
  <form method="POST" action="{{ route('salidaVehiculo') }}" enctype="multipart/form-data">
  <div class="box-header">
    @foreach($nombrepark as $np)
      <h3 class="box-title" style="color: #337ab7; margin-top: 2%"><i>{{ $np->parqueadero->nombre }}</i></h3> 
    @endforeach
    @foreach($vehiculosIngresados as $vi)
    <h3 class="box-title pull-right" style="color: #337ab7; margin-top: 2%"><i>No. Ingreso: {{ $vi->id }}</i></h3> 
    @endforeach    
    
  </div>
  <div class="box-body">
    @csrf
    <table class="table table-bordered table-striped">
      <thead>
        <tr>
          @foreach($vehiculosIngresados as $v)
            <input type="hidden" name="idVehiculoI" value="{{ $v->id }}">
          <th>
            <center>
              Fecha Ingreso:
              <input id="fechaI" type="text" name="fechaI" class="form-control input-sm" readonly="readonly" value="{{ $v->fecha_ingreso }}">
            </center>
          </th>
          <th>
            <center>
              Hora ingreso: 
              <input id="horaI" type="text" name="horaI" class="form-control input-sm" readonly="readonly" value="{{ $v->hora_ingreso }}">
            </center>
          </th>
          @endforeach
        </tr>
      </thead>
      <tbody>
        <tr>
          <td style="width: 50%">
              Usuario:
          </td> 
          <td style="width: 50%">
          <center>
              @foreach($usuarios as $us)
              <input id="no_documento" type="hidden" name="no_documento" value="{{ $us->no_documento }}">
               <input id="nomUsu" type="text" name="nomUsu" class="form-control input-sm" readonly="readonly" value="{{ $us->name }} {{ $us->ape }}">
              @endforeach
          </center>
          </td>
        </tr>
        <tr>  
          <td style="width: 50%">
              Placa:
          </td>  
          <td style="width: 50%">
            <center>
              @foreach($vehiculos as $v)
              <input id="placa" type="hidden" name="placa" value="{{ $v->placa }}">
               <input id="placaUsuR" type="text" name="placaUsuR" class="form-control input-sm" readonly="readonly" value="{{ $v->placa }}">
              @endforeach
            </center>
          </td>          
        </tr>
        <tr>
          <td style="width: 50%">
              Tipo vehiculo:
          </td>  
          <td style="width: 50%">
            <center>
              @foreach($vehiculos as $v)
               <input id="tipoVR" type="text" name="tipoVR" class="form-control input-sm" readonly="readonly" value="{{ $v->tipo_vehiculo->nombre }}">
              @endforeach
            </center>
          </td>
        </tr>
        <tr>  
          <td style="width: 50%">
            
              @foreach($pisosIngresoV as $p)
               Piso: 
               <input id="pisoR" type="text" name="pisoR" class="form-control input-sm" readonly="readonly" value="{{ $p->nombre }}">
              @endforeach
          </td>
          <td style="width: 50%">
            <center>
              @foreach($cuposIngresoV as $c)
               <input type="hidden" name="idCupoI" value="{{ $c->id }}">
               Cupo: 
               <input id="cupoR" type="text" name="cupoR" class="form-control input-sm" readonly="readonly" value="{{ $c->nombre }}">
              @endforeach
            </center>
          </td>
        </tr>
      </tbody>
    </table>
    <label>Novedades</label>
    <textarea name="novedad" maxlength="50" class="form-control" required></textarea>
      
  </div>
  <div class="box-footer">
    <center>
      <button type="submit" class="btn btn-success" id="btnIngresar">Salida vehiculo</button>                  
    </center>
  </div> 
  </form>      
</div>
<!--fin modal inserta tipo documento del usuario-->     
@endsection