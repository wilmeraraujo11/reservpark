@extends('superadmin.appsuperadmin')
@section('content')
	<section class="content">
  
          <div class="box">
            <div class="box-header">
            <center>
              <h3 class="box-title" style="color: #337ab7; margin-top: 2%"><i>REGISTRO PISOS</i></h3>
              <button type="button" style="margin-top: 2%; margin-right: 2%" class="btn btn-primary pull-right" data-toggle="modal" data-target="#modal-default">
                <i class="fa fa-plus-circle"></i>
                Registrar pisos
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
                  <th>PISOS</th>
                  <th style="width: 10%">ELIMINAR</th> 
                </tr>
                </thead>
                <tbody>
                  <?php $no = 1; ?>
                            @foreach($piso as $p)
                            <tr>
                              <td>{{ $no++ }}</td>
                              <td>{{ $p->parqueadero->nombre }}</td>
                              <td>{{ $p->nombre }}</td>
                              <td>
                                <center>
                                  <a class="btn btn-danger btn-sm modal-delete" title="Eliminar" href="/registroPisoParkSuperAdmin/{{ $p->id }}"><i class="fa fa-trash-o"></i></a>
                                </center>
                              </td>
                            </tr>
                            @endforeach
                </tbody>
                <tfoot style="background-color: #a6c000;">
                <tr>
                  <th>No.</th>
                  <th>PARQUEADERO</th>
                  <th>PISOS</th>
                  <th>ELIMINAR</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
      <!--modal inserta tipo documento del usuario-->
      @include('superadmin.parqueadero.piso.formCrearPisoParkSuperAdmin')
</section>
    

@endsection