<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>NEXURA | Nexura Internacional S.A.S</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{env('APP_URL')}}/assets/img/logo.jpg" rel="icon">
  <link href="{{env('APP_URL')}}/assets/img/logo.jpg" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{env('APP_URL')}}/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="{{env('APP_URL')}}/assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="{{env('APP_URL')}}/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="{{env('APP_URL')}}/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="{{env('APP_URL')}}/assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="{{env('APP_URL')}}/assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="{{env('APP_URL')}}/assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{env('APP_URL')}}/assets/css/style.css" rel="stylesheet">
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center">

      <h1 class="logo mr-auto"><a href="{{ url('/') }}">NEXURA</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo mr-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class="active"><a href="{{ url('/') }}">HOME</a></li>
          <li><a href="#about">NUESTRA EMPRESA</a></li>
          <li><a href="#services">SERVICIOS</a></li>
          <!--<li><a href="#portfolio">Portafolio</a></li>-->
          <!--<li><a href="#team">Equipo</a></li>-->
          <!--<li class="drop-down"><a href="">Drop Down</a>
            <ul>
              <li><a href="#">Drop Down 1</a></li>
              <li class="drop-down"><a href="#">Deep Drop Down</a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li>
              <li><a href="#">Drop Down 2</a></li>
              <li><a href="#">Drop Down 3</a></li>
              <li><a href="#">Drop Down 4</a></li>
            </ul>
          </li>-->
          <li><a href="#contact">CONTACTO</a></li>

        </ul>
      </nav><!-- .nav-menu -->

      <a href="{{ route('login') }}" class="get-started-btn scrollto">Iniciar Sesion</a>

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
          <h1>Soluciones integrales de Gobierno Digital y Atención Ciudadana</h1>
          <h2>{{(!$tenantName)?"Gobierno Digital":"Gobierno Digital - ".strtoupper($tenantName) }}</h2>
          <div class="d-lg-flex">
            <a href="{{ route('register') }}" class="btn-get-started scrollto">Registrate</a>
            {{-- <a href="" class="venobox btn-watch-video" data-vbtype="video" data-autoplay="true"> Ver video <i class="icofont-play-alt-2"></i></a> --}}
          </div>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
          <img src="{{env('APP_URL')}}/assets/img/why-us.png" class="img-fluid animated" alt="">
        </div>
      </div>
    </div>

  </section><!-- End Hero -->

  <!-- Vendor JS Files -->
  <script src="{{env('APP_URL')}}/assets/vendor/jquery/jquery.min.js"></script>
  <script src="{{env('APP_URL')}}/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="{{env('APP_URL')}}/assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="{{env('APP_URL')}}/assets/vendor/php-email-form/validate.js"></script>
  <script src="{{env('APP_URL')}}/assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="{{env('APP_URL')}}/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="{{env('APP_URL')}}/assets/vendor/venobox/venobox.min.js"></script>
  <script src="{{env('APP_URL')}}/assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="{{env('APP_URL')}}/assets/vendor/aos/aos.js"></script>

  <!-- Template Main JS File -->
  <script src="{{env('APP_URL')}}/assets/js/main.js"></script>

</body>

</html>