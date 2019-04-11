<form method="POST" action="{{ route('registroVehiculos.store') }}" enctype="multipart/form-data">
                              @csrf
                            <div class="modal-body">
                              <!--Placa-->
                              <div class="form-group">
                                <input id="placa" type="text" name="placa" class="form-control{{ $errors->has('placa') ? ' is-invalid' : '' }}" value="{{ old('placa') }}" required autofocus placeholder="Placa">
                                @if ($errors->has('placa'))
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('placa') }}</strong>
                                    </span>
                                @endif
                              </div> 
                              <!--Marca-->
                              <div class="form-group">
                                <input id="marca" type="text" name="marca" class="form-control{{ $errors->has('marca') ? ' is-invalid' : '' }}" value="{{ old('marca') }}" required autofocus placeholder="Marca">
                                @if ($errors->has('marca'))
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('marca') }}</strong>
                                    </span>
                                @endif
                              </div> 
                              <!--Color-->
                              <div class="form-group">
                                <input id="color" type="text" name="color" class="form-control{{ $errors->has('color') ? ' is-invalid' : '' }}" value="{{ old('color') }}" required autofocus placeholder="Color">
                                @if ($errors->has('color'))
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('color') }}</strong>
                                    </span>
                                @endif
                              </div>
                              <!--Id tipo de vehiculo-->
                              <div class="form-group">
                                <select id="id_tipo_vehiculo" type="number" name="id_tipo_vehiculo" class="form-control">
                                  <option value="">--Seleccione tipo vehiculo--</option>
                                  @foreach($tipo_vehiculo as $tv)
                                    <option value="{{ $tv->id }}">{{ $tv->nombre }}</option>
                                  @endforeach()
                                </select>
                              </div> 
                              <!--Id parqueadero-->
                              <div class="form-group">
                                <select id="parqueadero_id" type="number" name="parqueadero_id" class="form-control">
                                  <option value="">--Seleccione parqueadero--</option>
                                  @foreach($park as $pk)
                                    <option value="{{ $pk->id }}">{{ $pk->nombre }}</option>
                                  @endforeach()
                                </select>
                              </div>
                          </div>
                            <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" id="btncrear">Guardar</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                          </div>
                        </form>