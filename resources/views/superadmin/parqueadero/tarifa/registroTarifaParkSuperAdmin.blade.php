@extends('superadmin.appsuperadmin')
@section('content')
	<section class="content">
  
          <div class="box"> 
            @include('layouts.message')
            <div class="box-header">
            <center>
              @admin
              <h3 class="box-title" style="color: #337ab7; margin-top: 2%"><i>VISUALIZAR TARIFAS</i></h3>
              @endadmin
              @superadmin_dueno
              <h3 class="box-title" style="color: #337ab7; margin-top: 2%"><i>REGISTRO TARIFAS</i></h3>
              <button type="button" style="margin-top: 2%; margin-right: 2%" class="btn btn-primary pull-right" data-toggle="modal" data-target="#modal-default">
                <i class="fa fa-plus-circle"></i>
                Registrar tarifas
              </button>
              @endsuperadmin_dueno
            </center>			
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped" >
                <thead style="background-color: #a6c000;">
                <tr>
                  <th style="width: 10%">No.</th>
                  <th>NOMBRE TARIFA</th>
                  <th>VALOR</th>
                  <th>ADICIONAL</th>
                  <th>PARQUEADERO</th>
                  @superadmin_dueno
                  <th style="width: 10%">EDITAR</th> 
                  <th style="width: 10%">ELIMINAR</th> 
                  @endsuperadmin_dueno
                </tr>
                </thead>
                <tbody>
                  <?php $no = 1; ?>
                            @foreach($tarifa as $t)
                            <tr>
                              <td>{{ $no++ }}</td>
                              <td>{{ $t->nombre }}</td>
                              <td>{{ $t->valor_id }}</td>
                              <td>{{ $t->adicional_id }}</td>
                              <td>{{ $t->parqueadero->nombre }}</td>
                              @superadmin_dueno
                              <td>
                                <center>
                                  <a class="btn btn-success btn-sm modal-edit" title="Editar" href="/registroTarifaParkSuperAdmin/{{ $t->id }}/edit"><i class="fa fa-pencil"></i></a>
                                </center>
                              </td>
                              <td>
                                <center>
                                  <a class="btn btn-danger btn-sm modal-delete" title="Eliminar" href="/registroTarifaParkSuperAdmin/{{ $t->id }}"><i class="fa fa-trash-o"></i></a>
                                </center>
                              </td>
                              @endsuperadmin_dueno
                            </tr>
                            @endforeach
                </tbody>
                <tfoot style="background-color: #a6c000;">
                <tr>
                  <th>No.</th>
                  <th>NOMBRE TARIFA</th>
                  <th>VALOR</th>
                  <th>ADICIONAL</th>
                  <th>PARQUEADERO</th>
                  @superadmin_dueno
                  <th style="width: 10%">EDITAR</th> 
                  <th style="width: 10%">ELIMINAR</th>
                  @endsuperadmin_dueno
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
      <!--modal inserta tipo documento del usuario-->
      @include('superadmin.parqueadero.tarifa.formCrearTarifaParkSuperAdmin')
</section>
    

@endsection