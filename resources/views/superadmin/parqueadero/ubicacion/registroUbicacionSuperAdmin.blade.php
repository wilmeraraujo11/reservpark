@extends('superadmin.appsuperadmin')
@section('content')
	<section class="content">
  
          <div class="box">
            <div class="box-header">
            <center>
              <h3 class="box-title" style="color: #337ab7; margin-top: 2%"><i>REGISTRO LUGAR DE UBICACION</i></h3>
              <button type="button" style="margin-top: 2%; margin-right: 2%" class="btn btn-primary pull-right" data-toggle="modal" data-target="#modal-default">
                <i class="fa fa-plus-circle"></i>
                Registrar lugar de ubicación
              </button>
            </center>			
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped" >
                <thead style="background-color: #a6c000;">
                <tr>
                  <th style="width: 10%">No.</th>
                  <th>CODIGO</th>
                  <th>NOMBRE</th>
                  <th>TIPO</th>
                  <th>DESC_TIPO</th>
                  <th>ID_PADRE</th>
                  <th style="width: 10%">EDITAR</th>
                  <th style="width: 10%">ELIMINAR</th> 
                </tr>
                </thead>
                <tbody>
                  <?php $no = 1; ?>
                            @foreach($ubicacion as $u)
                            <tr>
                              <td>{{ $no++ }}</td>
                              <td>{{ $u->codigo }}</td>
                              <td>{{ $u->nombre }}</td>
                              <td>{{ $u->tipo }}</td>
                              <td>{{ $u->descripcion_tipo }}</td>
                              <td>{{ $u->id_padre }}</td>
                              <td>
                                <center>
                                  <a class="btn btn-success btn-sm modal-edit" title="Editar" href="/registroUbicacionSuperAdmin/{{ $u->id }}/edit"><i class="fa fa-pencil"></i></a>
                                </center>
                              </td>  
                              <td>
                                <center>
                                  <a class="btn btn-danger btn-sm modal-delete" title="Eliminar" href="/registroUbicacionSuperAdmin/{{ $u->id }}"><i class="fa fa-trash-o"></i></a>
                                </center>
                              </td>
                            </tr>
                            @endforeach
                </tbody>
                <tfoot style="background-color: #a6c000;">
                <tr>
                  <th>No.</th>
                  <th>CODIGO</th>
                  <th>NOMBRE</th>
                  <th>TIPO</th>
                  <th>DESC_TIPO</th>
                  <th>ID_PADRE</th>
                  <th style="width: 10%">EDITAR</th>
                  <th style="width: 10%">ELIMINAR</th> 
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
      <!--modal inserta tipo documento del usuario-->
      @include('superadmin.parqueadero.ubicacion.formCrearUbicacionSuperAdmin')
</section>
    

@endsection