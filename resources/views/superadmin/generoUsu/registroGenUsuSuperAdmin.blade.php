@extends('superadmin.appsuperadmin')
@section('content')
	<section class="content">
  
          <div class="box">
            <div class="box-header">
            <center>
              @nosuperadmin
              <h3 class="box-title" style="color: #337ab7; margin-top: 2%"><i>VISUALIZACION  DE GENEROS DE USUARIO</i></h3>
              @endnosuperadmin
              @superadmin
              <h3 class="box-title" style="color: #337ab7; margin-top: 2%"><i>REGISTRO GENERO DE USUARIO</i></h3>
              <button type="button" style="margin-top: 2%; margin-right: 2%" class="btn btn-primary pull-right" data-toggle="modal" data-target="#modal-default">
                <i class="fa fa-plus-circle"></i>
                Registrar genero
              </button>
              @endsuperadmin
            </center>			
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped" >
                <thead style="background-color: #e1abef;">
                <tr>
                  <th style="width: 10%">No.</th>
                  <th>NOMBRE</th>
                  <th>DESCRIPCION</th>
                  @superadmin
                  <th style="width: 10%">EDITAR</th>
                  <th style="width: 10%">ELIMINAR</th> 
                  @endsuperadmin
                </tr>
                </thead>
                <tbody>
                  <?php $no = 1; ?>
                            @foreach($genero as $g)
                            <tr>
                              <td>{{ $no++ }}</td>
                              <td>{{ $g->nombre }}</td>
                              <td>{{ $g->descripcion }}</td>
                              @superadmin
                              <td>
                                <center>
                                  <a class="btn btn-success btn-sm modal-edit" title="Editar" href="/registroGeneroUsuarios/{{ $g->id }}/edit"><i class="fa fa-pencil"></i></a>
                                </center>
                              </td>  
                              <td>
                                <center>
                                  <a class="btn btn-danger btn-sm modal-delete" title="Eliminar" href="/registroGeneroUsuarios/{{ $g->id }}"><i class="fa fa-trash-o"></i></a>
                                </center>
                              </td>
                              @endsuperadmin
                            </tr>
                            @endforeach
                </tbody>
                <tfoot style="background-color: #e1abef;">
                <tr>
                  <th>No.</th>
                  <th>NOMBRE</th>
                  <th>DESCRIPCION</th>
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
      <!--modal inserta tipo documento del usuario-->
      @include('superadmin.generoUsu.formCrearGenUsuSuperAdmin')
</section>
    

@endsection