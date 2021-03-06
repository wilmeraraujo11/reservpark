<form method="POST" action="/valor_tarifa/{{ $valor_tarifa->id }}" enctype="multipart/form-data">
  @method('PUT')
  @csrf
  <!--ingresar tipo de documento-->
    <div class="edit-modal" id="editmodal">
      <div class="col-sm-6">
        <!--valor tarifa-->
        <div class="form-group">
          <input id="vr_tarifaedit" type="number" name="vr_tarifaedit" class="form-control" placeholder="Valor tarifa" value="{{ $valor_tarifa->vr_tarifa }}" required autofocus>
        </div>  
      </div>
      <div class="col-sm-6">
        <!--tipo park-->
        <div class="form-group">
          <select id="tipo_parkedit" name="tipo_parkedit" class="form-control">
            @foreach($tipo_park_vr as $tp)
              <option value="{{ $tp->id }}"> {{ $tp->nombre }}</option>
            @endforeach
              @foreach($tipo_park as $t)
                 <option value="{{ $t->id }}">{{ $t->nombre }}</option>
               @endforeach()
          </select>
        </div>  
      </div>

    </div>
    <div class="modal-footer">
      <button type="submit" class="btn btn-success"">Actualizar</button>
      <button type="button" class="btn btn-warning" data-dismiss="modal">Cerrar</button>
    </div>
</form>