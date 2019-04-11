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

      $('#modal-title').text('Nuevo usuario');
      $('#modal-btn-save').text('Crear usuario');

      $.ajax({
        url: url,
        dataType: 'html',
        success: function(response){
          $('#modal-body').html(response);
        }
      });

      $('#modal').modal('show');
    });
      /*
    $('#modal-btn-save').click(function (event) {
      event.preventDefault();

      var form =  $('#modal-body form'),
          url = form.attr('action'),
          method = $('input[name=_method]').val() == undefined ? 'POST' : 'PUT';

          form.find('.help-block').remove();
          form.find('.form-group').removeClass('has-error');

          swal({
            type : 'success',
            title : 'Success!',
            text : 'Data has been saved'
          });

          $.ajax({
            url: url,
            method: method,
            data: form.serialize(),
            success: function(response){
              form.trigger('reset');
              $('#modal').modal('hide');
              $('#tbusu').Datatable().ajax.reload();
            },
            error: function(xhr){
              var res = xhr.responseJSON;
              if ($.isEmptyObject(res) == false) {
                $.each(res.errors, function(key, value) {
                  $('#'+ key)
                        .closest('.form-group')
                        .addClass('has-error')
                        .append('<span class="help-block"><strong>'+ value +'</strong></span>') 
                });
              }
            }
          })
    });*/
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
                  <a href="{{ route('registroClientes.create') }}" class="btn btn-outline-primary pull-right modal-show" style="margin-top: -80px;"><span class="glyphicon glyphicon-plus">+</span>Crear usuario</a>
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
                  <thead style="background-color: orange;">
                          <tr>
                            <th>No.</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>No. Documento</th>
                            <th>Tipo documento</th>
                            <th>Genero</th>
                            <th>Email</th>
                            <th>Editar</th>
                            <th>Borrar</th>
                          </tr>
                          </thead>
                          <tbody>
                            <?php $no = 1; ?>
                            @foreach($users as $us)
                            <tr>
                              <td>{{ $no++ }}</td>
                              <td>{{ $us->name }}</td>
                              <td>{{ $us->ape }}</td>
                              <td>{{ $us->no_documento }}</td>
                              <td>{{ $us->tdoc }}</td>
                              <td>{{ $us->gen }}</td>
                              <td>{{ $us->email }}</td>
                              <td><a class="edit-modal btn btn-outline-success btn-sm" title="Edit" href="/registroClientes/{{ $us->id }}/edit">Editar</a></td>
                                &nbsp;
                              <td>
                                <input type="hidden" name="_method" value="delete"/>
                                <a class="delete-modal btn btn-outline-danger btn-sm" data-toggle="modal" data-target=".bd-example-modal-sm" href="/registroClientes/{{ $us->id }}">Eliminar</a></td>
                            </tr>
                            @endforeach
                          </tbody>
                </table>
              </div>
            </div>
            <!--Modal para eliminar usuario-->

        </div>
      
@endsection
