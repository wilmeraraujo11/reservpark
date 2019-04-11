@extends('superadmin.appsuperadmin')
@section('content')
  <section class="content">
  
          <div class="box">
            <div class="box-header"> 
              <center>
                <h3 class="box-title" style="color: #337ab7; margin-top: 2%"><i>REGISTRO DE VEHICULOS</i></h3>
                <button type="button" style="margin-top: 2%; margin-right: 2%" class="btn btn-primary pull-right" data-toggle="modal" data-target="#modal-default">
                  <i class="fa fa-plus-circle"></i>
                  Registrar vehiculo
                </button>
              </center>     
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped" >
                <thead style="background-color: #eedf51;">
                <tr>
                  <th style="width: 10%">No.</th>
                  <th style="width: 10%">PLACA</th>
                  <th style="width: 20%">MARCA</th>
                  <th style="width: 20%">COLOR</th>
                  <th style="width: 200%">TIPO DE VEHICULO</th>
                  @superadmin
                  <th style="width: 10%">EDITAR</th>
                  <th style="width: 10%">ELIMINAR</th>
                  @endsuperadmin
                </tr>
                </thead>
                <tbody>
                  <?php $no = 1; ?>
                            @foreach($vehiculo as $v)
                            <tr>
                              <td>{{ $no++ }}</td>
                              <td>{{ $v->placa }}</td>
                              <td>{{ $v->marca_vehiculo->nombre }}</td>
                              <td>{{ $v->color }}</td>
                              <td>{{ $v->tipo_vehiculo->nombre }}</td>
                              @superadmin
                              <td>
                                <center>
                                  <a class="btn btn-success btn-sm modal-edit" title="Editar" href="/registroVehiculosSuperAdmin/{{ $v->id }}/edit"><i class="fa fa-pencil"></i></a>
                                </center>
                              </td>  
                              <td>
                                <center>
                                  <a class="btn btn-danger btn-sm modal-delete" title="Eliminar" href="/registroVehiculosSuperAdmin/{{ $v->id }}"><i class="fa fa-trash-o"></i></a>
                                </center>
                              </td>
                              @endsuperadmin
                            </tr>
                            @endforeach
                </tbody>
                <tfoot style="background-color: #eedf51;">
                <tr>
                  <th>No.</th>
                  <th>PLACA</th>
                  <th>MARCA</th>
                  <th>COLOR</th>
                  <th>TIPO DE VEHICULO</th>
                  @superadmin
                  <th>EDITAR</th>
                  <th>ELIMINAR</th>
                  @endsuperadmin
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
      <!--modal inserta tipo de vehiculo-->
      @include('superadmin.vehiculo.formCrearVehiculoSuperAdmin')
</section>
    
@endsection