<section class="content">
  
          <div class="box">
            <div class="box-header">
            <center>
              <h3 class="box-title" style="color: #337ab7; margin-top: 2%"><i>REGISTRO USUARIO</i></h3>
              <button type="button" style="margin-top: 2%; margin-right: 2%" class="btn btn-primary pull-right" data-toggle="modal" data-target="#modal-default">
                <i class="fa fa-plus-circle"></i>
                Registrar usuario
              </button>
            </center>			
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped" >
                <thead style="background-color: aqua;">
                <tr>
                  <th>No.</th>
                  <th>NOMBRE</th>
                  <th>APELLIDO</th>
                  <th>NO. DOCUMENTO</th>
                  <th>TIPO DOCUMENTO</th>
                  <th>GENERO</th>
                  <th>EMAIL</th>
                  <th>EDITAR</th>
                  <th>ELIMINAR</th>
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
                              <td>
                                <center>
                                  <a class="btn btn-success btn-sm modal-edit" title="Editar" href="/registroClientes/{{ $us->id }}/edit"><i class="fa fa-pencil"></i></a>
                                </center>
                              </td>  
                              <td>
                                <center>
                                  <a class="btn btn-danger btn-sm modal-delete" title="Eliminar" href="/registroClientes/{{ $us->id }}"><i class="fa fa-trash-o"></i></a>
                                </center>
                              </td>
                            </tr>
                            @endforeach
                </tbody>
                <tfoot style="background-color: aqua;">
                <tr>
                  <th>No.</th>
                  <th>NOMBRE</th>
                  <th>APELLIDO</th>
                  <th>NO. DOCUMENTO</th>
                  <th>TIPO DOCUMENTO</th>
                  <th>GENERO</th>
                  <th>EMAIL</th>
                  <th>EDITAR</th>
                  <th>ELIMINAR</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
      <!--modal inserta rol del usuario-->
      <div class="modal modal-primary fade" id="modal-default">
      	<div class="modal-dialog">
            <div class="modal-content">
	            <form method="POST" action="{{ route('registroRolUsuarios.store') }}" enctype="multipart/form-data">
    				    @csrf
    	            <div class="modal-header">
    	                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    	                  <span aria-hidden="true">&times;</span></button>
    	                <h4 class="modal-title">Registrar rol</h4>
    	            </div>
    	            <div class="modal-body">
            					<!--ingresar roles-->
            					<div class="form-group">
          					    <input id="nombre" type="text" name="nombre" class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}" value="{{ old('nombre') }}" required autofocus placeholder="Nombre del rol">
          					    @if ($errors->has('nombre'))
          					        <span class="invalid-feedback" role="alert">
          					            <strong>{{ $errors->first('nombre') }}</strong>
          					        </span>
          					    @endif
          					 </div> 
          				</div>
          	      <div class="modal-footer">
          					<button type="submit" class="btn btn-outline" id="btncrear">Guardar</button>
          	        <button type="button" class="btn btn-outline" data-dismiss="modal">Close</button>
          	      </div>
    				  </form>
            </div>
          </div>
        </div>
        <!-- fin modal insertar -->
        
</section>
    
