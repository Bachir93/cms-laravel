<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!--Metas-->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="title" content="Casas en venta y alquiler">

    <!-- CSRF Token -->
    <!-- Le daremos seguridad a los formularios -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Le asignamos el nombre para la aplicacion, cogerá el nombre que tenemos establecido -->
    <title>{{ config('app.name', 'Casas para venta y alquiler') }}</title>

    <!-- Styles -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <!-- Con asset le indicamos que se dirija a la carpeta public/ -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>

<nav>
    <div class="nav-wrapper">
        <!--Logo-->
        <a href="{{ route('home') }}" class="brand-logo" title="Inicio">
            {{ Html::image('img/Logo-web.png', 'Logo inmobiliaria') }}
        </a>

        <!--Botón menú móviles-->
        <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>

        <!--Menú de navegación-->
        <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li>
                <a href="{{ route('home') }}" title="Inicio">Inicio</a>
            </li>
            <li>
                <a href="{{ route('casas') }}" title="Casas">Casas</a>
            </li>
            <li>
                <a href="{{ route('acerca-de') }}" title="Acerca de">Acerca de</a>
            </li>
            <li>
                <a href="{{ route('admin') }}" title="Panel de administración" target="_blank" class="grey-text">
                    Admin
                </a>
            </li>
        </ul>

    </div>
</nav>

<!--Menú de navegación móvil-->
<ul class="sidenav" id="mobile-demo">
    <li>
        <a href="{{ route('home') }}" title="Inicio">Inicio</a>
    </li>
    <li>
        <a href="{{ route('casas') }}" title="Casas">Casas</a>
    </li>
    <li>
        <a href="{{ route('acerca-de') }}" title="Acerca de">Acerca de</a>
    </li>
    <li>
        <a href="{{ route('admin') }}" title="Panel de administración" target="_blank" class="grey-text">
            Admin
        </a>
    </li>
</ul>

<main>

    <header>
        <h1>CMS Inmobiliaria Madrid Norte</h1>
        <h2>13 casas y pisos en venta</h2>
    </header>

    <section class="container-fluid">

        <!--Content-->
        @yield('content')

        <!--Footer-->
    </section>
</main>

<footer class="center-align">
    © <?php echo date("Y") ?>
    <a href="http://bachirhassani.infinityfreeapp.com/HTML/" target="_blank" title="Bachir Hassani Tanech">
        Bachir hassani tanech
    </a>
</footer>

</body>

<!--Scripts-->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<!-- Llamo a la funcion de Javascript -->
<script src="{{ asset('js/app.js') }}" defer></script>

</html>
