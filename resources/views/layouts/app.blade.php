<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>Atletas - Eventos</title>

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

  <!-- Styles -->
  {{ Html::style('css/bootstrap.min.css') }}
  {{ Html::style('css/app.css') }}
  {{ Html::style('css/tether.min.css') }}

  <!-- JavaScript -->
  {{ Html::script('js/jquery.min.js') }}
  {{ Html::script('js/tether.min.js') }}
  {{ Html::script('js/bootstrap.min.js') }}
  {{ Html::script('js/jquery.validate.min.js') }}
  {{ Html::script('js/additional-methods.min.js') }}
  {{ Html::script('js/localization/messages_pt_BR.min.js') }}
</head>

<body>
  <nav class="navbar navbar-toggleable-md navbar-inverse bg-inverse fixed-top">
    <a class="navbar-brand" href="#">Eventos</a>
    <ul class="navbar-nav mr-auto">
      <li class="nav-item <?php echo (Route::currentRouteName() == "home" ? "active" : ""); ?> ">
        <a class="nav-link" href="{{ url('/') }}">Página Inicial</a>
      </li>
      @if(Auth::check())
       <li class="nav-item <?php echo (Route::currentRouteName() == "registrar" ? "active" : ""); ?> ">
         <a class="nav-link" href="{{ url('/registrar') }}">Me Registrar</a>
       </li>
       <li class="nav-item <?php echo (Route::currentRouteName() == "meusEventos" ? "active" : ""); ?> ">
         <a class="nav-link" href="{{ url('/meusEventos') }}">Meus Eventos</a>
       </li>
       @endif
       <li class="nav-item <?php echo (Route::currentRouteName() == "registros" ? "active" : ""); ?> ">
        <a class="nav-link" href="{{ url('/registros') }}">Listar Registros</a>
      </li>
      <li class="nav-item <?php echo (Route::currentRouteName() == "atletas" ? "active" : ""); ?> ">
        <a class="nav-link" href="{{ url('/atletas') }}">Listar Atletas</a>
      </li>
      <li class="nav-item <?php echo (Route::currentRouteName() == "totalregistros" ? "active" : ""); ?> ">
        <a class="nav-link" href="{{ url('/totalregistros') }}">Listar Total Registros</a>
      </li>
    </ul>
    @if(!Auth::check())
    <div class="nav-item active my-2 my-lg-0">
      <a class="btn btn-def btn-lg btn-primary" href="{{ route('login') }}">Entrar</a>
    </div>
    @else
    <div class="nav-item active my-2 my-lg-0">
      <span class="nav-link" style="color:#EEE">{{Auth::user()->nome}}</span>
    </div>
      <div class="nav-item active my-2 my-lg-0">
        <a class="btn btn-def btn-lg btn-primary" href="{{ route('logout') }}">Sair</a>
      </div>
    @endif
  </nav>

  <div class="container">
    @include('common.alerts')
    @yield('content')
  </div>
  <!-- /.container -->
</body>

</html>
