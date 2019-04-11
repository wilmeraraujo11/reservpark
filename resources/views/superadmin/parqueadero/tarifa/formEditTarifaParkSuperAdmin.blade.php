<form method="POST" action="/registroTarifaParkSuperAdmin/{{ $tarifa->id }}" enctype="multipart/form-data">
  @method('PUT')
  @csrf
  <!--ingresar tipo de documento-->
    <div class="edit-modal" id="editmodal">
      <div class="col-sm-6">
          Nombre tarifa
          <div class="form-group">
            <input id="editnomtarifa" type="text" name="editnomtarifa" value="{{ $tarifa->nombre }}" class="form-control" required autofocus placeholder="Nombre de la tarifa">
          </div>
          Adicional
          <div class="form-group">
            <input id="editadicional" type="text" name="editadicional" value="{{ $tarifa->adicional }}" class="form-control" required autofocus placeholder="Adicional de la tarifa">
          </div>
      </div>
      <div class="col-sm-6">
        Valor
        <div class="form-group">
          <input id="editvalor" type="number" name="editvalor" value="{{ $tarifa->valor }}" class="form-control" required autofocus placeholder="Valor de la tarifa">
        </div>
        Parqueadero
        <div class="form-group">
          <select id="editpark" name="editpark" class="form-control">
            <option value="{{ $tarifa->parqueadero_id}}">{{ $tarifa->parqueadero->nombre }}</option>
              @foreach($park as $p)
                 <option value="{{ $p->id }}">{{ $p->nombre }}</option>
               @endforeach
          </select>
        </div>  
      </div>

    </div>
    <div class="modal-footer">
      <button type="submit" class="btn btn-success"">Actualizar</button>
      <button type="button" class="btn btn-warning" data-dismiss="modal">Cerrar</button>
    </div>
</form>