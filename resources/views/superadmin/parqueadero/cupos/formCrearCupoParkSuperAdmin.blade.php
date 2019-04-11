<!--modal inserta tipo documento del usuario-->
<div class="modal modal-default fade" id="modal-default">
  <div class="modal-dialog">
      <div class="modal-content" style="background-color: #dfdfdf;">
        <form method="POST" action="{{ route('registroCupoParkSuperAdmin.store') }}" enctype="multipart/form-data">
          @csrf
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Registrar cupos</h4>
            </div>
            <div class="modal-body">
              <div class="col-sm-6">
                Parqueadero
                <div class="form-group">
                  <select id="select-park" name="park" class="form-control">
                    <option value="">--Seleccione parqueadero--</option>
                    @foreach($park as $pa)
                         <option value="{{ $pa->id }}">{{ $pa->nombre }}</option>
                      @endforeach
                  </select>    
                </div>
                Cantidad de cupos
                <div class="form-group">
                  <input id="cantcupo" type="number" name="cantcupo" class="form-control" required autofocus placeholder="Cantidad de cupos">
                </div>
                
              </div>
              <div class="col-sm-6">
                Pisos
                <div class="form-group">
                  <select id="select-piso" name="piso" class="form-control">
                    <option value="">--Pisos deshabilitado--</option>
                  </select>
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

