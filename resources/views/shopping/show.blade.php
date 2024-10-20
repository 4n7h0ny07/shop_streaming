@extends('voyager::master')

@section('content')
@section('page_header')
    <div class="container-fluid">
        <h1 class="page-title">
            <i class="voyager-wallet"></i> Comprar {{ $productos->nombre }}:
        </h1>
        <span style="color:rgb(0, 0, 0); font-size: 14pt">Saldo:</span> <b
            style="color:rgb(3, 17, 139); font-size: 24pt; text-align:right !important">{{ number_format($balance, 2) }}</b>
        Bs.
    </div>
@stop

<div class="page-content browse container-fluid">
    @include('voyager::alerts')

    <div class="row">
        <div class="col-md-9">
            <div class="panel panel-bordered">

                <div class="card" style="width: 100%; display: flex; align-items: center;">
                    @if ($productos->images)
                        <img src="{{ asset('storage/' . $productos->images), asset("images/default.png")  }}" class="card-img-left"
                            alt="{{ $productos->nombre }}" style="width: 500px; height: auto; margin-right: 10px;">
                    @else
                        <img src="{{asset("images/default.png")}} " class="card-img-left" alt="Imagen de perfil"
                            style="width: 400px; height: auto; margin-right: 10px;" alt="Imagen no disponible">
                    @endif

                    <!-- Contenido de texto a la derecha -->
                    <div class="card-body text-center">
                        <h2  > {{ number_format($productos->precio_suscripcion) }} <small>Bs.</small></h2>
                        <h3 class="card-subtitle mb-2 text-muted">Producto: {{ $productos->nombre }}</h3>
                        @if ($perfiles)
                            <p class="card-text">Estado: <b
                                    style="color: rgb(0, 104, 0)">{{ ucfirst($perfiles->estado) }}</b></p>


                            <form action="{{ route('perfiles.pay', $perfiles->id) }}" method="POST">
                                @csrf
                                <input type="hidden" class="form-control" name="product" value="{{$productos->nombre}}" readonly="readonly">
                                <input type="hidden" class="form-control" name="id" value="{{$perfiles->id}}" readonly="readonly">
                                <input type="hidden" class="form-control" name="amount" value="{{$productos->precio_suscripcion}}" readonly="readonly">
                                <button type="submit" class="btn btn-success">Comprar Perfil</button>
                            </form>
                        @else
                            <b>
                                <p style="color:rgb(161, 0, 0); font-size:14pt"> AGOTADO</p>
                            </b>
                        @endif
                    </div>
                </div>
                <div class="card-footer text-center">
                    <br>
                    @if ($productos->descripcion)
                        <p>{{ ucfirst($productos->descripcion) }}</p>
                    @else
                        <b>
                            <p style="color:rgb(161, 91, 0); font-size:14pt"> No Existen detalles</p>
                        </b>
                    @endif
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
