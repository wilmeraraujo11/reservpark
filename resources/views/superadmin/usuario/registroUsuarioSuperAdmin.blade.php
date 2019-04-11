@extends('superadmin.appsuperadmin')
@section('content')
	<section class="content">
  
          <div class="box">
            <div class="box-header">
            <center>
              <h3 class="box-title" style="color: #337ab7; margin-top: 2%"><i>REGISTRO DE USUARIOS RESERVPARK</i></h3>
              <button type="button" style="margin-top: 2%; margin-right: 2%" class="btn btn-primary pull-right" data-toggle="modal" data-target="#modal-default">
                <i class="fa fa-plus-circle"></i>
                Registrar usuario
              </button>
            </center>			
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped" >
                <thead style="background-color: #e1abef;">
                <tr>
                  <th>No.</th>
                  <th>NO. DOC</th>
                  <th>TIPO DOC</th>
                  <th>NOMBRE</th>
                  <th>APELLIDO</th>
                  <th>GEN</th>
                  <th>DIRECCION</th>
                  <th>TELEFONO</th>
                  <th>EMAIL</th>
                  <th style="width: 5%"></th>
                </tr>
                </thead>
                <tbody>
                  <?php $no = 1; ?>
                            @foreach($users as $us)
                            <tr>
                              <td>{{ $no++ }}</td>
                              <td>{{ $us->no_documento }}</td>
                              <td>{{ $us->tipo_documento->nombre }}</td>
                              <td>{{ $us->name }}</td>
                              <td>{{ $us->ape }}</td>
                              <td>{{ $us->genero->nombre }}</td>
                              <td>{{ $us->dir }}</td>
                              <td>{{ $us->tel }}</td>
                              <td>{{ $us->email }}</td>
                              <td>
                                <center>
                                  <a class="btn btn-success btn-sm modal-edit-usuario-superadmin" title="Editar" href="/registrousuarios/{{ $us->id }}/edit"><i class="fa fa-pencil"></i></a>
                                  @superadmin
                                  <a class="btn btn-danger btn-sm modal-delete-usuario-superadmin" title="Eliminar" href="/registrousuarios/{{ $us->id }}"><i class="fa fa-trash-o"></i></a>
                                  @endsuperadmin
                                </center>
                              </td>
                            </tr>
                            @endforeach
                </tbody>
                
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
      <!--modal inserta rol del usuario-->
      @include('superadmin.usuario.formCrearUsuariosSuperAdmin')
</section>
    

@endsection