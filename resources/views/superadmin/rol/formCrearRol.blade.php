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