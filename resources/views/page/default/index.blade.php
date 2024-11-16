@extends('page.default.layouts.master')


@section('title', 'Título de la página')

@section('content')
   <!-- Planes Section -->
    <section class="container my-5 ">
        <div class="container text-center">
            <h2 class="text-white mb-6">Plataforma Habilitadas</h2>
            <div class="row row-cols-1 row-cols-md-2 g-4">
                <div class="col" style="z-index: 999 !important;">
                    <div class="card-plan">
                        <h2>Flujo Tv</h2>
                        <h4>Comprar Flujo TV Online</h4>
                        <p>Aquí tienes los mejores planes con precios económicos, ofertas, promociones, descuentos y
                            más. Aquí puedes tener canales en vivo, películas, serines y mucho deporte al Comprar
                            FlujoTV Oficial.</p>
                        <a href="{{ route('flujotv')}}" class="btn btn-danger">Ver Planes</a> <a href="#"
                            class="btn btn-danger">Renovar</a>
                    </div>
                </div>
                <div class="col" style="z-index: 999 !important;">
                    <div class="card-plan">
                        <h2>MasTv IPTV</h2>
                        <h4>Comprar MasTv IPTV Online</h4>
                        <p>Tenemos los mejores planes con precios económicos, ofertas, promociones, descuentos y más.
                            Aquí puedes tener canales en vivo, películas, serines y mucho deporte al Comprar MasTv IPTV
                            Oficial.</p>
                        <a href="{{route('mastv')}}" class="btn btn-danger">Ver Planes</a> 
                        <a href="#" class="btn btn-danger">Renovar</a>
                    </div>
                </div>
                <div class="col" style="z-index: 999 !important;">
                    <div class="card-plan">
                        <h3>Netflix</h3>
                        <p>Disfruta de series Netflix Originales exclusivas, además de películas y series populares.
                            adquiere tu perfil ahora por BS. 25.00 al mes. Cancela cuando quieras.</p>
                        <h4>Bs. 25.00 / mes</h4>
                        <a href="{{ route('login')}}" class="btn btn-danger">Comprar</a> <a href="#"
                            class="btn btn-danger">Renovar</a>
                    </div>
                </div>
                <div class="col" style="z-index: 999 !important;">
                    <div class="card-plan">
                        <h3>Prime Video</h3>
                        <p>Disfruta de series Amazon Originales exclusivas, además de películas y series populares.
                            Únete a Prime Video ahora por Bs 20.00 al mes. Cancela cuando quieras.</p>
                        <h4>Bs. 20.00 / mes</h4>
                        <a href="{{ route('login')}}" class="btn btn-danger">Comprar</a> <a href="#"
                            class="btn btn-danger">Renovar</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
         <!-- Filas de contenido con Slider -->
    <section class="container my-5">
        <h2 class="mb-4 text-center">Tendencias</h2>
        <div id="carouselTendencias" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="row">
                        <div class="col">
                            <div class="card">
                                <img src="{{ asset('template/img/1.jpg') }}" class="card-img-top" alt="Película 1">
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <img src="{{ asset('template/img/2.jpg') }}" class="card-img-top" alt="Película 2">
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <img src="{{ asset('template/img/3.jpg') }}" class="card-img-top" alt="Película 3">
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <img src="{{ asset('template/img/4.jpg') }}" class="card-img-top" alt="Película 4">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="row">
                        <div class="col">
                            <div class="card">
                                <img src="{{ asset('template/img/5.jpg') }}" class="card-img-top" alt="Película 5">
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <img src="{{ asset('template/img/6.jpg') }}" class="card-img-top" alt="Película 6">
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <img src="{{ asset('template/img/7.jpg') }}" class="card-img-top" alt="Película 7">
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <img src="{{ asset('template/img/8.jpg') }}" class="card-img-top" alt="Película 8">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="row">
                        <div class="col">
                            <div class="card">
                                <img src="{{ asset('template/img/1.jpg') }}" class="card-img-top" alt="Película 9">
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <img src="{{ asset('template/img/2.jpg') }}" class="card-img-top" alt="Película 10">
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <img src="{{ asset('template/img/3.jpg') }}" class="card-img-top" alt="Película 11">
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <img src="{{ asset('template/img/4.jpg') }}" class="card-img-top" alt="Película 12">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselTendencias"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Anterior</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselTendencias"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Siguiente</span>
            </button>
        </div>

    </section>
@endsection


