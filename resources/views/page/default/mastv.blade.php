@extends('page.default.layouts.master')


@section('title', 'Título de la página')

@section('content')
   <!-- Planes Section -->
   <section class="container my-5">
    <h2 class="mb-4 text-center">Planes Disponibles</h2>
    <div id="carouselTendencias" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="row">
                    <h2 class="mb-4 text-center">Un Dispositivo</h2>
                    <div class="col">
                        
                        <div class="card">                                
                            <div class="card-plan text-left">
                                <h3>1 Mes</h3>
                                <div class="anual">mensual</div>
                                <div class="precio">
                                    <span class="cantidad"><sup>Bs</sup>35<sup>00</sup></span>
                                    <div class="anual">1 MES</div>
                                </div>
                                <ul class="text-left">
                                    <li><i class="fas fa-futbol"></i> +90 canales de deportes</li>
                                    <li><i class="fas fa-tv"></i> Ver en 1 Pantalla</li>
                                    <li><i class="fas fa-film"></i> Películas, Series, Animes</li>
                                    <li><i class="fas fa-child"></i> Contenido Kids</li>
                                    <li><i class="fas fa-user-secret"></i> Contenido +18 Adultos</li>
                                    <li><i class="fab fa-android"></i> Compatible con Android</li>
                                </ul>
                                <a href="#" class="btn btn-danger">Seleccionar Plan</a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card">
                            <div class="card-plan text-left">
                                <h3>3 Meses</h3>
                                <div class="anual">trimestral</div>
                                <div class="precio">
                                    <span class="cantidad"><sup>Bs</sup>89<sup>99</sup></span>
                                    <div class="anual">3 MESES</div>
                                </div>
                                <ul class="text-left">
                                    <li><i class="fas fa-futbol"></i> +90 canales de deportes</li>
                                    <li><i class="fas fa-tv"></i> Ver en 1 Pantalla</li>
                                    <li><i class="fas fa-film"></i> Películas, Series, Animes</li>
                                    <li><i class="fas fa-child"></i> Contenido Kids</li>
                                    <li><i class="fas fa-user-secret"></i> Contenido +18 Adultos</li>
                                    <li><i class="fab fa-android"></i> Compatible con Android</li>
                                </ul>
                                <a href="#" class="btn btn-danger">Seleccionar Plan</a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card">
                            <div class="card-plan text-left">
                                <h3>6 Meses</h3>
                                <div class="anual">(+1 mes Gratis)</div>
                                <div class="precio">
                                    <span class="cantidad"><sup>Bs</sup>159<sup>99</sup></span>
                                    <div class="anual">7 MESES</div>
                                </div>
                                <ul class="text-left">
                                    <li><i class="fas fa-futbol"></i> +90 canales de deportes</li>
                                    <li><i class="fas fa-tv"></i> Ver en 1 Pantalla</li>
                                    <li><i class="fas fa-film"></i> Películas, Series, Animes</li>
                                    <li><i class="fas fa-child"></i> Contenido Kids</li>
                                    <li><i class="fas fa-user-secret"></i> Contenido +18 Adultos</li>
                                    <li><i class="fab fa-android"></i> Compatible con Android</li>
                                </ul>
                                <a href="#" class="btn btn-danger">Seleccionar Plan</a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card">
                            <div class="card-plan text-left">
                                <h3>Plan Anual</h3>
                                <div class="anual">(+2 meses Gratis)</div>
                                <div class="precio">
                                    <span class="cantidad"><sup>Bs</sup>319<sup>99</sup></span>
                                    <div class="anual">ANUAL</div>
                                </div>
                                <ul class="text-left">
                                    <li><i class="fas fa-futbol"></i> +90 canales de deportes</li>
                                    <li><i class="fas fa-tv"></i> Ver en 1 Pantalla</li>
                                    <li><i class="fas fa-film"></i> Películas, Series, Animes</li>
                                    <li><i class="fas fa-child"></i> Contenido Kids</li>
                                    <li><i class="fas fa-user-secret"></i> Contenido +18 Adultos</li>
                                    <li><i class="fab fa-android"></i> Compatible con Android</li>
                                </ul>
                                <a href="#" class="btn btn-danger">Seleccionar Plan</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="row">
                    <h2 class="mb-4 text-center">Dos Dispositivo</h2>
                    <div class="col">
                        
                        <div class="card">                                
                            <div class="card-plan text-left">
                                <h3>1 Mes</h3>
                                <div class="anual">mensual</div>
                                <div class="precio">
                                    <span class="cantidad"><sup>Bs</sup>39<sup>99</sup></span>
                                    <div class="anual">1 MES</div>
                                </div>
                                <ul class="text-left">
                                    <li><i class="fas fa-futbol"></i> +90 canales de deportes</li>
                                    <li><i class="fas fa-tv"></i> Ver en 2 Pantallas</li>
                                    <li><i class="fas fa-film"></i> Películas, Series, Animes</li>
                                    <li><i class="fas fa-child"></i> Contenido Kids</li>
                                    <li><i class="fas fa-user-secret"></i> Contenido +18 Adultos</li>
                                    <li><i class="fab fa-android"></i> Compatible con Android</li>
                                </ul>
                                <a href="#" class="btn btn-danger">Seleccionar Plan</a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card">
                            <div class="card-plan text-left">
                                <h3>3 Meses</h3>
                                <div class="anual">trimestral</div>
                                <div class="precio">
                                    <span class="cantidad"><sup>Bs</sup>114<sup>00</sup></span>
                                    <div class="anual">3 MESES</div>
                                </div>
                                <ul class="text-left">
                                    <li><i class="fas fa-futbol"></i> +90 canales de deportes</li>
                                    <li><i class="fas fa-tv"></i> Ver en 2 Pantallas</li>
                                    <li><i class="fas fa-film"></i> Películas, Series, Animes</li>
                                    <li><i class="fas fa-child"></i> Contenido Kids</li>
                                    <li><i class="fas fa-user-secret"></i> Contenido +18 Adultos</li>
                                    <li><i class="fab fa-android"></i> Compatible con Android</li>
                                </ul>
                                <a href="#" class="btn btn-danger">Seleccionar Plan</a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card">
                            <div class="card-plan text-left">
                                <h3>6 Meses</h3>
                                <div class="anual">(+1 mes Gratis)</div>
                                <div class="precio">
                                    <span class="cantidad"><sup>Bs</sup>204<sup>99</sup></span>
                                    <div class="anual">7 MESES</div>
                                </div>
                                <ul class="text-left">
                                    <li><i class="fas fa-futbol"></i> +90 canales de deportes</li>
                                    <li><i class="fas fa-tv"></i> Ver en 2 Pantallas</li>
                                    <li><i class="fas fa-film"></i> Películas, Series, Animes</li>
                                    <li><i class="fas fa-child"></i> Contenido Kids</li>
                                    <li><i class="fas fa-user-secret"></i> Contenido +18 Adultos</li>
                                    <li><i class="fab fa-android"></i> Compatible con Android</li>
                                </ul>
                                <a href="#" class="btn btn-danger">Seleccionar Plan</a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card">
                            <div class="card-plan text-left">
                                <h3>Plan Anual</h3>
                                <div class="anual">(+2 meses Gratis)</div>
                                <div class="precio">
                                    <span class="cantidad"><sup>Bs</sup>394<sup>99</sup></span>
                                    <div class="anual">ANUAL</div>
                                </div>
                                <ul class="text-left">
                                    <li><i class="fas fa-futbol"></i> +90 canales de deportes</li>
                                    <li><i class="fas fa-tv"></i> Ver en 2 Pantallas</li>
                                    <li><i class="fas fa-film"></i> Películas, Series, Animes</li>
                                    <li><i class="fas fa-child"></i> Contenido Kids</li>
                                    <li><i class="fas fa-user-secret"></i> Contenido +18 Adultos</li>
                                    <li><i class="fab fa-android"></i> Compatible con Android</li>
                                </ul>
                                <a href="#" class="btn btn-danger">Seleccionar Plan</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="row">
                    <h2 class="mb-4 text-center">Tres Dispositivo</h2>
                    <div class="col">                            
                        <div class="card">                                
                            <div class="card-plan text-left">
                                <h3>1 Mes</h3>
                                <div class="anual">mensual</div>
                                <div class="precio">
                                    <span class="cantidad"><sup>Bs</sup>54<sup>99</sup></span>
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
                    </div>
                    <div class="col">
                        <div class="card">
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
                    </div>
                    <div class="col">
                        <div class="card">
                            <div class="card-plan text-left">
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
                    </div>
                    <div class="col">
                        <div class="card">
                            <div class="card-plan text-left">
                                <h3>Plan Anual</h3>
                                <div class="anual">(+2 meses Gratis)</div>
                                <div class="precio">
                                    <span class="cantidad"><sup>Bs</sup>454<sup>99</sup></span>
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
         <!-- Filas de contenido con Slider -->
         <section class="capsula-section">
            <div class="container">
                <h1 class="text-white mb-5">Descargar Mas Tv IPTV</h1>
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
                                    <a href="#"><h3><i class="fas fa-box text-white"></i> TV BOX</h3></a>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
        
                    <div class="col">
                        <div class="capsula-container">
                            <div class="capsula">
                                <div class="capsula-item">
                                    <a href="#"><h3><i class="fa-brands fa-amazon"></i> FIRE STICK </h3></a>                                
                                </div>
                                <div class="capsula-separator">O</div>
                                <div class="capsula-item">
                                    <a href="#"><h3><i class="fa-solid fa-laptop"></i> PC </h3></a>                                
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
        
        </section>
@endsection


