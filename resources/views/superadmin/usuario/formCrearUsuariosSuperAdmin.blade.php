     <!--modal inserta rol del usuario-->
      <div class="modal modal-default fade" id="modal-default">
        <div class="modal-dialog">
            <div class="modal-content" style="background-color: #dfdfdf;">
              <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title">Registrar usuario</h4>
                  </div>
              <form method="POST" action="{{ route('registrousuarios.store') }}" enctype="multipart/form-data">
                @csrf
              <!--tipo de documento-->

                <div class="modal-body">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <select id="tdoc" name="tdoc" class="form-control">
                           <option value="">--Seleccione documento--</option>
                          @foreach($tipodoc as $td)
                             <option value="{{ $td->id }}">{{ $td->nombre }}</option>
                           @endforeach()
                         </select>
                      </div>
                      
                    <!--Nombres-->
                    <div class="form-group">
                      <input id="name" type="text" name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{ old('name') }}" required autofocus placeholder="Nombres">
                       @if ($errors->has('name'))
                          <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('name') }}</strong>
                          </span>
                      @endif
                    </div>  
                    <!--Direccion-->
                    <div class="form-group">
                      <input id="dir" type="text" name="dir" class="form-control{{ $errors->has('dir') ? ' is-invalid' : '' }}" value="{{ old('dir') }}" required autofocus placeholder="Dirección">
                      @if ($errors->has('dir'))
                          <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('dir') }}</strong>
                          </span>
                      @endif
                    </div>
                    <!--Password-->
                    <div class="form-group">
                      <input id="password" type="password" name="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" required autofocus placeholder="Contraseña">
                      @if ($errors->has('password'))
                          <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('password') }}</strong>
                          </span>
                      @endif
                    </div>
                    <!--Rol-->
                    <div class="form-group">
                      <select id="id_rol" name="id_rol" class="form-control">
                         <option value="">--Seleccione rol--</option>
                        @foreach($rols as $rl)
                           <option value="{{ $rl->id }}">{{ $rl->nombre }}</option>
                         @endforeach()
                       </select>
                    </div>
                </div>
                <div class="col-sm-6">              
                  <!--numero de documento-->
                    <div class="form-group">
                      <input id="no_documento" type="number" name="no_documento" class="form-control{{ $errors->has('no_documento') ? ' is-invalid' : '' }}" value="{{ old('no_documento') }}" required autofocus placeholder="Número de documento">
                      @if ($errors->has('no_documento'))
                          <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('no_documento') }}</strong>
                          </span>
                      @endif
                    </div>
                 <!--Apellidos-->
                 <div class="form-group">
                   <input id="ape" type="text" name="ape" class="form-control{{ $errors->has('ape') ? ' is-invalid' : '' }}" value="{{ old('ape') }}" required autofocus placeholder="Apellidos">
                   @if ($errors->has('ape'))
                       <span class="invalid-feedback" role="alert">
                      <strong>{{ $errors->first('ape') }}</strong>
                      </span>
                    @endif
                  </div>              
                  <!--Telefono-->
                  <div class="form-group">
                     <input id="tel" type="text" name="tel" class="form-control{{ $errors->has('tel') ? ' is-invalid' : '' }}" value="{{ old('tel') }}" required autofocus placeholder="Telefono">
                     @if ($errors->has('tel'))
                         <span class="invalid-feedback" role="alert">
                         <strong>{{ $errors->first('tel') }}</strong>
                         </span>
                     @endif
                  </div>        
                  <!--Genero-->
                  <div class="form-group">
                    <select id="gen"  name="gen" class="form-control">
                      <option value="">--Seleccione genero--</option>
                      @foreach($genero as $g)
                        <option value="{{ $g->id }}">{{ $g->nombre }}</option>
                      @endforeach()
                    </select>
                  </div>
                  
                <!--Email-->
                  <div class="form-group">
                     <input id="email" type="email" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}" required autofocus placeholder="Correo electronico">
                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                  </div>   
                </div>                             
                <div class="modal-footer">
                   <button type="submit" class="btn btn-primary" id="btncrear">Guardar</button>
                  <button type="button" class="btn btn-warning" data-dismiss="modal">Cerrar</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <!-- fin modal insertar -->