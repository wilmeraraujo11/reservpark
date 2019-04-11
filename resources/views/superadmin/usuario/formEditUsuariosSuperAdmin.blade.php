<form method="POST" action="/registrousuarios/{{ $users->id }}" enctype="multipart/form-data">
  @method('PUT')
  @csrf
  
  <div class="modal-body">
    <div class="col-sm-6">
      <!--tipo de documento-->
        Tipo de documento
        <div class="form-group">
        <select id="edittdoc" name="edittdoc" class="form-control">
          @foreach($users2 as $us2)
           <option value="{{ $us2->id_tdoc }}">{{ $us2->tdoc }}</option>
          @endforeach
          @foreach($tipodoc as $td)
             <option value="{{ $td->id }}">{{ $td->nombre }}</option>
           @endforeach()
         </select>
        </div>
        
        <!--Nombres-->
        Nombres
        <div class="form-group">
          <input id="editname" type="text" name="editname" class="form-control{{ $errors->has('editname') ? ' is-invalid' : '' }}" value="{{ $users->name }}" required autofocus placeholder="Nombres">
          @if ($errors->has('editname'))
              <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('editname') }}</strong>
              </span>
          @endif
        </div> 
        <!--Direccion-->
        Dirección
        <div class="form-group">
          <input id="editdir" type="text" name="editdir" class="form-control{{ $errors->has('editdir') ? ' is-invalid' : '' }}" value="{{ $users->dir }}" required autofocus placeholder="Dirección">
          @if ($errors->has('editdir'))
              <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('editdir') }}</strong>
              </span>
          @endif
        </div>
          
        <!--Password-->
        Contraseña
        <div class="form-group">
          <input id="editpassword" type="text" name="editpassword" class="form-control{{ $errors->has('editpassword') ? ' is-invalid' : '' }}" required autofocus value placeholder="Contraseña">
          @if ($errors->has('editpassword'))
              <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('editpassword') }}</strong>
              </span>
          @endif
        </div>
        <!--Rol-->
        Rol
        <div class="form-group">
          <select id="editid_rol" name="editid_rol" class="form-control">
            @foreach($users2 as $us2)
            <option value="{{ $us2->id_rol }}">{{ $us2->nombre }}</option>
            @endforeach
            @foreach($rols as $rl)
              <option value="{{ $rl->id }}">{{ $rl->nombre }}</option>
            @endforeach()
          </select>
        </div>
        
      </div>      
      <div class="col-sm-6">
                             <!--numero de documento-->
    Número de documneto         
    <div class="form-group">
      <input id="editno_documento" type="number" name="editno_documento" class="form-control{{ $errors->has('editno_documento') ? ' is-invalid' : '' }}" value="{{ $users->no_documento }}" required autofocus placeholder="Número de documento">
      @if ($errors->has('editno_documento'))
          <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('editno_documento') }}</strong>
          </span>
      @endif
    </div>
              <!--Apellidos-->
              Apellidos
              <div class="form-group">
                <input id="editape" type="text" name="editape" class="form-control{{ $errors->has('editape') ? ' is-invalid' : '' }}" value="{{ $users->ape }}" required autofocus placeholder="Apellidos">
                @if ($errors->has('editape'))
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('editape') }}</strong>
                    </span>
                @endif
              </div> 
              <!--Telefono-->
              No. Telefonico
              <div class="form-group">
                <input id="edittel" type="number" name="edittel" class="form-control{{ $errors->has('edittel') ? ' is-invalid' : '' }}" value="{{ $users->tel }}" required autofocus placeholder="Telefono">
                @if ($errors->has('edittel'))
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('edittel') }}</strong>
                    </span>
                @endif
              </div>
              <!--Genero-->
              Genero
              <div class="form-group">
              <select  name="editgen" id="editgen" class="form-control">
                @foreach($users2 as $us2)
                  <option value="{{ $us2->id_gen }}">{{ $us2->gen }}</option>
                @endforeach
                @foreach($genero as $g)
                  <option value="{{ $g->id }}">{{ $g->descripcion }}</option>
                @endforeach
              </select>
              </div>
            <!--Email-->
            Correo electronico
              <div class="form-group">
                <input id="editemail" type="email" name="editemail" class="form-control{{ $errors->has('editemail') ? ' is-invalid' : '' }}" value="{{ $users->email }}" required autofocus placeholder="Correo electronico">
                @if ($errors->has('editemail'))
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('editemail') }}</strong>
                    </span>
                @endif
              </div>
            </div>
                              
                                 
          </div>             
    
    <div class="modal-footer">
      <button type="submit" class="btn btn-success" id="btncrear">Actualizar</button>
      <button type="button" class="btn btn-warning pull-right" data-dismiss="modal">Cerrar</button>
    </div>
</form>

