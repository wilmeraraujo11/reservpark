<form method="POST" action="/registroTipoParkSuperAdmin/{{ $tipo_park->id }}" enctype="multipart/form-data">
  @method('PUT')
  @csrf
  <!--ingresar tipo de documento-->
    <div class="edit-modal" id="editmodal">
      CC
      <div class="form-group">
        <input id="edittpark" type="text" name="edittpark" class="form-control" value="{{ $tipo_park->nombre }}" required autofocus>
      </div>
      Descripción
      <div class="form-group">
        <input id="editdesc" type="text" name="editdesc" class="form-control" value="{{ $tipo_park->descripcion }}" required autofocus>
      </div> 
    </div>
    <div class="modal-footer">
      <button type="submit" class="btn btn-success"">Actualizar</button>
      <button type="button" class="btn btn-warning" data-dismiss="modal">Cerrar</button>
    </div>
</form>