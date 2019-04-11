<form method="POST" action="/registroClientes/{{ $users->id}}" id="formEdit" enctype="multipart/form-data">
                              @method('PUT')
                              @csrf
                              <!--tipo de documento-->
                              <div class="form-group">
                              <select  name="edittdoc" id="edittdoc" class="form-control" autofocus>
                                <option value="{{ $users->tdoc }}">{{ $users->tdoc }}</option>
                                <option value="CC">CC</option>
                                <option value="TI">TI</option>
                                <option value="CE">CE</option>
                              </select>
                              </div>
                              <!--descripcion del tipo de documento-->
                              <div class="form-group">
                              <select  name="editdesc_tipo" id="editdesc_tipo" class="form-control">
                                <option value="{{ $users->desc_tipo }}">{{ $users->desc_tipo }}</option>
                                <option value="Cedula">Cedula</option>
                                <option value="Tarjeta de identidad">Tarjeta de identidad</option>
                                <option value="Cedula de extranjeria">Cedula de extranjeria</option>
                              </select>
                              </div>
                              <!--numero de documento-->
                              <div class="form-group">
                                <input id="editno_documento" type="text" name="editno_documento" class="form-control {{ $errors->has('editno_documento') ? ' is-invalid' : '' }}" value="{{$users->no_documento }}" required autofocus placeholder="no documento">
                                @if ($errors->has('editno_documento'))
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('editno_documento') }}</strong>
                                    </span>
                                @endif
                              </div>
                              <!--Nombres-->
                              <div class="form-group">
                                <input id="editname" type="text" name="editname" class="form-control{{ $errors->has('editname') ? ' is-invalid' : '' }}" value="{{ $users->name }}" required autofocus placeholder="Nombres">
                                @if ($errors->has('editname'))
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('editname') }}</strong>
                                    </span>
                                @endif
                              </div> 
                              <!--Apellidos-->
                              <div class="form-group">
                                <input id="editape" type="text" name="editape" class="form-control{{ $errors->has('editape') ? ' is-invalid' : '' }}" value="{{ $users->ape }}" required autofocus placeholder="Apellidos">
                                @if ($errors->has('editape'))
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('editape') }}</strong>
                                    </span>
                                @endif
                              </div> 
                              <!--Genero-->
                              <div class="form-group">
                              <select  name="editgen" id="editgen" class="form-control">
                                <option value="{{ $users->gen }}">{{ $users->gen }}</option>
                                <option value="M">Masculino</option>
                                <option value="F">Femenino</option>
                              </select>
                              </div>
                              <!--Direccion-->
                              <div class="form-group">
                                <input id="editdir" type="text" name="editdir" class="form-control{{ $errors->has('editdir') ? ' is-invalid' : '' }}" value="{{ $users->dir }}" required autofocus placeholder="Dirección">
                                @if ($errors->has('editdir'))
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('editdir') }}</strong>
                                    </span>
                                @endif
                              </div>
                              <!--Telefono-->
                              <div class="form-group">
                                <input id="edittel" type="text" name="edittel" class="form-control{{ $errors->has('edittel') ? ' is-invalid' : '' }}" value="{{ $users->tel }}" required autofocus placeholder="Telefono">
                                @if ($errors->has('edittel'))
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('edittel') }}</strong>
                                    </span>
                                @endif
                              </div>
                              <!--Email-->
                              <div class="form-group">
                                <input id="editemail" type="email" name="editemail" class="form-control{{ $errors->has('editemail') ? ' is-invalid' : '' }}" value="{{ $users->email }}" required autofocus placeholder="Correo electronico">
                                @if ($errors->has('editemail'))
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('editemail') }}</strong>
                                    </span>
                                @endif
                              </div>
                              <!--Password-->
                              <div class="form-group">
                                <input id="editpassword" type="text" name="editpassword" class="form-control{{ $errors->has('editpassword') ? ' is-invalid' : '' }}" required autofocus value="{{ $pass }}" placeholder="Contraseña">
                                @if ($errors->has('editpassword'))
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('editpassword') }}</strong>
                                    </span>
                                @endif
                              </div>
                              <!--Rol-->
                              
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
    <button type="submit" class="btn btn-success" id="btnEdit">Actualizar</button>
    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
</form>
           