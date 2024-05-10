<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AcountBuy</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
  <!--icon de bootstrap -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <!--sweetalert2-->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
 <!--video.js css-->
 <link href="https://vjs.zencdn.net/7.15.4/video-js.css" rel="stylesheet" />
  <!--video.js JavaScript-->
  <script src="https://vjs.zencdn.net/7.15.4/video.js"></script>
  <!-- ClipBoard  js-->
  <script src="https://cdn.rawgit.com/zenorocha/clipboard.js/v1.5.3/dist/clipboard.min.js"></script>
  {{-- Qr code --}}
  <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 <!-- Custom CSS -->
 <style>
    .product-card {
      border: 1px solid #dee2e6;
      border-radius: 10px;
      transition: all 0.3s ease;
    }
    .product-card:hover {
      box-shadow: 0px 0px 15px 0px rgba(0,0,0,0.1);
      transform: translateY(-5px);
    }
    .product-image {
      border-top-left-radius: 10px;
      border-top-right-radius: 10px;
      overflow: hidden;
    }
    .product-image img {
      width: 100%;
      height: auto;
    }
    .product-details {
      padding: 1.5rem;
    }
  </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Sistema de Ventas</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="">Productos</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="">Carrito</a>
      </li>
    </ul>

    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a href="/" class="btn btn-outline-primary login-btn"><i class="fas fa-sign-in-alt mr-2"></i>Iniciar sesión</a>
        </li>
    </ul>

  </div>
</nav>

<div class="container mt-5">
  <section id="productos">
    <h2 class="text-center mb-4">Productos</h2>
    <div class="row">
      <!-- Producto 1 -->
      <div class="col-lg-4 col-md-6 mb-4">
        <div class="card product-card">
          <div class="product-image">
            <img src="https://via.placeholder.com/300" class="card-img-top" alt="Producto 1">
          </div>
          <div class="card-body product-details">
            <h5 class="card-title">Producto 1</h5>
            <p class="card-text">$10.00</p>
            <a href="#" class="btn btn-primary">Agregar al carrito <i class="fas fa-cart-plus ml-2"></i></a>
          </div>
        </div>
      </div>
      <!-- Producto 2 -->
      <div class="col-lg-4 col-md-6 mb-4">
        <div class="card product-card">
          <div class="product-image">
            <img src="https://via.placeholder.com/300" class="card-img-top" alt="Producto 2">
          </div>
          <div class="card-body product-details">
            <h5 class="card-title">Producto 2</h5>
            <p class="card-text">$15.00</p>
            <a href="#" class="btn btn-primary">Agregar al carrito <i class="fas fa-cart-plus ml-2"></i></a>
          </div>
        </div>
      </div>
      <!-- Producto 3 -->
      <div class="col-lg-4 col-md-6 mb-4">
        <div class="card product-card">
          <div class="product-image">
            <img src="https://via.placeholder.com/300" class="card-img-top" alt="Producto 3">
          </div>
          <div class="card-body product-details">
            <h5 class="card-title">Producto 3</h5>
            <p class="card-text">$20.00</p>
            <a href="#" class="btn btn-primary">Agregar al carrito <i class="fas fa-cart-plus ml-2"></i></a>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<div class="container">
    @yield('content')
</div>

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('dist/js/adminlte.min.js')}}"></script>
</body>
</html>
