@extends('page.default.layouts.master')


@section('title', 'Título de la página')

@section('content')
    <!-- Filas de contenido con Slider -->
    <section class="capsula-section">
        <div class="container">
            <h1 class="text-white mb-5">Descargar Flujo Tv</h1>
            <div class="row row-cols-1 row-cols-md-2 g-4">
                <div class="col">
                    <div class="capsula-container">
                        <div class="capsula">
                            <div class="capsula-item">
                                <a href="#">
                                    <h3><i class="fas fa-tv text-white"></i> SMART TV</h3>
                                </a>
                                <!-- <h3><i class="fas fa-tv text-white"></i> SMART TV</h3> -->
                            </div>
                            <div class="capsula-separator">O</div>
                            <div class="capsula-item">
                                <a href="#">
                                    <h3><i class="fas fa-box text-white"></i> TV BOX</h3>
                                </a>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="capsula-container">
                        <div class="capsula">
                            <div class="capsula-item">
                                <a href="#">
                                    <h3><i class="fa-brands fa-amazon"></i> FIRE STICK </h3>
                                </a>
                            </div>
                            <div class="capsula-separator">O</div>
                            <div class="capsula-item">
                                <a href="#">
                                    <h3><i class="fa-solid fa-laptop"></i> PC/MAC </h3>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <section class="plans-section" id="planes">
        <div class="container text-center">
            <h2 class="text-white mb-5">Elige tu Plan</h2>
            <div class="row row-cols-1 row-cols-md-4 g-4">
                <div class="col">
                    <div class=" mitad-div">
                        <h3>1 Mes</h3>
                        <div class="anual">mensual</div>
                        <div class="precio">
                            <span class="cantidad"><sup>Bs</sup>44<sup>99</sup></span>
                            <div class="anual">1 MES</div>
                        </div>

                        <ul class="text-left">
                            <li><i class="fas fa-futbol"></i> +90 canales de deportes</li>
                            <li><i class="fas fa-tv"></i> Ver en 3 Pantallas</li>
                            <li><i class="fas fa-film"></i> Películas, Series, Animes</li>
                            <li><i class="fas fa-child"></i> Contenido Kids</li>
                            <li><i class="fas fa-user-secret"></i> Contenido +18 Adultos</li>
                            <li><i class="fab fa-android"></i> Compatible con Android</li>
                        </ul>
                        <a href="#" class="btn btn-danger">Seleccionar Plan</a>
                    </div>
                </div>
                <div class="col">
                    <div class="card-plan text-left">
                        <h3>3 Meses</h3>
                        <div class="anual">trimestral</div>
                        <div class="precio">
                            <span class="cantidad"><sup>Bs</sup>129<sup>99</sup></span>
                            <div class="anual">3 MESES</div>
                        </div>
                        <ul class="text-left">
                            <li><i class="fas fa-futbol"></i> +90 canales de deportes</li>
                            <li><i class="fas fa-tv"></i> Ver en 3 Pantallas</li>
                            <li><i class="fas fa-film"></i> Películas, Series, Animes</li>
                            <li><i class="fas fa-child"></i> Contenido Kids</li>
                            <li><i class="fas fa-user-secret"></i> Contenido +18 Adultos</li>
                            <li><i class="fab fa-android"></i> Compatible con Android</li>
                        </ul>
                        <a href="#" class="btn btn-danger">Seleccionar Plan</a>
                    </div>
                </div>
                <div class="col">
                    <div class="card-plan">
                        <h3>6 Meses</h3>
                        <div class="anual">(+1 mes Gratis)</div>
                        <div class="precio">
                            <span class="cantidad"><sup>Bs</sup>239<sup>99</sup></span>
                            <div class="anual">7 MESES</div>
                        </div>

                        <ul class="text-left">
                            <li><i class="fas fa-futbol"></i> +90 canales de deportes</li>
                            <li><i class="fas fa-tv"></i> Ver en 3 Pantallas</li>
                            <li><i class="fas fa-film"></i> Películas, Series, Animes</li>
                            <li><i class="fas fa-child"></i> Contenido Kids</li>
                            <li><i class="fas fa-user-secret"></i> Contenido +18 Adultos</li>
                            <li><i class="fab fa-android"></i> Compatible con Android</li>
                        </ul>
                        <a href="#" class="btn btn-danger">Seleccionar Plan</a>
                    </div>
                </div>
                <div class="col">
                    <div class="card-plan">
                        <h3>Plan Anual</h3>
                        <div class="anual">(+2 Meses Gratis)</div>
                        <div class="precio">
                            <span class="cantidad"><sup>Bs</sup>419<sup>99</sup></span>
                            <div class="anual">ANUAL</div>
                        </div>

                        <ul class="text-left">
                            <li><i class="fas fa-futbol"></i> +90 canales de deportes</li>
                            <li><i class="fas fa-tv"></i> Ver en 3 Pantallas</li>
                            <li><i class="fas fa-film"></i> Películas, Series, Animes</li>
                            <li><i class="fas fa-child"></i> Contenido Kids</li>
                            <li><i class="fas fa-user-secret"></i> Contenido +18 Adultos</li>
                            <li><i class="fab fa-android"></i> Compatible con Android</li>
                        </ul>
                        <a href="#" class="btn btn-danger">Seleccionar Plan</a>
                    </div>
                </div>
            </div>
            <br>
            <span>*Estos precios están disponibles para todos los países.</span>
            <p style="font-size:36pt">¿Donde recibo mis datos de acceso?</p>
            <span>Después de realizar la compra, revise su correo electrónico donde recibirá su cuenta y clave de Flujo
                TV. <b style="color:#f1440f"> No olvide revisar la carpeta de SPAM o CORREO NO DESEADO</b>, ya que a
                veces los mensajes pueden llegar allí.</span>
        </div>

    </section>
@endsection
