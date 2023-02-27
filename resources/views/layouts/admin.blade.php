<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!--Metas-->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="title" content="Panel de administración">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Panel de administración') }}</title>

    <!-- Styles -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
</head>

<body>

<nav>
    <div class="nav-wrapper">
        <!--Logo-->
        <a href="{{ route('acceder') }}" class="brand-logo" title="Inicio">
            {{ Html::image('img/Logo-web.png', 'Logo de inmobiliaria') }}
        </a>

        <!--Botón menú móviles-->
        <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        <!-- Si el usuario esta logueado, muestro el menu de navegacion-->
        @if( Auth::check() )
            <!--Menú de navegación-->
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li>
                    <a href="{{ route('admin') }}" title="Inicio">Inicio</a>
                </li>
                <!-- El objeto user tendrá todos los datos de un usuario -->
                @if( Auth::user()->casas )
                    <li>
                        <a href="{{ url('admin/casas') }}" title="Casas">Casas</a>
                    </li>
                @endif
                @if( Auth::user()->usuarios )
                    <li>
                        <a href="{{ url('admin/usuarios') }}" title="Usuarios">Usuarios</a>
                    </li>
                @endif
                <li>
                    <form method="POST" action="{{ route('salir') }}">
                        @csrf
                        <a onclick="$(this).closest('form').submit()" title="Salir"  class="grey-text">
                            Salir
                        </a>
                    </form>
                </li>
            </ul>
        @endif

    </div>
</nav>

@if( Auth::check() )
    <!--Menú de navegación móvil-->
    <ul class="sidenav" id="mobile-demo">
        <li>
            <a href="{{ route('admin') }}" title="Inicio">Inicio</a>
        </li>
        @if( Auth::user()->casas )
            <li>
                <a href="{{ url('admin/casas') }}" title="Casas">Casas</a>
            </li>
        @endif
        @if( Auth::user()->usuarios )
            <li>
                <a href="{{ url('admin/usuarios') }}" title="Usuarios">Usuarios</a>
            </li>
        @endif
        <li>
            <form method="POST" action="{{ route('salir') }}">
                <!-- Se hace la comprobacion con el token para el envio de formularios-->
                @csrf
                <a onclick="$(this).closest('form').submit()" title="Salir"  class="grey-text">
                    Salir
                </a>
            </form>
        </li>
    </ul>
@endif

<!-- Mensajes  -->
@include('admin.partials.mensajes')

<main>

    <header>
        <h1>Panel de administración</h1>

        @if( Auth::check() )
            <!-- Devuelvo el nombre del usuario que entro-->
            <h2>
                Usuario: <strong>{{Auth::user()->nombre}}</strong>
            </h2>

        @else

            <h2>Bienvenido, introduce tus datos.</h2>

        @endif
    </header>

    <section class="container-fluid">

        <!--Content-->
        @yield('content')


    </section>
</main>

<!--Footer-->
<footer class="center-align">
    © <?php echo date("Y") ?> Panel de Administración.
    <a href="http://bachirhassani.infinityfreeapp.com/HTML/" target="_blank" title="Bachir Hassani Tanech">
        Bachir Hassani Tanech
    </a>
</footer>

</body>

<!--Scripts-->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script src="{{ asset('js/admin.js') }}" defer></script>

</html>
