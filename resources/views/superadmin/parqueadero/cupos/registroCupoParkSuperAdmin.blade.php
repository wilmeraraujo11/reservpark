@extends('superadmin.appsuperadmin')
@section('content')
	<section class="content">
  
          <div class="box">
            <div class="box-header">
            <center>
              <h3 class="box-title" style="color: #337ab7; margin-top: 2%"><i>REGISTRO DE CUPOS DE PARQUEDEROS</i></h3>
              <button type="button" style="margin-top: 2%; margin-right: 2%" class="btn btn-primary pull-right" data-toggle="modal" data-target="#modal-default">
                <i class="fa fa-plus-circle"></i>
                Registrar cupo
              </button>
            </center>			
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped" >
                <thead style="background-color: #a6c000;">
                <tr>
                  <th style="width: 10%">No.</th>
                  <th>CUPO</th>
                  <th>ESTADO</th>
                  <th>DESC_ESTADO</th>
                  <th>PISO</th>
                  <th>PARQUEADERO</th>
                  <th style="width: 10%">ELIMINAR</th> 
                </tr>
                </thead>
                <tbody>
                  <?php $no = 1; ?>
                            @foreach($cupo as $c)
                            <tr>
                              <td>{{ $no++ }}</td>
                              <td>{{ $c->nombre }}</td>
                              <td>{{ $c->estado }}</td>
                              <td>{{ $c->desc_estado }}</td>
                              <td>{{ $c->piso->nombre }}</td>
                              <td>{{ $c->piso->parqueadero->nombre }}</td>
                              <td>
                                <center>
                                  <a class="btn btn-danger btn-sm modal-delete" title="Eliminar" href="/registroCupoParkSuperAdmin/{{ $c->id }}"><i class="fa fa-trash-o"></i></a>
                                </center>
                              </td>
                            </tr>
                            @endforeach
                </tbody>
                <tfoot style="background-color: #a6c000;">
                <tr>
                  <th>No.</th>
                  <th>CUPO</th>
                  <th>ESTADO</th>
                  <th>DESC_ESTADO</th>
                  <th>PISO</th>
                  <th>PARQUEADERO</th>
                  <th>ELIMINAR</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
      <!--modal inserta tipo documento del usuario-->
      @include('superadmin.parqueadero.cupos.formCrearCupoParkSuperAdmin')
</section>
    

@endsection