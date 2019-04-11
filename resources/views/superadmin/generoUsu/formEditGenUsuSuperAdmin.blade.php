<form method="POST" action="/registroGeneroUsuarios/{{ $genero->id }}" enctype="multipart/form-data">
  @method('PUT')
  @csrf
  <!--actualizar genero-->
    <div class="edit-modal" id="editmodal">
      Genero
      <div class="form-group">
        <input id="editgen" type="text" name="editgen" class="form-control" value="{{ $genero->nombre }}" required autofocus>
      </div>
      Descripción
      <div class="form-group">
        <input id="editdesc" type="text" name="editdesc" class="form-control" value="{{ $genero->descripcion }}" required autofocus>
      </div> 
    </div>
    <div class="modal-footer">
      <button type="submit" class="btn btn-success"">Actualizar</button>
      <button type="button" class="btn btn-warning" data-dismiss="modal">Cerrar</button>
    </div>
</form>