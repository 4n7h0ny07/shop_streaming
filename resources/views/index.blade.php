<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Servicios de Streaming</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/logo.css') }}">

    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css">
    <!-- Carga jQuery desde Google CDN -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
</head>

<body>
    <!-- Header -->
    <!-- Header -->
    <header>
        <div class="container">
            <div class="logo">
                <img src="{{ asset('images/plus.png')}}" alt="StreamPlus Logo"> <!-- Asegúrate de usar la ruta correcta -->
            </div>
            <nav>
                <ul class="nav-links">
                    <li><a href="#home">Inicio</a></li>
                    <li><a href="#services">Servicios</a></li>
                    <li><a href="#pricing">Planes</a></li>
                    <li><a href="#info">Información</a></li>
                    <li><a href="#offers">Ofertas</a></li>
                    <li><a href="#faq">Preguntas Frecuentes</a></li>
                </ul>
                <div class="menu-toggle">
                    <span class="bar"></span>
                    <span class="bar"></span>
                    <span class="bar"></span>
                </div>
            </nav>
            <div class="cta">
                <a href="{{ route('register') }}" class="btn">¡Regístrate Ahora!</a>
                <a href="{{ route('login') }}" class="btn">Iniciar Sesión</a>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section id="home" class="hero">
        <div class="overlay"></div>
        <div class="content">
            <h2>La mejor experiencia en streaming</h2>
            <p>Disfruta de tus series y películas favoritas en cualquier momento y lugar.</p>
            <a href="{{ route('register') }}" class="btn-danger">Registrarme Ahora</a>
            <a href="#pricing" class="btn hero-btn">Ver Planes</a>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="services">
        <div class="container">
            <h2>Nuestros Servicios</h2>
            <div class="slider">
                <div class="slider-track">
                    <div class="service-card ">
                        <img src="{{ asset('images/services/flujotv.png') }}" alt="no image">
                        {{-- <h3>Flujo Tv</h3> --}}
                        {{-- <p>Accede a una gran variedad de películas de todos los géneros.</p> --}}
                    </div>
                </div>
                <div class="slider-track">
                    <div class="service-card ">
                        <img src="{{ asset('images/services/mastviptv.png') }}" alt="no image">
                        {{-- <h3>Mas Tv Iptv</h3> --}}
                        {{-- <p>Accede a una gran variedad de películas de todos los géneros.</p> --}}
                    </div>
                </div>
                <div class="slider-track">
                    <div class="service-card ">
                        <img src="{{ asset('images/services/netflix.png') }}" alt="no image">
                        {{-- <h3>Netflix</h3> --}}
                        {{-- <p>Accede a una gran variedad de películas de todos los géneros.</p> --}}
                    </div>
                </div>
                <div class="slider-track">
                    <div class="service-card ">
                        <img src="{{ asset('images/services/primevideo.png') }}" alt="no image">
                        {{-- <h3>Prime Video</h3> --}}
                        {{-- <p>Accede a una gran variedad de películas de todos los géneros.</p> --}}
                    </div>
                </div>
                <div class="slider-track">
                    <div class="service-card ">
                        <img src="{{ asset('images/services/youtube.png') }}" alt="no image">
                        {{-- <h3>You Tube</h3> --}}
                        {{-- <p>Accede a una gran variedad de películas de todos los géneros.</p> --}}
                    </div>
                </div>
                <div class="slider-track">
                    <div class="service-card ">
                        <img src="{{ asset('images/services/hbo.png') }}" alt="no image">
                        {{-- <h3>You Tube</h3> --}}
                        {{-- <p>Accede a una gran variedad de películas de todos los géneros.</p> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Pricing Section -->
    <section id="pricing" class="pricing">
        <div class="container">
            <h2>Servicios mas solicitados</h2>
            <div class="pricing-grid">
                <div class="pricing-card">
                    <h3>Netflix</h3>
                    <p class="price">Bs. 25/mes</p>
                    <ul>
                        <li>1 Dispositivo</li>
                        <li>Series y Peliculas</li>
                        <li>Calidad FHD</li>
                        <li>Perfil Personlizado</li>
                        <li>Cuentas Renovables</li>
                    </ul>
                    <a href="{{ route('register') }}" class="btn">Suscribirse</a>
                </div>
                <div class="pricing-card ">

                    <h3 class="highlight">Flujo Tv</h3>


                    <p class="price">Bs. 30/mes</p>
                    <ul>
                        <li>Calidad HD y 4K</li>
                        <li>Hasta 1 Dispositivos</li>
                        <li>Acceso a Canales</li>
                        <li>Acceso a Series y Pelculas</li>
                        <li>Cuentas Renovables</li>
                    </ul>

                    <a href="{{ route('register') }}" class="btn">Suscribirse</a>
                </div>
                <div class="pricing-card">
                    <h3>Mas Tv Iptv</h3>
                    <p class="price">Bs. 35/mes</p>
                    <ul>
                        <li>Calidad HD y 4K</li>
                        <li>Hasta 1 Dispositivo</li>
                        <li>Acceso a Canales</li>
                        <li>Acceso a Series y Pelculas</li>
                        <li>Cuentas Renovables</li>
                    </ul>
                    <a href="{{ route('register') }}" class="btn">Suscribirse</a>
                </div>
                <div class="pricing-card">
                    <h3>Prime Video</h3>
                    <p class="price">Bs. 15/mes</p>
                    <ul>
                        <li>Calidad HD y 4K</li>
                        <li>Hasta 1 Dispositivos</li>
                        <li>Calidad FHD</li>
                        <li>Perfil Personlizado</li>
                        <li>Cuentas Renovables</li>
                    </ul>
                    <a href="{{ route('register') }}" class="btn">Suscribirse</a>
                </div>
            </div>
            <h2>¿Ya compre, dónde mandan mis datos de acceso? </h2>
            <p>Si ya ha comprado un plan, los mismo se muestran ene l sistema en el Menu Historial/Compras en las
                acciones boton ver, o también los puede
                solicitar por <a style="color: rgb(255, 81, 0)"
                    href="https://wa.me/59165203074?text=Hola,%20por%20favor%20me%20puede%20ayudar%20a%20obtener%20los%20datos%20de%20acceso%20de%20mi%20servicio"
                    target="_blank"> Whatsapp</a> (Debe
                mandar foto del voucher y nombre del usuario que hizo la compra) Saludos.</p>
        </div>
    </section>

    <!-- Informational Section -->

    <!-- Sección Por qué Elegirnos -->
    <section id="info" class="why-choose-us" style="background-image: url('images/services.jpg');">
        <div class="overlay"></div> <!-- Overlay agregado aquí -->
        <div class="container">
            <h2>Por qué elegirnos</h2>
            <!-- Swiper container -->
            <div class="swiper-container">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                    <!-- Slides -->
                    <div class="swiper-slide choose-us-card">
                        <div class="image-content">
                            <img src="{{ asset('images/register.png') }}" alt="Calidad de Video">
                        </div>
                        <div class="text-content">
                            <h3>Regístrate y Comienza a Ver</h3>
                            <p>¡Sé parte de nuestra comunidad de entretenimiento! Al registrarte, obtendrás acceso
                                exclusivo a promociones y descuentos en servicios de streaming como FlujoTV, MasTV e
                                IPTV. ¡Únete hoy mismo!</p>
                        </div>
                    </div>
                    <div class="swiper-slide choose-us-card">
                        <div class="image-content">
                            <img src="images/support_1.png" alt="Soporte">
                        </div>
                        <div class="text-content">
                            <h3>Soporte 24/7</h3>
                            <p>Ofrecemos soporte técnico en cualquier momento para asegurar que disfrutes de tus
                                servicios sin interrupciones.</p>
                        </div>
                    </div>
                    <div class="swiper-slide choose-us-card">
                        <div class="image-content">
                            <img src="{{ asset('images/prime.jpeg') }}" alt="Calidad de Video">
                        </div>
                        <div class="text-content">
                            <h3>Las mejores opciones de entretenimiento para toda la familia.</h3>
                            <p>Ofrecemos una extensa biblioteca con contenido variado para toda la familia, incluyendo
                                canales 24/7 de anime, series de TV, películas, noticias, documentales, música y más.
                            </p>
                        </div>
                    </div>
                    <div class="swiper-slide choose-us-card">
                        <div class="image-content">
                            <img src="{{ asset('images/iptv.png') }}" alt="Calidad de Video">
                        </div>
                        <div class="text-content">
                            <h3>Disfrute de sus series o peliculas donde quiera</h3>
                            <p>Nuestras plataformas son compatibles con Smart TV Android, TV Box, Amazon Fire Stick,
                                emuladores de Android para PC Windows o Mac, así como con celulares y tabletas Android.
                            </p>
                        </div>
                    </div>
                    <!-- Añade más slides como sea necesario -->
                </div>

                <!-- Pagination -->
                <div class="swiper-pagination"></div>

                {{-- <!-- Navigation buttons -->
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div> --}}
            </div>
        </div>
    </section>

    <!-- Ofertas Section -->
    <section id="offers" class="offers">
        <div class="container">
            <h2>AL CONTRATAR UNO DE NUESTROS SERVICIOS CUENTAS CON </h2>
            <div class="offer-grid">
                <div class="offer-card">
                    <img src="{{ asset('images/ninios.png') }}" alt="Contenido para niños">
                    <div class="text-content">
                        <h3>Infantiles</h3>
                        <p>Entretenimiento seguro y divertido para los más pequeños, disponible en cualquier momento.
                        </p>
                    </div>
                </div>
                <div class="offer-card">
                    <img src="{{ asset('images/deadpool.png') }}" alt="Contenido para adultos">
                    <div class="text-content">
                        <h3>Series y Peliculas</h3>
                        <p>Variedad de series y películas para disfrutar en cualquier momento.</p>
                    </div>
                </div>
                <div class="offer-card">
                    <img src="{{ asset('images/deportes.png') }}" alt="Contenido educativo">
                    <div class="text-content">
                        <h3>Deportes</h3>
                        <p>Recursos educativos para apoyar el aprendizaje en casa.</p>
                    </div>
                </div>
                <div class="offer-card">
                    <img src="{{ asset('images/musica.png') }}" alt="Contenido musical">
                    <div class="text-content">
                        <h3>Musica</h3>
                        <p>Acceso a una amplia biblioteca de música para todos los gustos.</p>
                    </div>
                </div>
                {{-- <div class="offer-card">
                <img src="{{ asset('images/default.png') }}" alt="Contenido de juegos">
                <div class="text-content">
                    <h3>Contenido de juegos</h3>
                    <p>Juegos interactivos para entretener y educar a los niños.</p>
                </div>
            </div> --}}
            </div>
        </div>
    </section>
    <section id="faq" class="faq-section">
        <div class="faq-left">
            <img src="{{ asset('images/faq.png') }}" alt="Imagen descriptiva" class="faq-image">

            <h2 class="faq-title">Preguntas Frecuentes (FAQ)</h2>
        </div>

        <div class="faq-right">
            <div class="faq-item">
                <input type="radio" name="faq" id="faq1" class="faq-radio">
                <label for="faq1" class="faq-question">¿Cómo puedo comprar una cuenta de streaming?</label>
                <div class="faq-answer">
                    <p>Para comprar una cuenta, primero debes <b><a style="color: rgb(255, 81, 0)"
                                href="{{ route('register') }}">registrarte</a> </b> o si ya tienes cuenta debes <b><a
                                style="color: rgb(255, 81, 0)" href="{{ route('register') }}">acceder</a> </b> al
                        sistema y cargar credito en nuestro sistema, luego selecciona la opcion de <b>SHOPPING</b>,
                        selecciona el servicio que deseas y
                        sigue el proceso de pago en nuestra página.</p>

                </div>
            </div>

            <div class="faq-item">
                <input type="radio" name="faq" id="faq2" class="faq-radio">
                <label for="faq2" class="faq-question">¿En cuantos dispositivos puedo utilizar las
                    cuentas?</label>
                <div class="faq-answer">
                    <p>Dependiendo lo adquirido, si compraste un servicio de un perfil o un dispositivo solo puede
                        usarlo en un dispositivo, pero si el servicio dice cuenta completa puede usarlo en mas de un
                        dispositivo</p>
                </div>
            </div>

            <div class="faq-item">
                <input type="radio" name="faq" id="faq3" class="faq-radio">
                <label for="faq3" class="faq-question">¿Qué debo hacer si tengo problemas con mi cuenta?</label>
                <div class="faq-answer">
                    <p>Si experimentas problemas, contacta a nuestro servicio de <a style="color: rgb(255, 81, 0)"
                            href="https://wa.me/59165203074?text=Hola,%20por%20favor%20necesito%20asistencia,%20tengo%20problemas%20para%20acceder%20a%20mi%20cuenta"
                            target="_blank">atención al cliente mediante Whatsapp</a> atención al cliente y te
                        asistiremos a
                        la brevedad.</p>
                </div>
            </div>
            <div class="faq-item">
                <input type="radio" name="faq" id="faq4" class="faq-radio">
                <label for="faq4" class="faq-question">¿Puedo cambiar mi cuenta de un servicio a otro?</label>
                <div class="faq-answer">
                    <p>Una vez que hayas comprado una cuenta, no es posible transferirla a otro servicio. Por favor,
                        selecciona el servicio correcto al momento de comprar.</p>

                </div>
            </div>

            <div class="faq-item">
                <input type="radio" name="faq" id="faq5" class="faq-radio">
                <label for="faq5" class="faq-question">¿Puedo obtener asistencia técnica después de comprar la
                    cuenta?</label>
                <div class="faq-answer">
                    <p>Sí, ofrecemos <a style="color: rgb(255, 81, 0)"
                            href="https://wa.me/59165203074?text=Hola,%20por%20favor%20requiero%20Asistencia%20técnica%20con%20uno%20de%20los%20servicios"
                            target="_blank">Asistencia técnica</a> para ayudarte con cualquier pregunta o problema que
                        puedas
                        tener.</p>
                </div>
            </div>

            <div class="faq-item">
                <input type="radio" name="faq" id="faq6" class="faq-radio">
                <label for="faq6" class="faq-question">¿Los datos de acceso son permanentes?</label>
                <div class="faq-answer">
                    <p>Las cuentas de streaming tienen una duración variable. Algunos servicios pueden requerir
                        renovación o pueden desactivarse si se detecta un uso inapropiado.</p>
                </div>
            </div>
            <div class="faq-item">
                <input type="radio" name="faq" id="faq7" class="faq-radio">
                <label for="faq7" class="faq-question">¿Las cuentas son renovables?</label>
                <div class="faq-answer">
                    <p>Si, las cuentas de streaming se pueden renovar, si se cancela antes del tiempo de finalizacion de
                        la suscripcion, tambien se pueden reactivar las cuentas que ya hayan vencido.</p>
                </div>
            </div>
        </div>
    </section>


<!-- Tu código JavaScript aquí -->
<script>
    $(document).ready(function() {
        $('.menu-toggle').click(function() {
            $('.nav-links').toggle(); // Alternar la visibilidad del menú
        });
    });
</script>


    <script>
        var swiper = new Swiper('.swiper-container', {
            loop: true, // Hacer el carrusel infinito
            autoplay: {
                delay: 15000, // 10 segundos entre cada slide
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });
    </script>




    <!-- Footer -->
    <footer>
        <div class="container">
            <p>&copy; 2024 StreamPlus. Todos los derechos reservados.</p>
        </div>
    </footer>

</body>

</html>
