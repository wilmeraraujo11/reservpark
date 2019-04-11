@extends('admin.admin')
@section('contentadmin')
<!--modal inserta tipo documento del usuario-->
<div class="box" style="margin-left: 3%; margin-right: 2%">
  <form method="POST" action="{{ route('admin.store') }}" enctype="multipart/form-data">
  <div class="box-header">
    @foreach($nombrepark as $np)
      <h3 class="box-title" style="color: #337ab7; margin-top: 2%"><i>{{ $np->parqueadero->nombre }}</i></h3>
      <input type="hidden" name="id_park" value="{{ $np->id_parqueadero }}"> 
    @endforeach
    @foreach($reservas as $r)
    <h3 class="box-title pull-right" style="color: #337ab7; margin-top: 2%"><i>No. Reserva: {{ $r->id }}</i></h3> 
    @endforeach      
    
  </div>
  <div class="box-body">
    @csrf
    <table class="table table-bordered table-striped">
      <thead>
        <tr>
          @foreach($reservas as $r)
          <th>
            <center>
              Fecha:
              <input id="fechaR" type="text" name="fechaR" class="form-control input-sm" readonly="readonly" value="{{ $r->fecha_inicio }}">
            </center>
          </th>
          <th>
            <center>
              Hora: 
              <input id="horaR" type="text" name="horaR" class="form-control input-sm" readonly="readonly" value="{{ $r->hora_inicio }}">
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
            
              @foreach($pisos as $p)
               Piso: 
               <input id="pisoR" type="text" name="pisoR" class="form-control input-sm" readonly="readonly" value="{{ $p->nombre }}">
              @endforeach
          </td>
          <td style="width: 50%">
            <center>
              @foreach($cupos as $c)
               Cupo: 
               <input id="cupoR" type="text" name="cupoR" class="form-control input-sm" readonly="readonly" value="{{ $c->nombre }}">
              @endforeach
            </center>
          </td>
        </tr>
      </tbody>
    </table>
      
  </div>
  <div class="box-footer">
    <center>
      <button type="submit" class="btn btn-success" id="btnIngresar">Ingresar vehiculo</button>               
    </center>
  </div> 
  </form>      
</div>
<!--fin modal inserta tipo documento del usuario-->     
@endsection