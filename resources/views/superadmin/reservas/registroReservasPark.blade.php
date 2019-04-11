@extends('superadmin.appsuperadmin')
@section('content')
	<section class="content">
  
          <div class="box">
          	@include('layouts.message')
            <div class="box-header">
            <center>
              <h3 class="box-title" style="color: #337ab7; margin-top: 2%"><i>VISUALIZACION DE 	RESERVAS ACTIVAS</i></h3>
              <button type="button" style="margin-top: 2%; margin-right: 2%" class="btn btn-primary pull-right" data-toggle="modal" data-target="#modal-default">
                <i class="fa fa-plus-circle"></i>
                Registrar reserva
              </button>
              
            </center>			
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped" >
                <thead style="background-color: #a6c000;">
                <tr>
                  <th style="width: 10%">No.</th>
                  <th>FECHA INICIO</th>
                  <th>HORA INICIO</th>
                  <th>USUARIO</th>
                  <th>VEHICULO</th>
                  <th>PARK</th>
                  <th>PISO</th>
                  <th>CUPO</th>
                  <th style="width: 10%">U/D</th> 
                </tr> 
                </thead>
                <tbody>
                  <?php $no = 1; ?>
                            @foreach($reservas as $r)
                            <tr>
                              <td>{{ $no++ }}</td>
                              <td>{{ $r->fecha_inicio }}</td>
                              <td>{{ $r->hora_inicio }}</td>
                              <td>{{ $r->usuario_id }}</td>
                              <td>{{ $r->vehiculo->placa }}</td>
                              <td>{{ $r->parqueadero->nombre }}</td>
                              <td>{{ $r->piso_id }}</td>
                              <td>{{ $r->cupo_id }}</td>
                              <td>
                                <center>
	                            	<a class="btn btn-danger btn-sm modal-delete" title="Cancelar reserva" href="/reservas/{{ $r->id }}"><i class="fa fa-trash-o"></i></a>
                                </center>
                              </td>
                            </tr>
                            @endforeach
                </tbody>
                <tfoot style="background-color: #a6c000;">
                <tr>
                  <th style="width: 10%">No.</th>
                  <th>FECHA INICIO</th>
                  <th>HORA INICIO</th>
                  <th>USUARIO</th>
                  <th>VEHICULO</th>
                  <th>PARK</th>
                  <th>PISO</th>
                  <th>CUPO</th>
                  <th style="width: 10%">U/D</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
      <!--modal inserta tipo documento del usuario-->
      @include('superadmin.reservas.formCrearReserva')
</section>
    

@endsection