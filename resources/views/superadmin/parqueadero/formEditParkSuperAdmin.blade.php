<form method="POST" action="/registroParkSuperAdmin/{{ $park->id }}" enctype="multipart/form-data">
  @method('PUT')
  @csrf
  <!--ingresar tipo de documento-->
    <div class="edit-modal" id="editmodal">
      <div class="col-sm-6">
                <!--Nombre del parqueadero-->
                <div class="form-group">
                  <input id="editnom" type="text" name="editnom" value="{{ $park->nombre }}" class="form-control" required autofocus placeholder="Nombre">
                </div>
                <!--Dirección del parqueadero-->
                <div class="form-group">
                  <input id="editdir" type="text" name="editdir" value="{{ $park->direccion }}" class="form-control" required autofocus placeholder="Dirección">
                </div>
                <!--Longitud del parqueadero-->
                <div class="form-group">
                  <input id="editlong" type="text" name="editlong" value="{{ $park->longitud }}" class="form-control" required autofocus placeholder="Longitud">
                </div>
                <!--Nit del parqueadero-->
                <div class="form-group">
                  <input id="editnit" type="text" name="editnit" value="{{ $park->nit }}" class="form-control" required autofocus placeholder="Nit">
                </div>
              </div>
              <div class="col-sm-6"> 
                <!--Lugar de Ubicación  de parqueadero-->
                <div class="form-group">
                <select id="editubi" name="editubi" class="form-control">
                  <option value="{{ $park->id }}">{{ $park->ubicacion->nombre }}</option>
                    @foreach($ubicacion as $u)
                       <option value="{{ $u->id }}">{{ $u->nombre }}</option>
                     @endforeach
                </select>
                </div>
                <!--Telefono del parqueadero-->
                <div class="form-group">
                  <input id="edittel" type="text" name="edittel" value="{{ $park->telefono }}" class="form-control" required autofocus placeholder="Telefono">
                </div>   
                <!--Latitud del parqueadero-->
                <div class="form-group">
                  <input id="editlat" type="text" name="editlat" value="{{ $park->latitud }}" class="form-control" required autofocus placeholder="Latitud">
                </div>
                <!--Rut del parqueadero-->
                <div class="form-group">
                  <input id="editrut" type="text" name="editrut" value="{{ $park->rut }}" class="form-control" required autofocus placeholder="Rut">
                </div>   
              </div>  
              <div class="col-sm-12">
                <!--Tipo  de parqueadero-->
                <div class="form-group">
                <select id="edittipo_park" name="edittipo_park" class="form-control">
                  <option value="{{ $park->id }}">{{ $park->tipo_park->nombre }} : {{ $park->tipo_park->descripcion }}</option>
                    @foreach($tipo_park as $tp)
                       <option value="{{ $tp->id }}">{{ $tp->nombre }} :{{ $tp->descripcion }}</option>
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