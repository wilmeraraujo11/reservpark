@extends('admin.appadmin')

@section('content')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">

    <script type="text/javascript">
      $('body').on('click','.modal-show', function(event){
      //para evitar que pase al formulario 
      event.preventDefault();
      var me = $(this),
      url = me.attr('href'),
      title = me.attr('title');

      $('#modal-title').text('Nuevo vehiculo');
      //$('#modal-btn-save').text('Crear vehiculo');

      $.ajax({
        url: url,
        dataType: 'html',
        success: function(response){
          $('#modal-body').html(response);
        }
      });

      $('#modal').modal('show');
    });

    </script>
    <!--
    <script type="text/javascript">
      $('body').on('click','.edit-modal', function(event){
        //para evitar que pase al formulario 
        event.preventDefault();
        var me = $(this),
        url = me.attr('href'),
        title = me.attr('title');


        $.ajax({
          url: url,
          dataType: 'html',
          success: function(response){
            $('#modal-body').html(response);
          }
        });

        $('#modal').modal('show');
      });

  </script>-->



    <br>
     
        <div class="row justify-content-center">
            <div class="panel panel-primary">
              <div class="panel-heading">
                <br>
                <h3 class="panel-title">
                  <a href="{{ route('registroVehiculos.create') }}" class="btn btn-outline-primary pull-right modal-show" style="margin-top: -80px;"><span class="glyphicon glyphicon-plus">+</span>Crear vehiculo</a>
                </h3>
                @if ($msg=Session::get('msg'))
                    <div class="alert alert-success alert-dismissible" role="alert">
                      <button type="button" class="close" data-dismiss="alert">×</button>
                      <strong>Felicidades!</strong>{{ $msg }}
                    </div><br>
                @endif
              </div>
              <div class="panel-body" style="margin-top: -50px;" >
                <table id="tbusu" class="table table-hover" style="margin-top: -80px; width: 100%"> 
                  <thead style="background-color: aqua;">
                          <tr>
                            <th>No.</th>
                            <th>Placa</th>
                            <th>Marca</th>
                            <th>Color</th>
                            <th>Tipo vehiculo</th>
                            <th>Parqueadero</th>
                            <th>Editar</th>
                            <th>Borrar</th>
                          </tr>
                          </thead>
                          <tbody>
                            <?php $no = 1; ?>
                            @foreach($vehiculos as $ve)
                            <tr>
                              <td>{{ $no++ }}</td>
                              <td>{{ $ve->placa }}</td>
                              <td>{{ $ve->marca }}</td>
                              <td>{{ $ve->color }}</td>
                              <td>{{ $ve->id_tipo_vehiculo }}</td>
                              <td>{{ $ve->parqueadero_id }}</td>
                              <td><a class="edit-modal btn btn-outline-success btn-sm" title="Edit" href="/registroVehiculos/{{ $ve->id }}/edit">Editar</a></td>
                                &nbsp;
                              <td>
                                <input type="hidden" name="_method" value="delete"/>
                                <a class="delete-modal btn btn-outline-danger btn-sm" data-toggle="modal" data-target=".bd-example-modal-sm" href="/registroVehiculos/{{ $ve->id }}">Eliminar</a></td>
                            </tr>
                            @endforeach
                          </tbody>
                </table>
              </div>
            </div>
            <!--Modal para eliminar vehiculo-->
           
        </div>
      
@endsection
  