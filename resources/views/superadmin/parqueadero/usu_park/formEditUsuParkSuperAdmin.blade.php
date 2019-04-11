<form method="POST" action="/registroUsuParkSuperAdmin/{{ $park_usu->id }}" enctype="multipart/form-data">
  @method('PUT')
  @csrf
  <!--ingresar tipo de documento-->
    <div class="edit-modal" id="editmodal">
      <div class="col-sm-6">
        pendiente modulo de actuazlizar asignacion de parqueadero a usuarios 
        Parqueadero
        <div class="form-group">
          <select id="park" name="editpark" class="form-control">
            <option value="{{ $park_usu->id_parqueadero }}">{{ $park_usu->parqueadero->nombre }}</option>
              @foreach($park as $p)
                 <option value="{{ $p->id }}">{{ $p->nombre }}</option>
               @endforeach
          </select>
        </div>
        Usuario
        <div class="form-group">
          <select id="select-usu-edit" name="select-rol-edit" class="form-control">
            <option value="">--Usuarios deshabilitado--</option>
          </select>
        </div> 
      </div>
      <div class="col-sm-6">
        Rol 
        <div class="form-group">
          <select id="select-rol-edit" name="select-rol-edit" class="form-control">
            <option value="">--Seleccione rol--</option>
              @foreach($rols as $r)
                 <option value="{{ $r->id }}">{{ $r->nombre }}</option>
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