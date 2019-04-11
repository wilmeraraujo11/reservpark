<!--modal inserta tipo documento del usuario-->
<div class="modal modal-default fade" id="modal-default">
  <div class="modal-dialog">
      <div class="modal-content" style="background-color: #dfdfdf;">
        <form method="POST" action="{{ route('registroTarifaParkSuperAdmin.store') }}" enctype="multipart/form-data">
          @csrf
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Registrar tarifa</h4>
            </div>
            <div class="modal-body">
              <div class="col-sm-12">
                <div class="form-group">
                  <input id="nomtarifa" type="text" name="nomtarifa" class="form-control" required autofocus placeholder="Nombre de la tarifa">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <select id="select-tipo-park" name="tipo_park" class="form-control">
                    <option value="">--Seleccione tipo parqueadero--</option> 
                      @foreach($tipo_park as $tp)
                         <option value="{{ $tp->id }}">{{ $tp->nombre }}</option>
                       @endforeach
                  </select>
                </div>
                
                <div class="form-group">
                  <select id="select-valor" name="vr_tarifa" class="form-control">
                    <option value="">--Valor deshabilitado--</option>
                  </select>
                </div>  
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <select id="select-park" name="park" class="form-control">
                    <option value="">--Parqueaderos deshabilitado--</option> 
                  </select>
                </div> 
                
                <div class="form-group">
                  <select id="select-valor-adicional" name="vr_adicional" class="form-control">
                    <option value="">--Valor adicional deshabilitado--</option>
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
