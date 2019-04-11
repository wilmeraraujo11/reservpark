<!--modal inserta tipo documento del usuario-->
<div class="modal modal-default fade" id="modal-default">
  <div class="modal-dialog">
      <div class="modal-content" style="background-color: #dfdfdf;">
        <form method="POST" action="{{ route('reservas.store') }}" enctype="multipart/form-data">
          @csrf
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Registrar parqueadero</h4>
            </div>
            <div class="modal-body">
              <div class="col-sm-6">
                <!--id parqueadero-->
                @foreach($nombrepark as $np)
                  <input type="hidden" name="id_park" value="{{ $np->parqueadero->id }}" >
                @endforeach  
                <!--documento de identificación-->
                No. Documento
                <div class="form-group">
                  <input id="nodoc" type="number" name="nodoc" class="form-control" max="9999999999" required autofocus placeholder="Ingrese documento de identificación">
                </div>
                Pisos
                <div class="form-group">
                  <select id="select-piso" name="piso" class="form-control">
                    <option value="">--Seleccione piso--</option>
                    @foreach($pisos as $pi)
                         <option value="{{ $pi->id }}">{{ $pi->nombre }}</option>
                      @endforeach
                  </select>    
                </div>
              </div> 
              <div class="col-sm-6"> 
                <!--placa vehiculo-->
                Placa
                <div class="form-group">
                  <input id="placa" type="text" name="placa" pattern='[A-Z]{3}[0-9]{3}' class="form-control" required autofocus placeholder="AAA999">
                </div>
                Cupos
                <div class="form-group">
                  <select id="select-cupo" name="cupo" class="form-control">
                    <option value="">--Cupos deshabilitado--</option>
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
