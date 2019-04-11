<!--modal inserta genero del usuario-->
<div class="modal modal-default fade" id="modal-default">
  <div class="modal-dialog">
      <div class="modal-content" style="background-color: #dfdfdf;">
        <form method="POST" action="{{ route('registroGeneroUsuarios.store') }}" enctype="multipart/form-data">
          @csrf
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Registrar genero de usuario</h4>
            </div>
            <div class="modal-body">
              <div class="form-group">
                <input id="gen" type="text" name="gen" class="form-control" required autofocus placeholder="Nombre">
              </div>  

              <div class="form-group">
                <input id="desc" type="text" name="desc" class="form-control" required autofocus placeholder="Descripción">
              </div>  
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary" id="btncrear">Guardar</button>
              <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
            </div>
        </form>
      </div>
    </div>
  </div>
<!--fin modal inserta genero del usuario-->     
