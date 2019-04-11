@extends('superadmin.appsuperadmin')
@section('content')
	<section class="content">
  
          <div class="box">
            @include('layouts.message')
            <div class="box-header">
              <center>
                <h3 class="box-title" style="color: #337ab7; margin-top: 2%"><i>REGISTRO  ADICIONAL VALOR DE LA TARIFA</i></h3>
                <button type="button" style="margin-top: 2%; margin-right: 2%" class="btn btn-primary pull-right" data-toggle="modal" data-target="#modal-default">
                  <i class="fa fa-plus-circle"></i>
                  Registrar vr adicional
                </button>
              </center>			
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped" >
                <thead style="background-color: #eedf51;">
                <tr>
                  <th style="width: 10%">No.</th>
                  <th style="width: 35%">VALOR ADICIONAL</th>
                  <th style="width: 35%">TIPO PARK</th>
                  <th style="width: 10%">EDITAR</th>
                  <th style="width: 10%">ELIMINAR</th>
                </tr>
                </thead>
                <tbody>
                  <?php $no = 1; ?>
                            @foreach($vr_adicional as $va)
                            <tr>
                              <td>{{ $no++ }}</td>
                              <td>{{ $va->vr_adicional }}</td>
                              <td>{{ $va->tipo_park }}</td>
                              <td>
                                <center>
                                  <a class="btn btn-success btn-sm modal-edit-tipovehiculo-superadmin" title="Editar" href="/adicional_vr_tarifa/{{ $va->id }}/edit"><i class="fa fa-pencil"></i></a>
                                </center>
                              </td>  
                              <td>
                                <center>
                                  <a class="btn btn-danger btn-sm modal-delete" title="Eliminar" href="/adicional_vr_tarifa/{{ $va->id }}"><i class="fa fa-trash-o"></i></a>
                                </center>
                              </td>
                            </tr>
                            @endforeach
                </tbody>
                <tfoot style="background-color: #eedf51;">
                <tr>
                  <th style="width: 10%">No.</th>
                  <th style="width: 35%">VALOR ADICIONAL</th>
                  <th style="width: 35%">TIPO PARK</th>
                  <th style="width: 10%">EDITAR</th>
                  <th style="width: 10%">ELIMINAR</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
      <!--modal inserta tipo de vehiculo-->
      @include('superadmin.parqueadero.tarifa.adicional_vr_tarifa.formCrearAdicionalVrTarifa')
</section>
    

@endsection