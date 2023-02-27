@extends('layouts.app')

@section('content')

    <h3>
        <a href="{{ route('home') }}" title="Inicio">Inicio</a> <span>| </span>
        <a href="{{ route('casas') }}" title="Casas">Casas</a> <span>| </span>
        <span>{{ $row->titulo }}</span>
    </h3>
    <div class="row">

        <article class="col s12">
            <div class="card horizontal large casa">
                <div class="card-image">
                    {{ Html::image('img/'.$row->imagen, $row->titulo) }}
                </div>
                <div class="card-stacked">
                    <div class="card-content">
                        <h4>{{ $row->titulo  }}</h4>
                        <p>{{ $row->entradilla  }}</p>
                        <!-- El doble signo de exclamación es una sintaxis de Laravel (un framework de PHP) que se utiliza para imprimir texto sin escapar los caracteres HTML especiales. -->
                        <p>{!! $row->texto !!}</p>
                        <h6>{{ $row->precio  }} €</h6>
                        <p>{{ $row->dimension  }}</p>
                        <br>
                        <p>
                            <strong>Fecha</strong>: {{ date("d/m/Y", strtotime($row->fecha)) }}<br>
                            <strong>Autor</strong>: {{ $row->autor  }}
                        </p>
                    </div>
                </div>
            </div>
        </article>
    </div>
@endsection
