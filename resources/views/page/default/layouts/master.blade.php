<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('page_title', setting('site.title') . ' | ' . setting('site.description'))</title>
    <!-- Incluir el archivo head -->
    {{-- <?php include 'head.html'; ?> --}}
    <link rel="stylesheet" href="{{ asset('template/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('template/css/all.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('template/css/estilos.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('template/css/all.min.css') }}" rel="stylesheet">

</head>

<body>
    <!-- Fondo de partículas -->
    <div id="particles-js"></div>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('index') }}">{{ setting('admin.title') }}</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link  text-danger" href="{{ route('index') }}">Inicio</a></li>
                    <li class="nav-item"><a class="nav-link  text-danger" href="{{ route('flujotv') }}">Flujo Tv
                            IPTV</a></li>
                    <li class="nav-item"><a class="nav-link  text-danger" href="{{ route('mastv') }}">MasTv IPTV</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">
                            <i class="fa-solid fa-power-off text-danger"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="hero-content">
            @if ($page == 'index')
                <h1>Bienvenidos</h1>
                <h3>TV Streaming Fassid</h3>
                <p>Simplifica tu compra y paga de forma moderna con nuestro método de pago QR, seguro y sin
                    complicaciones.</p>
            @elseif ($page == 'flujotv')
                <h1>Flujotv</h1>
                <h3>Comprar Flujo TV Online</h3>
                <p>Aquí tienes los mejores planes con precios económicos, ofertas, promociones, descuentos y más. Aquí
                    puedes tener canales en vivo, películas, serines y mucho deporte al Comprar FlujoTV Oficial.</p>
            @elseif ($page == 'mastv')
                <h1>MasTV IPTV</h1>
                <h3>Comprar Mas TV IPTV Online</h3>
                <p>Aquí tienes los mejores planes con precios económicos, ofertas, promociones, descuentos y más. Aquí
                    puedes tener canales en vivo, películas, serines y mucho deporte al Comprar MasTv IPTV Oficial.</p>
            @elseif ($page == 'terminos-uso')
                <h1>TERMINOS Y CONDICIONES DE USO</h1>
                <h3>Leer detallamente</h3>
                <p>Aquí explicamos detalladamente los terminos y condiciones de uso, de los servicios que ofrecemos, por favor le rogamos tomar en cuanta y leerlos detalladamente, gacias.</p>
            @else
                <h1>Título por defecto</h1>
                <h3>Comprar Flujo TV Online</h3>
                <p>Aquí tienes los mejores planes con precios económicos, ofertas, promociones, descuentos y más. Aquí
                    puedes tener canales en vivo, películas, serines y mucho deporte al Comprar FlujoTV Oficial.</p>
            @endif
            <button class="btn btn-danger"><i class="fas fa-play text-white"></i> Ver ahora</button>
            <button class="btn btn-secondary"><i class="fas fa-info-circle text-white"></i> Más información</button>
        </div>
    </section>

    @yield('content')

    {{-- <section class="container my-5" style="z-index:999;">
        <h2 class="mb-4 text-center">Preguntas Frecuentes (FAQ)</h2>
        <div class="accordion" id="accordionFAQ">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        ¿Cómo puedo ver las películas o series?
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                    data-bs-parent="#accordionFAQ">
                    <div class="accordion-body">
                        Para ver nuestras películas o series, solo necesitas suscribirte a uno de nuestros planes y
                        podrás acceder a todo nuestro catálogo desde cualquier dispositivo compatible.
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        ¿Puedo cancelar mi suscripción en cualquier momento?
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                    data-bs-parent="#accordionFAQ">
                    <div class="accordion-body">
                        Sí, puedes cancelar tu suscripción en cualquier momento. No tendrás que pagar nuevamente después
                        de cancelar, pero podrás seguir disfrutando del contenido hasta el final de tu período de
                        suscripción.
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        ¿Hay alguna prueba gratuita?
                    </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                    data-bs-parent="#accordionFAQ">
                    <div class="accordion-body">
                        Sí, ofrecemos una prueba gratuita de 7 días para que puedas explorar nuestro catálogo y decidir
                        si te gusta. Durante este período, tendrás acceso completo a todas las películas y series.
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingFour">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                        ¿En qué dispositivos puedo ver el contenido?
                    </button>
                </h2>
                <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                    data-bs-parent="#accordionFAQ">
                    <div class="accordion-body">
                        Puedes ver nuestras películas y series en una variedad de dispositivos, incluyendo smartphones,
                        tabletas, computadoras y televisores inteligentes. Solo necesitas tener acceso a internet y una
                        cuenta activa.
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- Incluir el archivo head -->


    <!-- Footer -->
    <footer class="footer text-center" style="z-index: 900 !important;">
        <p>&copy; 2024 Tv Streaming Fassid. Todos los derechos reservados.</p>
        <a href="terminos-uso.html">Términos y condiciones de uso</a> | <a href="politicas-privacidad.html">Política
            de
            privacidad</a> | <a href="quienes-somos.html">Quienes Somos</a> | <a href="contacto.html">Contactanos</a>
        |
        <a href="terminos-reembolso.html">Política de garantias y reembolso</a> | <a href="faq.html">Preguntas
            frecuentes</a>
    </footer>


    <!-- Scripts -->

    <!-- Incluir el archivo JS de bootstrap -->
    <script src="{{ asset('template/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('template/js/particles.js') }}"></script>
    <script src="{{ asset('template/js/particulas.js') }}"></script>
    <!-- <script>
        particlesJS('particles-js', {
            "particles": {
                "number": {
                    "value": 100,
                    "density": {
                        "enable": true,
                        "value_area": 800
                    }
                },
                "color": {
                    "value": "#ff5733"
                },
                "shape": {
                    "type": "circle",
                    "stroke": {
                        "width": 0,
                        "color": "#ff5733"
                    }
                },
                "opacity": {
                    "value": 0.5,
                    "random": false,
                    "anim": {
                        "enable": true,
                        "speed": 1,
                        "opacity_min": 0.1
                    }
                },
                "size": {
                    "value": 5,
                    "random": true,
                    "anim": {
                        "enable": true,
                        "speed": 40,
                        "size_min": 0.1
                    }
                },
                "line_linked": {
                    "enable": true,
                    "distance": 150,
                    "color": "#ffffff",
                    "opacity": 0.4,
                    "width": 1
                },
                "move": {
                    "enable": true,
                    "speed": 6,
                    "direction": "none",
                    "random": false,
                    "straight": false,
                    "out_mode": "out",
                    "bounce": false
                }
            },
            "interactivity": {
                "detect_on": "canvas",
                "events": {
                    "onhover": {
                        "enable": true,
                        "mode": "repulse"
                    },
                    "onclick": {
                        "enable": true,
                        "mode": "push"
                    }
                }
            },
            "retina_detect": true
        });
    </script> -->
</body>

</html>
