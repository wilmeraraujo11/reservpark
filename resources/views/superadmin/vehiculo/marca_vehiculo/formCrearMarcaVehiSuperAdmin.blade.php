<!--modal inserta rol del usuario-->
<div class="modal modal-default fade" id="modal-default">
  <div class="modal-dialog">
      <div class="modal-content" style="background-color: #dfdfdf;">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Registrar marca de vehiculo</h4>
        </div>

        <form method="POST" action="#" enctype="multipart/form-data">
          @csrf
           <div class="modal-body col-sm-12">
              <!--Nombres-->
              <div class="form-group">
                <input id="marca" type="text" name="marca" class="form-control" required autofocus placeholder="Nombre marca vehiculo">
              </div>  
          </div>                             
          <div class="modal-footer">
              <button type="submit" class="btn btn-primary" id="btncrear">Guardar</button>
             <button type="button" class="btn btn-warning" data-dismiss="modal">Cerrar</button>
        </div>
      </form>
      </div>
    </div>
  </div>
        <!-- fin modal insertar -->