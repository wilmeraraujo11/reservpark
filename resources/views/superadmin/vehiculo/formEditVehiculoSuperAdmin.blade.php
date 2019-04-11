<form method="POST" action="/registroVehiculosSuperAdmin/{{ $vehiculo->id }}" enctype="multipart/form-data">
  @method('PUT')
  @csrf
   <div class="modal-body">
     <div class="modal-body col-sm-6">
        <!--placa-->
        <div class="form-group">
          <input id="editplaca" type="text" name="editplaca" class="form-control" required autofocus placeholder="placa [AAA000]" value="{{ $vehiculo->placa }}">
        </div>  

        <!--marca-->
        <div class="form-group">
          <select id="editmarca" name="editmarca" class="form-control">
              <option value="{{ $vehiculo->id_marca }}">{{ $vehiculo->marca_vehiculo->nombre }}</option>
              @foreach($marca_vehiculo as $mv)
                 <option value="{{ $mv->id }}">{{ $mv->nombre }}</option>
              @endforeach
          </select>
        </div>
    </div>   
       <div class="modal-body col-sm-6">
          <!--color-->
          <div class="form-group">
            <input id="editcolor" type="text" name="editcolor" class="form-control" required autofocus placeholder="Color" value="{{ $vehiculo->color }}">
          </div>
          <!--id tipo vehiculo-->
          <div class="form-group">
            <select id="editid_tipo_vehiculo" name="editid_tipo_vehiculo" class="form-control">
              <option value="{{ $vehiculo->id_tipo_vehiculo }}">{{ $vehiculo->tipo_vehiculo->nombre }}</option>
                @foreach($tipo_vehiculo as $tv)
                   <option value="{{ $tv->id }}">{{ $tv->nombre }}</option>
                 @endforeach
              </select>
          </div>
      </div>
    
    <div class="modal-footer">
      <button type="submit" class="btn btn-success">Actualizar</button>
      <button type="button" class="btn btn-warning pull-right" data-dismiss="modal">Cerrar</button>
    </div>
</form>

