<!--modal inserta tipo documento del usuario-->
<div class="modal modal-default fade" id="modal-default">
  <div class="modal-dialog">
      <div class="modal-content" style="background-color: #dfdfdf;">
        <form method="POST" action="{{ route('registroUbicacionSuperAdmin.store') }}" enctype="multipart/form-data">
          @csrf
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Registrar lugar de ubicación</h4>
            </div>
            <div class="modal-body">
              <div class="form-group">
                <input id="cod" type="number" name="cod" class="form-control" required autofocus placeholder="codigo">
              </div>
              <div class="form-group">
                <input id="nom" type="text" name="nom" class="form-control" required autofocus placeholder="Nombre">
              </div>
              <div class="form-group">
                <input id="tipo" type="number" name="tipo" class="form-control" required autofocus placeholder="tipo">
              </div>
              <div class="form-group">
                <input id="desc_tipo" type="text" name="desc_tipo" class="form-control" required autofocus placeholder="Descripcion">
              </div>    
              <div class="form-group">
                <input id="id_padre" type="number" name="id_padre" class="form-control" required autofocus placeholder="id padre">
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
<!--fin modal inserta tipo documento del usuario-->     
