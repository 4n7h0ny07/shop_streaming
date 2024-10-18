@extends('voyager::master')

@section('content')
    <style>
        .card-footer {
            text-align: center;
        }

        .card-img-top {
            display: block;
            margin-left: auto;
            margin-right: auto;
            max-height: 200px;
            max-width: 100%;
            object-fit: contain;
        }
    </style>
    <div class="container">
        <h1 class="text-center mb-4">Lista de Productos</h1>

        <div class="row">
            @foreach ($productos as $producto)
                <div class="col-md-3 mb-2">
                    <div class="card h-25">

                        <!-- Envolver la imagen en un div con clases de Bootstrap -->
                        <div class="d-flex justify-content-center align-items-center " style="text-align:center !important;">
                            @if ($producto->images)
                                <a href="{{ route('shopping.show', $producto->id) }}">
                                    <img src="{{ asset('storage/' . $producto->images) }}" class="card-img-top"
                                        alt="{{ $producto->nombre }}"></a>
                            @else
                                <img src="https://via.placeholder.com/400x200" class="card-img-top"
                                    alt="Imagen no disponible">
                            @endif
                            <a style="text-align:center; font-size:14pt" href="{{ route('shopping.show', $producto->id) }}"> <b
                                >{{ $producto->nombre }}</b>

                        </a>
                        </div>
                        {{-- <div class="card-body">
                            <a href="{{ route('shopping.show', $producto->id) }}"> <span
                                    style="text-align:center; font-size:14pt">{{ $producto->nombre }}</span>

                            </a>
                        </div> --}}

                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
