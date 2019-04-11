@extends('superadmin.appsuperadmin')
@section('content')
	<section class="content">
        <div class="box">
            @if ($success=Session::get('success'))
                <div class="alert alert-success alert-dismissible" role="alert">
                  <button type="button" class="close" data-dismiss="alert">×</button>
                  <strong>Felicidades!</strong>{{ $success }}
                </div>
            @endif
            @if ($danger=Session::get('danger'))
              <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>Atención!</strong>{{ $danger }}
              </div>
            @endif 
            <div class="box-header">
            <center>
              <h3 class="box-title" style="color: #337ab7; margin-top: 2%"><i>ASIGNAR PARQUEADERO A USUARIO</i></h3>
              <button type="button" style="margin-top: 2%; margin-right: 2%" class="btn btn-primary pull-right" data-toggle="modal" data-target="#modal-default">
                <i class="fa fa-plus-circle"></i>
                Asignar parqueadero a usuario
              </button>
            </center>			
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped" >
                <thead style="background-color: #a6c000;">
                <tr>
                  <th style="width: 10%">No.</th>
                  <th>PARQUEADERO</th>
                  <th>USUARIO</th>
                  <th style="width: 10%">MODIFICAR</th> 
                  <th style="width: 10%">ELIMINAR</th> 
                </tr>
                </thead>
                <tbody>
                  <?php $no = 1; ?>
                            @foreach($park_usu as $pu)
                            <tr>
                              <td>{{ $no++ }}</td>
                              <td>{{ $pu->parqueadero->nombre }}</td>
                              <td>{{ $pu->user->name }} {{ $pu->user->ape }}</td>
                              <td>
                                <center>
                                  <a class="btn btn-success btn-sm modal-edit" title="Editar" href="/registroUsuParkSuperAdmin/{{ $pu->id }}/edit"><i class="fa fa-pencil"></i></a>
                                </center>
                              </td>
                              <td>
                                <center>
                                  <a class="btn btn-danger btn-sm modal-delete" title="Eliminar" href="/registroUsuParkSuperAdmin/{{ $pu->id }}"><i class="fa fa-trash-o"></i></a>
                                </center>
                              </td>
                            </tr>
                            @endforeach
                </tbody>
                <tfoot style="background-color: #a6c000;">
                <tr>
                  <th>No.</th>
                  <th>PARQUEADERO</th>
                  <th>USUARIO</th>
                  <th>MODIFICAR</th> 
                  <th>ELIMINAR</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
      <!--modal inserta tipo documento del usuario-->
      @include('superadmin.parqueadero.usu_park.formCrearUsuParkSuperAdmin')
</section>
    

@endsection