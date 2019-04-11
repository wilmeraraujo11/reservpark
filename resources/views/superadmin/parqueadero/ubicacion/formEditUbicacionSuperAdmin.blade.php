<form method="POST" action="/registroUbicacionSuperAdmin/{{ $ubicacion->id }}" enctype="multipart/form-data">
  @method('PUT')
  @csrf
  <!--ingresar tipo de documento-->
    <div class="edit-modal" id="editmodal">
      Código
      <div class="form-group">
        <input id="editcod" type="number" name="editcod" class="form-control" value="{{ $ubicacion->codigo }}" required autofocus placeholder="codigo">
      </div>
      Nombre
      <div class="form-group">
        <input id="editnom" type="text" name="editnom" class="form-control" value="{{ $ubicacion->nombre }}" required autofocus placeholder="Nombre">
      </div>
      Tipo
      <div class="form-group">
        <input id="edittipo" type="number" name="edittipo" class="form-control" value="{{ $ubicacion->tipo }}" required autofocus placeholder="tipo">
      </div>
      Descripción tipo
      <div class="form-group">
        <input id="editdesc_tipo" type="text" name="editdesc_tipo" class="form-control" value="{{ $ubicacion->descripcion_tipo }}" required autofocus placeholder="Descripcion">
      </div>
      Id lugar padre    
      <div class="form-group">
        <input id="editid_padre" type="number" name="editid_padre" class="form-control" value="{{ $ubicacion->id_padre }}" required autofocus placeholder="id padre">
      </div>
    </div>
    <div class="modal-footer">
      <button type="submit" class="btn btn-success"">Actualizar</button>
      <button type="button" class="btn btn-warning" data-dismiss="modal">Cerrar</button>
    </div>
</form>