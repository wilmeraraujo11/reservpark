<form method="POST" action="/registroTarifaParkSuperAdmin/{{ $tarifa->id }}" enctype="multipart/form-data">
      @method('DELETE')
      @csrf
      <p class="text-center">
            ¿Deseas eliminar este registro?
      </p>
      <hr>
      <center>
         <button type="submit" class="btn btn-outline">Si</button>
         <button type="button" class="btn btn-outline" data-dismiss="modal">No</button> 
      </center>
      

</form>
