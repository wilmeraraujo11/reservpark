<form method="POST" action="/reservas/{{ $reserva->id }}" enctype="multipart/form-data">
      @method('DELETE')
      @csrf
      <p class="text-center">
            <input type="hidden" name="idCupo" value="{{ $reserva->cupo_id }}">
            ¿Esta seguro de cancelar esta reserva?
      </p>
      <hr>
      <center>
         <button type="submit" class="btn btn-outline">Si</button>
         <button type="button" class="btn btn-outline" data-dismiss="modal">No</button> 
      </center>
</form>
