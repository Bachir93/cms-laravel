@extends('layouts.admin')

@section('content')

    <h3>Registro</h3>
    <div class="row">
        <form class="col m12 l6" method="POST" action="{{ route('registrarse') }}">
            @csrf
            <div class="row">
                <div class="input-field col s12">
                    <input id="nombre" type="text" name="nombre" value="{{ old('nombre') }}" required autofocus>
                    <label for="nombre">
                        Nombre
                        @error("nombre")
                        <span class="red-text text-darken-1">** {{ $message }} **</span>
                        @enderror
                    </label>
                </div>
                <div class="input-field col s12">
                    <input id="email" type="text" name="email" value="{{ old('email') }}" required>
                    <label for="email">E-mail
                        @error("email")
                        <span class="red-text text-darken-1">** {{ $message }} **</span>
                        @enderror
                    </label>
                </div>
                <div class="input-field col s12">
                    <input id="password" type="password" name="password" value="{{ old('password') }}" required>
                    <label for="password">
                        Contraseña
                        @error("password")
                        <span class="red-text text-darken-1">** {{ $message }} **</span>
                        @enderror
                    </label>
                </div>
                <div class="input-field col s12">
                    <input id="password-confirm" type="password" name="password_confirmation" value="{{ old('password_confirmation') }}" required>
                    <label for="password-confirm">Repetir contraseña</label>
                </div>
                <div class="input-field col s12">
                    <a href="{{ route('admin') }}" title="Volver">
                        <button class="btn waves-effect waves-light" type="button">Volver
                            <i class="material-icons right">refresh</i>
                        </button>
                    </a>
                    <button class="btn waves-effect waves-light" type="submit">Registrarse
                        <i class="material-icons right">person</i>
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
