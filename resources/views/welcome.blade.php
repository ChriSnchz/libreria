<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Librería</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic"
        rel="stylesheet" type="text/css" />
    <!-- Third party plugin CSS-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css"
        rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
</head>

<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
        <div class="container">
            <a class="navbar-brand js-scroll-trigger" href="#page-top">Librería</a><button
                class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto my-2 my-lg-0">
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#acerca">Acerca de</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#servicios">Servicios</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#portfolio">Galería</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#comprar">Comprar</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#contacto">Contacto</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="{{ route('login') }}">Iniciar
                            sesión</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Masthead-->
    <header class="masthead">
        <div class="container h-100">
            <div class="row h-100 align-items-center justify-content-center text-center">
                <div class="col-lg-10 align-self-end">
                    <h1 class="text-uppercase text-white font-weight-bold">
                        Conocimiento a tu alcance
                    </h1>
                    <hr class="divider my-4" />
                </div>
                <div class="col-lg-8 align-self-baseline">
                    <p class="text-white-75 font-weight-light mb-5">Nuestras librerías ofrecen un servicio rápido y
                        eficiente, y tienen el más amplio surtido en libros de interés general,
                        profesionales, académicos y de texto para todos los niveles educativos en español, inglés y
                        otros idiomas, así como
                        libros de lectura para niños, jóvenes y adultos en inglés y en español.
                    </p>
                    <a class="btn btn-primary btn-xl js-scroll-trigger" href="#acerca">Descubre más</a>
                </div>
            </div>
        </div>
    </header>
    <!-- acerca-->
    <section class="page-section bg-primary" id="acerca">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <h2 class="text-white mt-0">Nuestra misión</h2>
                    <hr class="divider light my-4" />
                    <p class="text-white-50 mb-4">
                        Apoyar el fomento a la lectura en nuestro país, brindando espacios dignos y agradables al libro
                        para su adecuada
                        exhibición y comercialización, y hacerlo llegar a todo el territorio nacional en tiempos
                        razonables y a precios justos.
                    </p>
                    <a class="btn btn-light btn-xl js-scroll-trigger" href="#servicios">Conócenos</a>
                </div>
            </div>
        </div>
    </section>
    <!-- servicios-->
    <section class="page-section" id="servicios">
        <div class="container">
            <h2 class="text-center mt-0">Nuestros servicios</h2>
            <hr class="divider my-4" />
            <div class="row d-flex justify-content-center">

                <div class="col-lg-3 col-md-6 text-center">
                    <div class="mt-5">
                        <i class="fas fa-4x fa-laptop-code text-primary mb-4"></i>
                        <h3 class="h4 mb-2">Catálogo actualizado</h3>
                        <p class="text-muted mb-0">Nuestro catálogo se actualiza cada día</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="mt-5">
                        <i class="fas fa-4x fa-globe text-primary mb-4"></i>
                        <h3 class="h4 mb-2">Envíos al momento</h3>
                        <p class="text-muted mb-0">Puedes obtener tus articulos en pocos días hábiles</p>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- Portfolio-->
    <div id="portfolio">
        <h2 class="text-center mt-0">Galería</h2>
        <hr class="divider my-4" />
        <div class="container-fluid p-0">
            <div class="row no-gutters">
                <div class="col-lg-3 col-sm-6">
                    <a class="portfolio-box" href="assets/img/galeria/fullsize/1.jpg"><img class="img-fluid"
                            src="assets/img/galeria/thumbnails/1.jpg" alt="" />
                        <div class="portfolio-box-caption">
                            <div class="project-name">Libros digitales</div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <a class="portfolio-box" href="assets/img/galeria/fullsize/2.jpg"><img class="img-fluid"
                            src="assets/img/galeria/thumbnails/2.jpg" alt="" />
                        <div class="portfolio-box-caption">
                            <div class="project-name">Libros físicos</div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <a class="portfolio-box" href="assets/img/galeria/fullsize/3.jpg"><img class="img-fluid"
                            src="assets/img/galeria/thumbnails/3.jpg" alt="" />
                        <div class="portfolio-box-caption">
                            <div class="project-name">Revistas</div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <a class="portfolio-box" href="assets/img/galeria/fullsize/4.jpg"><img class="img-fluid"
                            src="assets/img/galeria/thumbnails/4.jpg" alt="" />
                        <div class="portfolio-box-caption">
                            <div class="project-name">Audiolibros</div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- contacto-->
    <section class="page-section" id="contacto">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <h2 class="mt-0">Contáctanos</h2>
                    <hr class="divider my-4" />
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 ml-auto text-center mb-5 mb-lg-0">
                    <i class="fas fa-phone fa-3x mb-3 text-muted"></i>
                    <div>+1 (555) 123-4567</div>
                </div>
                <div class="col-lg-4 mr-auto text-center">
                    <i class="fas fa-envelope fa-3x mb-3 text-muted"></i>
                    <!-- Make sure to change the email address in BOTH the anchor text and the link target below!--><a
                        class="d-block" href="mailto:contacto@yourwebsite.com">contacto@yourwebsite.com</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer-->
    <footer class="bg-light py-5">
        <div class="container">
            <div class="small text-center text-muted">Copyright © 2020</div>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
    <!-- Third party plugin JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
</body>

</html>