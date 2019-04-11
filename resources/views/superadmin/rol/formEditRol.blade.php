<form method="POST" action="/registroRolUsuarios/{{ $rol->id }} }" enctype="multipart/form-data">
  @method('PUT')
  @csrf
  <!--ingresar roles-->
    <div class="edit-modal" id="editmodal">
      <div class="form-group">
        <input id="nombre" type="text" name="nombre" class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}" value="{{ $rol->nombre }}" required autofocus>
        @if ($errors->has('nombre'))
          <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('nombre') }}</strong>
          </span>
        @endif
      </div> 
    </div>
    <div class="modal-footer">
      <button type="submit" class="btn btn-outline" id="btncrear">Actualizar</button>
      <button type="button" class="btn btn-outline pull-right" data-dismiss="modal">Cerrar</button>
    </div>
</form>