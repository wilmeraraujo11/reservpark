<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Reservpark</title>

        <!-- Fonts -->
       
        <!-- Styles -->

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <style>
  /* Make the image fully responsive */
  .carousel-inner img {
    width: 100%;
    height: 100%;
  }
  </style>
        
    </head>
    <body>
        <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel bg-primary">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}" style="color: white">
                    <img src="/images/faviconReservParkw2.png" style="height: 60px; width: 100px;"> Reservpark
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

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
        <div class="container">
        <div class="col-lg-12">
        <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2">
          hola
        </div>
        <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10">
          <div id="demo" class="carousel slide" data-ride="carousel">
            <ul class="carousel-indicators">
              <li data-target="#demo" data-slide-to="0" class="active"></li>
              <li data-target="#demo" data-slide-to="1"></li>
              <li data-target="#demo" data-slide-to="2"></li>
            </ul>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="/images/fotoinicio.jpg" alt="Los Angeles" width="1100" height="500">
                <div class="carousel-caption">
                  <h3>Los Angeles</h3>
                  <p>We had such a great time in LA!</p>
                </div>   
              </div>
              <div class="carousel-item">
                <img src="/images/fotoinicio.jpg" alt="Chicago" width="1100" height="500">
                <div class="carousel-caption">
                  <h3>Chicago</h3>
                  <p>Thank you, Chicago!</p>
                </div>   
              </div>
              <div class="carousel-item">
                <img src="/images/fotoinicio.jpg" alt="New York" width="1100" height="500">
                <div class="carousel-caption">
                  <h3>New York</h3>
                  <p>We love the Big Apple!</p>
                </div>   
              </div>
            </div>
            <a class="carousel-control-prev" href="#demo" data-slide="prev">
              <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#demo" data-slide="next">
              <span class="carousel-control-next-icon"></span>
            </a>
          </div>
          </div>
          </div>
      </div>  
    </body>
</html>
