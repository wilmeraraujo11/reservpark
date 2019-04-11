<form method="POST" action="/registroMarcaVehiculosSuperAdmin/{{ $marca->id }}" enctype="multipart/form-data">
  @method('PUT')
  @csrf
   <div class="modal-body">
     Nombre marca vehiculo
     <div class="form-group">
       <input id="editmarca" type="text" name="editmarca" class="form-control" required autofocus placeholder="Nombre tipo de vehiculo" value="{{ $marca->nombre }}">
     </div> 
    
    <div class="modal-footer">
      <button type="submit" class="btn btn-success">Actualizar</button>
      <button type="button" class="btn btn-warning pull-right" data-dismiss="modal">Cerrar</button>
    </div>
</form>

