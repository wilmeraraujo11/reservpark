<form method="POST" action="/registroPisoParkSuperAdmin/{{ $piso->id }}" enctype="multipart/form-data">
  @method('PUT')
  @csrf
  <!--ingresar tipo de documento-->
    <div class="edit-modal" id="editmodal">
      <div class="col-sm-6">
        Parqueadero
        <div class="form-group">
          <select id="edipark" name="editpark" class="form-control">
            <option value="{{ $piso->id }}">{{ $piso->parqueadero->nombre }}</option>
              @foreach($park as $p)
                 <option value="{{ $p->id }}">{{ $p->nombre }}</option>
               @endforeach
          </select>
        </div> 
      </div>
      <div class="col-sm-6">
        Cantidad de pisos 
        <div class="form-group">
          <input id="editnom" type="number" name="editnom" value="{{ $piso->nombre }}" class="form-control" required autofocus placeholder="Número piso">
        </div>  
      </div>

    </div>
    <div class="modal-footer">
      <button type="submit" class="btn btn-success"">Actualizar</button>
      <button type="button" class="btn btn-warning" data-dismiss="modal">Cerrar</button>
    </div>
</form>