<!--modal inserta adional valor tarifa-->
<div class="modal modal-default fade" id="modal-default">
  <div class="modal-dialog">
      <div class="modal-content" style="background-color: #dfdfdf;">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Registrar valor adicional tarifa</h4>
        </div>

        <form method="POST" action="{{ route('adicional_vr_tarifa.store') }}" enctype="multipart/form-data">
          @csrf
           <div class="modal-body col-sm-12">
              <div class="col-sm-6">
                <!--valor tarifa-->
                <div class="form-group">
                  <input id="vr_adicional" type="number" name="vr_adicional" class="form-control" placeholder="Valor adiconal" required autofocus>
                </div>  
              </div>
              <div class="col-sm-6">
                <!--tipo park-->
                <div class="form-group">
                  <select id="tipo_park" name="tipo_park" class="form-control">
                    <option value="">--Seleccione tipo parqueadero--</option>
                      @foreach($tipo_park as $t)
                         <option value="{{ $t->id }}">{{ $t->nombre }}</option>
                       @endforeach()
                  </select>
                </div>  
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