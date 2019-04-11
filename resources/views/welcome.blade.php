<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Reservpark</title>

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/miestilo.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css') }}">
  <script type="text/javascript" src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/bootstrap.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/micodigo.js') }}"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
  </head>
    <body>
        <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel" style="background-color: #267674;">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}" style="color: aqua">
                    <img src="/images/faviconReservParkw2.png" style="height: 60px; width: 100px;"> Reservpark
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                      <a class="nav-link" style="color: white" href="#mis">¿Quienes somos? </a>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" style="color: white" href="{{ route('login') }}">{{ __('Login') }} </a>
                            </li>
                            
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Cerrar sesión') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
              <!-- Navbar content -->
        </nav>
        </div>  
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
              <br>
              <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img src="/images/parqueadero2.jpg" alt="Chicago" width="100%" height="500">
                    <div class="carousel-caption">
                      <h3 >Park Don Edgar</h3>
                      <p>Nosotros cuidamos tu vehiculo!</p>
                    </div>  
                  </div>
                  <div class="carousel-item">
                    <img src="/images/parqueadero3.jpg" alt="Chicago" width="100%" height="500">
                    <div class="carousel-caption">
                      <h3 >Park San Andresito</h3>
                      <p>Tu vehiculo siempre seguro con nosotros!</p>
                    </div>
                  </div>
                  <div class="carousel-item">
                    <img src="/images/fotoinicio.jpg" alt="Chicago" width="100%" height="500">
                    <div class="carousel-caption">
                      <h3 >Parqueadero santiago</h3>
                      <p>Te ofrecemos el mejor servicio de parqueadero!</p>
                    </div> 
                  </div>
                  <div class="carousel-item">
                    <img src="/images/parqueadero4.jpg" alt="Chicago" width="100%" height="500">
                    <div class="carousel-caption">
                      <h3 >Park Las Cuadras</h3>
                      <p>Te cuidamos tu vehiculo con calidad!</p>
                    </div>
                  </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>
              <!--<div id="divMision">
              <h3>Misión</h3>
                  <p>Nuestra Misión dolor aksdfjaksdjfaskdjfaksjdfaksjdfkasjdf aklsjdflkasjd fklasjdfaklsjskdfj asdkfjaskd jfaskdjf aksdjfaksdjfaksdjfaksdjfkasjdf akjsdfaksdjfaksdjfasdkfjaksdjfa klsdjfaksjdfaklsdjfa askdjfaskldjf asdkjfasdkljf..</p>
              </div>
              <div id="divVision">
              <h3>Visión</h3>
                  <p>Nuestra visión fklasjdfaklsjskdfj asdkfjaskd jfaskdjf aksdjfaksdjfaksdjfaksdjfkasjdf akjsdfaksdjfaksdjfasdkfjaksdjfa klsdjfaksjdfaklsdjfa askdjfaskldjf asdkjfasdkljf..</p>
              </div>-->
            </div>
          </div><br>
          <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12" id="mis">
              <div class="card bg-info">
                <div class="card-header"><h1 class="text-center colorBlanco">Misión</h1></div>
                <div class="card-body"><p class="text-center colorBlanco"><i>Reservpark: somos una empresa con soluciones tecnològicas para las plazas de estacionamiento en el departamento de Nariño, con el propósito de inspirar a los administradores a tomar las mejores  decisiones.</i></p></div> 
              </div>
            </div>
          </div><br>
          <div class="row">
            <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6" id="vis">
              <div class="card bg-success">
                <div class="card-header"><h1 class="text-center colorBlanco">Visión</h1></div>
                <div class="card-body"><p class="text-center colorBlanco"><i>Reservpark: organización pionera, sustentable dentro de la industria 4.0, con capacidad innovadora para lograr competitividad en el suroccidente colombiano.</i></p></div> 
              </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6" id="val">
              <div class="card bg-dark">
                <div class="card-header"><h1 class="text-center colorBlanco">Valores</h1></div>
                <div class="card-body">
                  <li class="colorBlanco">Responsabilidad social</li>
                  <li class="colorBlanco">Puntualidad</li>
                  <li class="colorBlanco">Honestabilidad</li>
                </div> 
              </div>
            </div>
          </div><br> 
          <!--Informacion-->
          <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12" id="infoCupos">
              <div class="card bg-basic">
                <div class="card-header"><h1 class="text-center"><i>Estado de los cupos en parqueaderos</i></h1></div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-4 col-md-4 col-lg-4 col-xl-4" id="mis">
                      <div class="card bg-success">
                        <div class="card-header"><h2 class="text-center colorBlanco"><i>Cupos disponibles</i></h2></div>
                        <div class="card-body">
                          <li>
                            <i class="colorBlanco">El color verde, representa los cupos que se encuentra disponibles en los diferentes parqueaderos, a los cuales puedes .</i>
                          </li>
                        </div> 
                        <div class="card-footer">
                          <!--<button type="button" class="btn btn-success"><span class="spinner-border spinner-border-sm"></span>Cupos disponibles</button>-->
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-4 col-md-4 col-lg-4 col-xl-4">
                      <div class="card bg-primary">
                        <div class="card-header"><h2 class="text-center colorBlanco"><i>Cupos reservados</i></h2></div>
                        <div class="card-body">
                          <li>
                            <i class="colorBlanco">El color azul, representa los cupos que se encuentran reservados en los diferentes parqueaderos. </i>
                          </li>
                        </div> 
                        <div class="card-footer">
                          <!--<button type="button" class="btn btn-primary"><span class="spinner-border spinner-border-sm"></span>Cupos reservados</button>-->
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-4 col-md-4 col-lg-4 col-xl-4">
                      <div class="card bg-danger">
                        <div class="card-header"><h2 class="text-center colorBlanco"><i>Cupos ocupados</i></h2></div>
                        <div class="card-body">
                          <li>
                            <i class="colorBlanco">El color rojo, representa los cupos que se encuentran ocupados en los diferentes parqueaderos.</i>
                          </li>
                        </div> 
                        <div class="card-footer">
                          <!--<button type="button" class="btn btn-danger"><span class="spinner-border spinner-border-sm"></span>Cupos ocupados</button>-->
                        </div>
                      </div>
                    </div>
                  </div>
                </div> 
              </div>
            </div>
          </div><br>     
        </div>

        <main class="py-4">
            @yield('content')
            
        </main>
        <div class="jumbotron text-center footer" style="margin-bottom:0; background-color: #267674;">
          <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                    <br>
                    <p class="text-center">¿Que es reservPark?<br>
                    </p><hr>
                    <p class="text-center">Es una plataforma que te facilita la administración de tu parqueadero y la busqueda de cupos disponibles
                        en parqueaderos de la ciudad de Pasto a través de la web<br>
                    </p><hr>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                    <br>
                    <h1 class="text-center colorBlanco">ReservPark</h1><hr>
                    <p class="text-center">Sistema de reservas de cupos para parqueaderos<br>
                        Ubicacion: B/ Santiago <br>
                        Cel: 315 455 87 76<br>
                    </p>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                    <br>
                    <p class="text-center">Desarrollado por:</p><hr>
                    <p class="text-center">Edgar España</p>
                    <p class="text-center">Esteban Potosi</p>
                    <p class="text-center">Wilmer Araújo</p>
                    <hr>
                    <p class="text-center">Copyright © 2018</p>
                </div>
          </div>
        </div>
    </body>
</html>
