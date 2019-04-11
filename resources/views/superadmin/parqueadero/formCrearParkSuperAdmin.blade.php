<!--modal inserta tipo documento del usuario-->
<div class="modal modal-default fade" id="modal-default">
  <div class="modal-dialog">
      <div class="modal-content" style="background-color: #dfdfdf;">
        <form method="POST" action="{{ route('registroParkSuperAdmin.store') }}" enctype="multipart/form-data">
          @csrf
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Registrar parqueadero</h4>
            </div>
            <div class="modal-body">
              <div class="col-sm-6">
                <!--Nombre del parqueadero-->
                <div class="form-group">
                  <input id="nom" type="text" name="nom" class="form-control" required autofocus placeholder="Nombre">
                </div>
                <!--Dirección del parqueadero-->
                <div class="form-group">
                  <input id="dir" type="text" name="dir" class="form-control" required autofocus placeholder="Dirección">
                </div>
                <!--Longitud del parqueadero-->
                <div class="form-group">
                  <input id="long" type="text" name="long" class="form-control" required autofocus placeholder="Longitud">
                </div>
                <!--Nit del parqueadero-->
                <div class="form-group">
                  <input id="nit" type="text" name="nit" class="form-control" required autofocus placeholder="Nit">
                </div>
              </div>
              <div class="col-sm-6"> 
                <!--Lugar de Ubicación  de parqueadero-->
                <div class="form-group">
                <select id="ubi" name="ubi" class="form-control">
                  <option value="">--Seleccione Ciudad--</option>
                    @foreach($ubicacion as $u)
                       <option value="{{ $u->id }}">{{ $u->nombre }}</option>
                     @endforeach
                </select>
                </div>
                <!--Telefono del parqueadero-->
                <div class="form-group">
                  <input id="tel" type="text" name="tel" class="form-control" required autofocus placeholder="Telefono">
                </div>   
                <!--Latitud del parqueadero-->
                <div class="form-group">
                  <input id="lat" type="text" name="lat" class="form-control" required autofocus placeholder="Latitud">
                </div>
                <!--Rut del parqueadero-->
                <div class="form-group">
                  <input id="rut" type="text" name="rut" class="form-control" required autofocus placeholder="Rut">
                </div>   
              </div>  
              <div class="col-sm-12">
                <!--Tipo  de parqueadero-->
                <div class="form-group">
                <select id="tipo_park" name="tipo_park" class="form-control">
                  <option value="">--Seleccione tipo de parqueadero--</option>
                    @foreach($tipo_park as $tp)
                       <option value="{{ $tp->id }}">{{ $tp->nombre }} :{{ $tp->descripcion }}</option>
                     @endforeach
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
