<!--modal inserta rol del usuario-->
<div class="modal modal-default fade" id="modal-default">
  <div class="modal-dialog">
      <div class="modal-content" style="background-color: #dfdfdf;">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Registrar vehiculo</h4>
        </div>

        <form method="POST" action="#" enctype="multipart/form-data">
          @csrf
           <div class="modal-body col-sm-6">
              <!--placa-->
              <div class="form-group">
                <input id="placa" type="text" name="placa" class="form-control" required autofocus placeholder="placa [AAA000]">
              </div>  

              <!--marca-->
              <div class="form-group">
                <select id="marca" name="marca" class="form-control">
                  <option value="">--Seleccione marca de vehiculo--</option>
                    @foreach($marca as $m)
                       <option value="{{ $m->id }}">{{ $m->nombre }}</option>
                     @endforeach()
                </select>
              </div>
           </div>   
           <div class="modal-body col-sm-6">
              <!--color-->
              <div class="form-group">
                <input id="color" type="text" name="color" class="form-control" required autofocus placeholder="Color">
              </div>
              <!--id tipo vehiculo-->
              <div class="form-group">
                <select id="id_tipo_vehiculo" name="id_tipo_vehiculo" class="form-control">
                  <option value="">--Seleccione tipo de vehiculo--</option>
                    @foreach($tipo_vehiculo as $tv)
                       <option value="{{ $tv->id }}">{{ $tv->nombre }}</option>
                     @endforeach()
                  </select>
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