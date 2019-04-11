<!--modal inserta tipo documento del usuario-->
<div class="modal modal-default fade" id="modal-default">
  <div class="modal-dialog">
      <div class="modal-content" style="background-color: #dfdfdf;">
        <form method="POST" action="{{ route('registroPisoParkSuperAdmin.store') }}" enctype="multipart/form-data">
          @csrf
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Registrar piso</h4>
            </div>
            <div class="modal-body">
              <div class="col-sm-6">
                <div class="form-group">
                  <select id="park" name="park" class="form-control">
                    <option value="">--Seleccione parqueadero--</option>
                      @foreach($park as $p)
                         <option value="{{ $p->id }}">{{ $p->nombre }}</option>
                       @endforeach
                  </select>
                </div> 
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <input id="cantpiso" type="number" name="cantpiso" class="form-control" required autofocus placeholder="Número de pisos">
                </div>  
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
