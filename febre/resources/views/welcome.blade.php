<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Electrotech</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet"  />
    <style>
        header {
            background-color: #f8f9fa;
            /* Color de fondo del header */
            border-bottom: 1px solid #e7e7e7;
            /* Línea inferior del header */
        }
        .contenedor {
            margin: auto;
            width: 100%;
            display: table;
        }

        h1 { 
            position: relative; 
            float: left;
            color: black;
            font-size: 2.1rem;
            padding-right: 1rem;
        }

        h1 span {
            position:absolute;
            right:0;
            width: 0;
            background-color: white;
            border-left: .1px solid #000;
            animation: escribir 7s steps(30) infinite alternate;
        }

        @keyframes escribir {
            from { width: 100% }
            to { width:0 }
        }
        .navbar-brand {
            font-size: 1.5rem;
            /* Tamaño de fuente del logo */
            font-weight: bold;
            /* Negrita para el logo */
        }

        .navbar-nav {
            margin-right: 1rem;
            /* Espaciado a la derecha del menú */
        }

        .navbar-nav .nav-link {
            font-size: 1.25rem;
            /* Tamaño de fuente de los enlaces del menú */
        }

        .navbar-nav .nav-link:hover {
            text-decoration: underline;
            /* Subrayado al pasar el cursor */
        }

        .nav-link.active {
            color: #007bff !important;
            /* Color del enlace activo */
        }

        .btn-primary,
        .btn-outline-primary {
            border-radius: 20px;
            /* Bordes redondeados para los botones */
        }

        .auth-buttons {
            margin-left: 1rem;
            /* Espaciado a la izquierda de los botones */
        }

        /* Estilos para la sección hero */
        .hero-section {
            padding: 30px 0;
            /* Espaciado interior */
            text-align: center;
            /* Centrado del contenido */
            background-size: cover;
            /* Ajuste de tamaño de la imagen */
            background-position: center;
            /* Posición del fondo centrado */
        }

        .hero-section h1 {
            font-size: 3.5rem;
            /* Tamaño grande para el título */
            font-weight: 700;
            /* Negrita */
            margin-bottom: 20px;
            /* Margen inferior */
        }

        .hero-section p {
            font-size: 1.5rem;
            /* Tamaño para el texto */
            margin-bottom: 40px;
            /* Margen inferior */
        }

        .carousel-img {
            max-height: 600px;
            width: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .carousel-img:hover {
            transform: scale(1.05);
        }

        /* Estilos para la sección de productos */
        #productos {
            padding: 20px 0;
            /* Espaciado vertical para la sección */
        }

        .product-container {
            margin-bottom: 30px;
            /* Espaciado entre contenedores de productos */
        }

        .product-card {
            height: 100%;
            /* Asegura que todas las tarjetas de productos tengan la misma altura */
            display: flex;
            flex-direction: column;
            background-color: #e6e6e6;
            /* Fondo gris platino */
            border-radius: 15px;
            /* Bordes redondeados */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            /* Sombra para el contenedor */
            transition: transform 0.3s, box-shadow 0.3s;
            /* Transiciones para efectos */
            overflow: hidden;
            /* Oculta contenido que se desborde */
            cursor: pointer;
            /* Cambia el cursor a pointer */
        }

        .product-card:hover {
            transform: translateY(-5px);
            /* Levanta el contenedor al pasar el ratón */
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
            /* Incrementa la sombra al pasar el ratón */
            border: 2px solid #000000;
            /* Borde resaltado al pasar el ratón */
        }

        .product-card img {
            width: 100%;
            /* Asegura que la imagen ocupe el ancho del contenedor */
            height: auto;
            /* Mantiene la proporción de la imagen */
            object-fit: cover;
            /* Ajusta la imagen para que se vea completa */
            border-radius: 15px 15px 0 0;
            /* Bordes redondeados en la parte superior */
            transition: transform 0.3s;
            /* Transición para el efecto de zoom */
        }

        .product-card:hover img {
            transform: scale(1.1);
            /* Efecto de zoom al pasar el ratón */
        }

        .product-card-body {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding: 15px;
        }

        .product-card-body .btn {
            border-radius: 10px;
            /* Bordes redondeados para los botones */
        }

        #about {
            padding: 20px;
            /* Espaciado interno */
        }

        #about h2 {
            font-size: 2.5rem;
            /* Tamaño de fuente para el título */
            margin-bottom: 30px;
            /* Espaciado inferior para separación */

        }

        #about p {
            font-size: 1.1rem;
            /* Tamaño de fuente para párrafos */
            line-height: 1.8;
            /* Altura de línea */
            color: #555555;
            /* Color del texto */
        }

        #about img {
            border-radius: 15px;
            /* Bordes redondeados para la imagen */
            margin-top: 20px;
            /* Espaciado superior */
        }

        .carousel-img {
            width: 100%;
            max-height: 600px;
            transition: transform 0.3s ease;
        }

        .carousel-img:hover {
            transform: scale(1.2);
        }

        /* Estilos adicionales para el footer */
        footer {
            background-color: #343a40;
            /* Color de fondo del footer */
            color: #f8f9fa;
            /* Color del texto */
            padding: 30px 0;
            /* Espaciado interno */
        }

        footer a {
            color: #f8f9fa;
            /* Color del enlace en el footer */
            text-decoration: none;
            /* Sin subrayado */
        }

        footer a:hover {
            text-decoration: underline;
            /* Subrayado al pasar el ratón */
        }

        .social-icons a {
            color: #f8f9fa;
            /* Color de los íconos sociales */
            font-size: 20px;
            /* Tamaño de fuente de los íconos sociales */
            margin: 0 10px;
            /* Margen entre los íconos */
            transition: color 0.3s;
            /* Transición de color al pasar el ratón */
        }

        .social-icons a:hover {
            color: #007bff;
            /* Color al pasar el ratón sobre los íconos */
        }
    </style>
</head>

<body class="font-sans antialiased dark:bg-black dark:text-white/50">
    <header>
        @if (Route::has('login'))
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Electrotech</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#productos">Novedad</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#about">Nosotros</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#contacto">Contacto</a>
                        </li>
                    </ul>
                    <div class="d-flex">
                        @auth
                        <a href="{{ url('/dashboard') }}" class="btn btn-outline-primary">Tienda</a>
                        @else
                        <a href="{{ route('login') }}" class="btn btn-outline-primary me-2">Iniciar Sesión</a>
                        @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="btn btn-primary">Registrarse</a>
                        @endif
                        @endauth
                    </div>
                </div>
            </div>
        </nav>
        @endif
    </header>
    <div class="container my-5">
        <div class="row">
            <div class="col-md-7">
                <!-- Carrusel de imágenes -->
                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{ asset('images/Lenovo.jpg') }}" class="carousel-img" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('images/Audifonos.jpg') }}" class="carousel-img" style="width: 570px      " alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('images/Microfono.jpg') }}" class="carousel-img" alt="...">
                        </div>
                    </div>
                </div>
            </div>
            <!-- Columna descriptiva -->
            <div style="margin-top: 15%;" class="col-md-4">
                    <div class="contenedor">
                        <h1>¡Bienvenido a ElectroTech!<span>&#160;</span></h1>
                    </div>
                <p>Nos complace recibirlos en nuestra tienda virtual, su destino de confianza para las últimas innovaciones en tecnología móvil. En ElectroTech, nos especializamos en ofrecer una amplia variedad de celulares de las marcas más reconocidas, garantizando calidad y vanguardia en cada producto.</p>
            </div>
        </div>
    </div>
    <section id="productos" class="container">
        <h2 class="text-center mb-5">Lo ultimo en Tecnologia</h2>
        <div class="row">
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 product-container">
                <div class="card product-card">
                    <img src="{{asset('images/Lenovo.jpg')}}" class="card-img-top">
                    <div class="card-body product-card-body">
                        <h5 class="card-title">Laptop Lenovo</h5>
                        <p class="card-text">Monitor plano 19" Teros TE-1911S Led, HD+(1600x1050), 60Hz, 5ms, entradas HDMI/VGA</p>
                        <a href="#" class="btn btn-primary">Ver más</a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 product-container">
                <div class="card product-card">
                    <img src="{{asset('images/Monitor.webp')}}" class="card-img-top">
                    <div class="card-body product-card-body">
                        <h5 class="card-title">Monitor Teros</h5>
                        <p class="card-text">Monitor plano 19" Teros TE-1911S Led, HD+(1600x1050), 60Hz, 5ms, entradas HDMI/VGA</p>
                        <a href="#" class="btn btn-primary">Ver más</a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 product-container">
                <div class="card product-card">
                    <img src="{{asset('images/Audifonos.jpg')}}" class="card-img-top">
                    <div class="card-body product-card-body">
                        <h5 class="card-title">Audifonos Razer</h5>
                        <p class="card-text">Audifonos gamer Razer Barracuda X inalámbrico color Negro, Conexión USB tipo C</p>
                        <a href="#" class="btn btn-primary">Ver más</a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 product-container">
                <div class="card product-card">
                    <img src="{{asset('images/Microfono.jpg')}}" class="card-img-top">
                    <div class="card-body product-card-body">
                        <h5 class="card-title">Microfono Razer</h5>
                        <p class="card-text">Micrófono gamer Razer Negro Seiren V2 X Usb Streaming, Frecuencia 20 Hz - 20 kHz</p>
                        <a href="#" class="btn btn-primary">Ver más</a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 product-container">
                <div class="card product-card">
                    <img src="{{asset('images/Mouse.webp')}}" class="card-img-top">
                    <div class="card-body product-card-body">
                        <h5 class="card-title">Mouse Logitech</h5>
                        <p class="card-text">Mouse gamer alámbrico Logitech G502 Hero, conexión USB, 25000 dpi, 11 botones, RGB</p>
                        <a href="#" class="btn btn-primary">Ver más</a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 product-container">
                <div class="card product-card">
                    <img src="{{asset('images/TarjetaGrafica.webp')}}" class="card-img-top">
                    <div class="card-body product-card-body">
                        <h5 class="card-title">Tarjeta Gráfica MSI</h5>
                        <p class="card-text">Tarjeta de vídeo Msi Nvidia RTX 4070 Ti Gamingx 12GB GDDR6X, 192 bits</p>
                        <a href="#" class="btn btn-primary">Ver más</a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 product-container">
                <div class="card product-card">
                    <img src="{{asset('images/Teclado.webp')}}" class="card-img-top">
                    <div class="card-body product-card-body">
                        <h5 class="card-title">Teclado Logitech</h5>
                        <p class="card-text">Teclado gamer Logitech G Pro 70%, mecánico, alámbrico, conexión usb, luces RGB</p>
                        <a href="#" class="btn btn-primary">Ver más</a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 product-container">
                <div class="card product-card">
                    <img src="{{asset('images/Celular.webp')}}" class="card-img-top">
                    <div class="card-body product-card-body">
                        <h5 class="card-title">SAMSUMG S24 Ultra</h5>
                        <p class="card-text">Celular Samsung Galaxy S24 Ultra 512GB, 12GB ram, cámara principal 200MP, 6.8", Negro</p>
                        <a href="#" class="btn btn-primary">Ver más</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="about" class="container py-5">
        <div class="row">
            <div class="col-lg-6">
                <h2 class="mb-4">Sobre Nosotros</h2>
                <p class="lead">Somos Electrotech, una empresa dedicada a ofrecer soluciones innovadoras en el campo de la tecnología eléctrica. Nuestro equipo está comprometido con la excelencia y la satisfacción del cliente.</p>
                <p>Desde nuestra fundación, nos hemos especializado en proporcionar productos de alta calidad y servicios adaptados a las necesidades de nuestros clientes.</p>
                <p>En Electrotech, valoramos la eficiencia, la sostenibilidad y la innovación en cada paso de nuestro trabajo. Nuestra misión es contribuir al avance tecnológico y mejorar la vida de las personas a través de soluciones eléctricas confiables y eficientes.</p>
            </div>
            <div class="col-lg-6">
                <img src="{{asset('img/img_nosotros.jpg')}}" class="img-fluid rounded" alt="Sobre Nosotros">
            </div>
        </div>
    </section>
    <footer>
        <div id="contacto" class="container">
            <div class="row">
                <div class="col-md-6">
                    <h5>Contacto</h5>
                    <p>Dirección: #563 Ubr. El Golf, Trujillo</p>
                    <p>Email: electrotech@gmail.com</p>
                    <p>Teléfono: 999478563</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <h5>Síguenos en redes sociales</h5>
                    <div class="social-icons">
                        <a href="#"><i class="bi bi-facebook"></i></a>
                        <a href="#"><i class="bi bi-twitter"></i></a>
                        <a href="#"><i class="bi bi-instagram"></i></a>
                        <a href="#"><i class="bi bi-linkedin"></i></a>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-12 text-center">
                    <p>&copy; 2024 Electrotech. Todos los derechos reservados.</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Biblioteca de JavaScript de Bootstrap 5 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Script adicional para hacer que el carrusel se desplace automáticamente -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var carousel = document.getElementById('carouselExampleIndicators');
            var carouselItems = carousel.querySelectorAll('.carousel-item');
            var currentIndex = 0;
            var interval = 2000; // Intervalo de 2 segundos

            function showNext() {
                currentIndex = (currentIndex + 1) % carouselItems.length;
                carouselItems.forEach(function(item, index) {
                    if (index === currentIndex) {
                        item.classList.add('active');
                    } else {
                        item.classList.remove('active');
                    }
                });
            }

            setInterval(showNext, interval);
        });
    </script>


</html>