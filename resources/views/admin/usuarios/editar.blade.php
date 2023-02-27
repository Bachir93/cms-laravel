@extends('layouts.admin')

@section('content')

    <h3>
        <a href="{{ route("admin") }}" title="Inicio">Inicio</a> <span>| </span>
        <a href="{{ url("admin/usuarios") }}" title="Usuarios">Usuarios</a> <span>| </span>
        @if ($row->id)
            <span>Editar {{ $row->nombre }}</span>
        @else
            <span>Nuevo usuario</span>
        @endif
    </h3>
    <div class="row">
        @php $accion = ($row->id) ? "actualizar/".$row->id : "guardar" @endphp
        <form class="col m12 l6" method="POST" action="{{ url("admin/usuarios/".$accion) }}">
            @csrf
            <div class="row">
                <div class="input-field col s12">
                    <input id="nombre" type="text" name="nombre" value="{{ $row->nombre }}">
                    <label for="nombre">Nombre</label>
                </div>
                <div class="input-field col s12">
                    <input id="email" type="text" name="email" value="{{ $row->email }}">
                    <label for="email">E-mail</label>
                </div>
                @php $clase = ($row->id) ? "hide" : "" @endphp
                <div class="input-field col s12 {{ $clase }}" id="password">
                    <input id="password" type="password" name="password" value="">
                    <label for="password">Contraseña</label>
                </div>
                @if ($row->id)
                    <p>
                        <label for="cambiar_clave">
                            <input id="cambiar_clave" name="cambiar_clave" type="checkbox">
                            <span>Pulsa para cambiar la clave</span>
                        </label>
                    </p>
                @else
                    <input type="hidden" name="cambiar_clave" value="1">
                @endif
            </div>
            <div class="row">
                <p>Permisos</p>
                <p>
                    <label for="casas">
                        <input id="casas" name="casas" type="checkbox" {{ ($row->casas == 1) ? "checked" : "" }}>
                        <span>Casas</span>
                    </label>
                </p>
                <p>
                    <label for="usuarios">
                        <input id="usuarios" name="usuarios" type="checkbox" {{ ($row->usuarios == 1) ? "checked" : "" }}>
                        <span>Usuarios</span>
                    </label>
                </p>
                <div class="input-field col s12">
                    <a href="{{ url("admin/usuarios") }}" title="Volver">
                        <button class="btn waves-effect waves-light" type="button">Volver
                            <i class="material-icons right">replay</i>
                        </button>
                    </a>
                    <button class="btn waves-effect waves-light" type="submit" name="guardar">Guardar
                        <i class="material-icons right">save</i>
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
