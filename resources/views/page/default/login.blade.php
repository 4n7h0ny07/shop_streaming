<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login & Registro</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- FontAwesome para los íconos -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <!-- Estilos personalizados -->
    <style>
        body,
        html {
            overflow: hidden;
            /* Oculta las barras de desplazamiento */
            height: 100%;
            /* Asegura que el contenido ocupe toda la altura */
        }

        /* Estilos para el contenedor de las partículas */
        #particles-js {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 3;
        }

        /* Estilo para el slider */
        .carousel-inner img {
            width: 100%;
            height: 100vh;
            object-fit: cover;
        }

        /* Estilo para el contenido de la hero section */
        .hero-content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            color: white;
            z-index: 6;
        }

        .hero-content h1 {
            font-size: 4rem;
            font-weight: bold;
        }

        .hero-content p {
            font-size: 1.5rem;
            margin-bottom: 20px;
        }

        /* Caja del formulario */
        .form-container {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: rgba(0, 0, 0, 0.7);
            padding: 30px;
            border-radius: 10px;
            width: 100%;
            max-width: 400px;
            z-index: 3;
            opacity: 0;
            animation: fadeIn 1s forwards;
        }

        .form-container h2 {
            color: white;
            margin-bottom: 20px;
            text-align: center;
        }

        .form-container input {
            margin-bottom: 15px;
        }

        .form-container .form-check-label a {
            color: #ff6f61;
        }

        .toggle-form-btn {
            color: #ff6f61;
            cursor: pointer;
        }

        /* Animación de desvanecimiento para el formulario */
        @keyframes fadeIn {
            0% {
                opacity: 0;
            }

            100% {
                opacity: 1;
            }
        }

        /* Efectos de hover en los botones */
        .btn:hover {
            transform: scale(1.05);
            transition: transform 0.3s ease;
        }

        /* Animación de entrada para los campos */
        .form-container input {
            animation: slideIn 0.5s ease-out;
        }

        @keyframes slideIn {
            0% {
                opacity: 0;
                transform: translateY(20px);
            }

            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>

<body>

    <!-- Sección de partículas -->
    <div id="particles-js"></div>

    <!-- Sección Hero con Slider de imágenes -->
    <section class="hero-section">
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('template/img/bg.jpg') }}" class="d-block w-100" alt="Imagen 1">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Bienvenido a nuestra plataforma</h5>
                        <p>Explora nuestros productos y servicios increíbles.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('template/img/bg1.jpg') }}" class="d-block w-100" alt="Imagen 2">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Compra ahora y ahorra</h5>
                        <p>Encuentra descuentos exclusivos en nuestra tienda online.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('template/img/bg2.jpg') }}" class="d-block w-100" alt="Imagen 3">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Tu satisfacción, nuestra prioridad</h5>
                        <p>Recibe el mejor servicio al comprar con nosotros.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('template/img/bg3.jpg') }}" class="d-block w-100" alt="Imagen 3">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Tu satisfacción, nuestra prioridad</h5>
                        <p>Recibe el mejor servicio al comprar con nosotros.</p>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        <!-- <div class="hero-content">
            <h1>Bienvenidos a Fassid</h1>
            <p>La mejor tienda online para tus productos favoritos</p>
        </div> -->
    </section>

    <!-- Caja del formulario -->
    <div class="form-container" id="form-container">
        <!-- Login Form -->
        <div id="login-form">
            <h2 class="text-center text-white">Iniciar sesión</h2>
            <form action="{{ route('voyager.login') }}" method="POST">
                {{ csrf_field() }}
                <div class="mb-3">
                    <label for="email" class="form-label text-white">Correo Electrónico</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}"
                        placeholder="{{ __('voyager::generic.email') }}" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label text-white">Contraseña</label>
                    <input type="password" name="password" placeholder="{{ __('voyager::generic.password') }}"
                        class="form-control" required>
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" name="remember" id="remember" value="1">
                    <label class="form-check-label text-white" for="remember">Recordarme</label>
                </div>
                <button type="submit" class="btn btn-danger w-100">Iniciar sesión</button>
                <div class="mt-3 text-center">
                    <a href="/forgot-password" class="text-white">¿Olvidaste tu contraseña?</a><br>
                    <p class="text-white mt-2">¿No tienes cuenta? <span class="toggle-form-btn"
                            onclick="toggleForm()">Regístrate aquí</span></p>
                    <a href="{{ route('index')}}" class="text-white">volver al inicio</a>
                </div>
            </form>
        </div>

        <!-- Register Form (Inicialmente oculto) -->
        <div id="register-form" style="display:none;">
            <h2 class="text-center text-white">Crea tu cuenta</h2>
            <form action="{{ route('register') }}" method="POST">
                {{ csrf_field() }}
                <div class="mb-3">
                    <label for="name" class="form-label text-white">Nombre completo</label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}" placeholder="{{ __('nombre') }}" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="email-register" class="form-label text-white">Correo Electrónico</label>
                    <input name="email" id="email" value="{{ old('email') }}" placeholder="{{ __('voyager::generic.email') }}" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="password-register" class="form-label text-white">Contraseña</label>
                    <input type="password" name="password" placeholder="{{ __('voyager::generic.password') }}" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="confirm_password" class="form-label text-white">Confirmar Contraseña</label>
                    <input type="password" name="password_confirmation" placeholder="{{ __('Confirmar Password') }}" class="form-control" required>
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="terms" name="terms" required>
                    <label class="form-check-label text-white" for="terms">Acepto los <a href="/terms"
                            class="text-white">términos y condiciones</a></label>
                </div>
                <button type="submit" class="btn btn-danger w-100">Registrar cuenta</button>
                <div class="mt-3 text-center">
                    <p class="text-white mt-2">¿Ya tienes cuenta? <span class="toggle-form-btn"
                            onclick="toggleForm()">Inicia sesión aquí</span></p>
                    <a href="{{ route('index') }}" class="text-white">volver al inicio</a>
                </div>
            </form>
        </div>
    </div>
    <div style="clear:both"></div>

    @if (!$errors->isEmpty())
        <div class="alert alert-red">
            <ul class="list-unstyled">
                @foreach ($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @section('post_js')
        <script>
            var btn = document.querySelector('button[type="submit"]');
            var form = document.forms[0];
            var email = document.querySelector('[name="email"]');
            var password = document.querySelector('[name="password"]');
            btn.addEventListener('click', function(ev) {
                if (form.checkValidity()) {
                    btn.querySelector('.signingin').className = 'signingin';
                    btn.querySelector('.signin').className = 'signin hidden';
                } else {
                    ev.preventDefault();
                }
            });
            email.focus();
            document.getElementById('emailGroup').classList.add("focused");

            // Focus events for email and password fields
            email.addEventListener('focusin', function(e) {
                document.getElementById('emailGroup').classList.add("focused");
            });
            email.addEventListener('focusout', function(e) {
                document.getElementById('emailGroup').classList.remove("focused");
            });

            password.addEventListener('focusin', function(e) {
                document.getElementById('passwordGroup').classList.add("focused");
            });
            password.addEventListener('focusout', function(e) {
                document.getElementById('passwordGroup').classList.remove("focused");
            });
        </script>
    @endsection
    <!-- Bootstrap JS y Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

    <!-- Partículas JS -->
    <script src="https://cdn.jsdelivr.net/npm/particles.js"></script>

    <!-- Script para el cambio de formularios -->
    <script>
        function toggleForm() {
            var loginForm = document.getElementById("login-form");
            var registerForm = document.getElementById("register-form");

            if (loginForm.style.display === "none") {
                loginForm.style.display = "block";
                registerForm.style.display = "none";
            } else {
                loginForm.style.display = "none";
                registerForm.style.display = "block";
            }
        }

        particlesJS("particles-js", {
            particles: {
                number: {
                    value: 80,
                    density: {
                        enable: true,
                        value_area: 800
                    }
                },
                color: {
                    value: "#ff6f61"
                },
                shape: {
                    type: "circle",
                    stroke: {
                        width: 0,
                        color: "#ff6f61"
                    }
                },
                opacity: {
                    value: 0.5,
                    random: true,
                    anim: {
                        enable: true,
                        speed: 2,
                        opacity_min: 0
                    }
                },
                size: {
                    value: 5,
                    random: true
                },
                move: {
                    enable: true,
                    speed: 3,
                    direction: 'random',
                    random: true,
                    straight: false,
                    out_mode: 'out',
                    bounce: false
                }
            }
        });
    </script>

</body>

</html>
