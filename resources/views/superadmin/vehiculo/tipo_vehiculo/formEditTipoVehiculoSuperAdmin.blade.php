<form method="POST" action="/registroTipoVehiculosSuperAdmin/{{ $Tipo_vehiculo->id }}" enctype="multipart/form-data">
  @method('PUT')
  @csrf
   <div class="modal-body">
     Nombre tipo vehiculo
     <div class="form-group">
       <input id="editnombre" type="text" name="editnombre" class="form-control" required autofocus placeholder="Nombre tipo de vehiculo" value="{{ $Tipo_vehiculo->nombre }}">
     </div> 
    
    <div class="modal-footer">
      <button type="submit" class="btn btn-success">Actualizar</button>
      <button type="button" class="btn btn-warning pull-right" data-dismiss="modal">Cerrar</button>
    </div>
</form>

