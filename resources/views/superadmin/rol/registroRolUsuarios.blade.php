@extends('superadmin.appsuperadmin')
@section('content')
   
<section class="content">
  
          <div class="box">
            <div class="box-header">
            <center>
              @nosuperadmin
              <h3 class="box-title" style="color: #337ab7; margin-top: 2%"><i>VISUALIZACION DE ROLES DE USUARIO</i></h3>
              @endnosuperadmin
              @superadmin
              <h3 class="box-title" style="color: #337ab7; margin-top: 2%"><i>REGISTRO DE ROLES DE USUARIO</i></h3>
              <button type="button" style="margin-top: 2%; margin-right: 2%" class="btn btn-primary pull-right" data-toggle="modal" data-target="#modal-default">
                <i class="fa fa-plus-circle"></i>
                Registrar rol
              </button>
              @endsuperadmin
            </center>			
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped" >
                <thead style="background-color: aqua;">
                <tr>
                  <th>ID</th>
                  <th>NOMBRE</th>
                  @superadmin
                  <th>EDITAR</th>
                  <th>ELIMINAR</th>
                  @endsuperadmin
                </tr>
                </thead>
                <tbody>
                	<?php $no = 1; ?>
                    @foreach($rolusu as $ru)
                        <tr>
                            <td style="width: 10%">{{ $no++ }}</td>
                            <td style="width: 70%">{{ $ru->nombre }}</td>
                            @superadmin
                            <td style="width: 10%">
                            	<center>
                            		<a class="btn btn-success btn-sm modal-edit" title="Editar" href="/registroRolUsuarios/{{ $ru->id }}/edit"><i class="fa fa-pencil"></i></a>
                            	</center>
                            </td>
                            &nbsp;
                            <td style="width: 10%">
                                <center>
                                  <a class="btn btn-danger btn-sm modal-delete" title="Eliminar" href="/registroRolUsuarios/{{ $ru->id }}"><i class="fa fa-trash-o"></i></a>
                                </center>
                            </td>
                            @endsuperadmin
                            </tr>
                            @endforeach
                </tbody>
                <tfoot style="background-color: aqua;">
                <tr>
                  <th>ID</th>
                  <th>NOMBRE</th>
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
          @include('superadmin.rol.formCrearRol')
        
</section>
    

@endsection
