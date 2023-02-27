@extends('layouts.app')

@section('content')

    <h3>Inicio</h3>
    <div class="row">

        @foreach ($rowset as $row)

            <article class="col m12 l6">
                <div class="card horizontal small">
                    <div class="card-image">
                        {{ Html::image('img/'.$row->imagen, $row->titulo) }}
                    </div>
                    <div class="card-stacked">
                        <div class="card-content">
                            <h4>{{ $row->titulo  }}</h4>
                            <p>{{ $row->entradilla  }}</p>
                            <h6>{{ $row->precio  }} €</h6>
                        </div>
                        <div class="card-info">
                            <p>{{ date("d/m/Y", strtotime($row->fecha)) }}</p>
                        </div>
                        <div class="card-action">
                            <a href="{{ url('casa/'.$row->slug) }}">Más información</a>
                        </div>
                    </div>
                </div>
            </article>
        @endforeach

    </div>

@endsection


