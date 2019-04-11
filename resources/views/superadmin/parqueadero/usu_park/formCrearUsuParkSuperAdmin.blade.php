<!--modal inserta tipo documento del usuario-->
<div class="modal modal-default fade" id="modal-default">
  <div class="modal-dialog">
      <div class="modal-content" style="background-color: #dfdfdf;">
        <form method="POST" action="{{ route('registroUsuParkSuperAdmin.store') }}" enctype="multipart/form-data">
          @csrf
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Asignar parqueadero a usuario</h4>
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
                <div class="form-group">
                  <select id="select-usu" name="usu" class="form-control">
                    <option value="">--Usuarios deshabilitado--</option>
                  </select>
                </div> 
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <select id="select-rol" name="rol" class="form-control">
                    <option value="">--Seleccione rol--</option>
                      @foreach($rols as $r)
                         <option value="{{ $r->id }}">{{ $r->nombre }}</option>
                       @endforeach
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
