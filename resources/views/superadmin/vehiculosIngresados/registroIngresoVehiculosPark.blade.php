@extends('admin.admin')
@section('contentadmin')
<!--modal inserta tipo documento del usuario-->
<div class="box" style="margin-left: 3%; margin-right: 2%">
  <form method="POST" action="{{ route('admin.store') }}" enctype="multipart/form-data">
  <div class="box-header">
    @foreach($nombrepark as $np)
      <center>
        <h3 class="box-title" style="color: #337ab7; margin-top: 2%"><i>{{ $np->parqueadero->nombre }}</i></h3>        
      </center>
    @endforeach
    
  </div>
  <div class="box-body">
    @csrf
      @foreach($nombrepark as $np)
          <input type="hidden" name="id_parkI" value="{{ $np->id_parqueadero }}">
      @endforeach
      Usuario:
      @foreach($usuarios as $us)
        <input id="no_documento" type="hidden" name="no_documento" value="{{ $us->no_documento }}">
        <input id="nomUsu" type="text" name="nomUsu" class="form-control " readonly="readonly" required value="{{ $us->name }} {{ $us->ape }}">
      @endforeach

      Placa:
      @foreach($vehiculos as $ve)
        <input id="placa" type="hidden" name="placa" value="{{ $ve->placa }}">
        <input id="placaUsu" type="text" name="placaUsu" class="form-control" readonly="readonly" required value="{{ $ve->placa }}">
      @endforeach
      
      Pisos:
      <select id="select-piso" name="pisoI" class="form-control">
        <option value="">--Seleccione piso--</option>
        @foreach($pisosPark as $pi)
             <option value="{{ $pi->id }}">{{ $pi->nombre }}</option>
          @endforeach
      </select>    
      
      Cupos
      <select id="select-cupo" name="cupoI" class="form-control">
        <option value="">--Cupos deshabilitado--</option>
      </select>
     

  </div>
  <div class="box-footer">
    <center>
      <button type="submit" class="btn btn-success"id="btnIngresarV">Ingresar</button>
    </center>
  </div> 
  </form>      
</div>
<!--fin modal inserta tipo documento del usuario-->     
@endsection