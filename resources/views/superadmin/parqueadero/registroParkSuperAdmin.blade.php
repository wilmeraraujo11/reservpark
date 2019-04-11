@extends('superadmin.appsuperadmin')
@section('content')
	<section class="content">
  
          <div class="box">
            <div class="box-header">
            <center>
              <h3 class="box-title" style="color: #337ab7; margin-top: 2%"><i>REGISTRO DE PARQUEADERO</i></h3>
              <button type="button" style="margin-top: 2%; margin-right: 2%" class="btn btn-primary pull-right" data-toggle="modal" data-target="#modal-default">
                <i class="fa fa-plus-circle"></i>
                Registrar parqueadero
              </button>
            </center>			
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped" >
                <thead style="background-color: #a6c000;">
                <tr>
                  <th style="width: 10%">No.</th>
                  <th>NOMBRE</th>
                  <th>DIRECCION</th>
                  <th>TELEFONO</th>
                  <th>NIT</th>
                  <th>RUT</th>
                  <th>LONGITUD</th>
                  <th>LATITUD</th>
                  <th>TIPO PARK</th>
                  <th>UBICACION</th>
                  <th style="width: 5%"></th> 
                </tr>
                </thead>
                <tbody>
                  <?php $no = 1; ?>
                            @foreach($park as $p)
                            <tr>
                              <td>{{ $no++ }}</td>
                              <td>{{ $p->nombre }}</td>
                              <td>{{ $p->direccion }}</td>
                              <td>{{ $p->telefono }}</td>
                              <td>{{ $p->nit }}</td>
                              <td>{{ $p->rut }}</td>
                              <td>{{ $p->longitud }}</td>
                              <td>{{ $p->latitud }}</td>
                              <td>{{ $p->tipo_park->nombre }}</td>
                              <td>{{ $p->ubicacion->nombre }}</td>
                              <td>
                                <center>
                                  <a class="btn btn-success btn-sm modal-edit" title="Editar" href="/registroParkSuperAdmin/{{ $p->id }}/edit"><i class="fa fa-pencil"></i></a>
                                  <a class="btn btn-danger btn-sm modal-delete" title="Eliminar" href="/registroParkSuperAdmin/{{ $p->id }}"><i class="fa fa-trash-o"></i></a>
                                </center>
                              </td>
                            </tr>
                            @endforeach
                </tbody>
                <tfoot style="background-color: #a6c000;">
                <tr>
                  <th>No.</th>
                  <th>NOMBRE</th>
                  <th>DIRECCION</th>
                  <th>TELEFONO</th>
                  <th>NIT</th>
                  <th>RUT</th>
                  <th>LONGITUD</th>
                  <th>LATITUD</th>
                  <th>TIPO PARK</th>
                  <th>UBICACION</th>
                  <th></th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
      <!--modal inserta tipo documento del usuario-->
      @include('superadmin.parqueadero.formCrearParkSuperAdmin')
</section>
    

@endsection