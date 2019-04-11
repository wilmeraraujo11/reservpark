@extends('superadmin.appsuperadmin')
@section('content')
<section class="content">
  
@superadmin
<div class="box">
  @include('layouts.message')
  <div class="box-header">
  <center>
    <h3 class="box-title" style="color: #337ab7; margin-top: 2%"><i>REGISTRO VALOR TARIFA</i></h3>
    <button type="button" style="margin-top: 2%; margin-right: 2%" class="btn btn-primary pull-right" data-toggle="modal" data-target="#modal-default">
      <i class="fa fa-plus-circle"></i>
      Registrar valor tarifa
    </button>
  </center>     
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <table id="example1" class="table table-bordered table-striped" >
      <thead style="background-color: #e1abef;">
      <tr>
        <th style="width: 10%">No.</th>
        <th style="width: 30%">VALOR</th>
        <th style="width: 40%">TIPO PARQUEADERO</th>
        <th style="width: 10%">EDITAR</th>
        <th style="width: 10%">ELIMINAR</th> 
      </tr>
      </thead>
      <tbody>
        <?php $no = 1; ?>
                  @foreach($valor_tarifa as $vt)
                  <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $vt->vr_tarifa }}</td>
                    <td>{{ $vt->tipo_park }}</td>
                    <td>
                      <center>
                        <a class="btn btn-success btn-sm modal-edit" title="Editar" href="/valor_tarifa/{{ $vt->id }}/edit"><i class="fa fa-pencil"></i></a>
                      </center>
                    </td>  
                    <td>
                      <center>
                        <a class="btn btn-danger btn-sm modal-delete" title="Eliminar" href="/valor_tarifa/{{ $vt->id }}"><i class="fa fa-trash-o"></i></a>
                      </center>
                    </td>                              
                  </tr>
                  @endforeach
      </tbody>
      <tfoot style="background-color: #e1abef;">
      <tr>
        <th style="width: 10%">No.</th>
        <th style="width: 30%">VALOR</th>
        <th style="width: 40%">TIPO PARQUEADERO</th>
        <th style="width: 10%">EDITAR</th>
        <th style="width: 10%">ELIMINAR</th> 
      </tr>
      </tfoot>
    </table>
  </div>
  <!-- /.box-body -->
@include('superadmin.parqueadero.tarifa.valor_tarifa.formCrearValorTarifa');
</div>
@endsuperadmin
      <!--modal insertar valor tarifa-->
          <!-- /.box -->
</section>
    

@endsection