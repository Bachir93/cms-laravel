@extends('layouts.admin')

@section('content')

    <h3>Acceso</h3>
    <div class="row">
        <form class="col m12 l6" method="POST" action="{{ route('autenticar') }}">
            @csrf
            <div class="row">
                <div class="input-field col s12">
                    <input id="email" type="text" name="email" value="">
                    <label for="email">E-mail
                        @error("email")
                        <span class="red-text text-darken-1">** {{ $message }} **</span>
                        @enderror
                    </label>
                </div>
                <div class="input-field col s12">
                    <input id="password" type="password" name="password" value="">
                    <label for="password">
                        Contraseña
                        @error("password")
                        <span class="red-text text-darken-1">** {{ $message }} **</span>
                        @enderror
                    </label>
                </div>
                <div class="input-field col s12">
                    <a href="{{ route('email') }}" title="Cambiar contraseña">
                        <button class="btn waves-effect waves-light" type="button">Cambiar contraseña
                            <i class="material-icons right">help</i>
                        </button>
                    </a>
                    <a href="{{ route('registro') }}" title="Registrarse">
                        <button class="btn waves-effect waves-light" type="button">Registrarse
                            <i class="material-icons right">person_add</i>
                        </button>
                    </a>
                    <button class="btn waves-effect waves-light" type="submit">Acceder
                        <i class="material-icons right">person</i>
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
