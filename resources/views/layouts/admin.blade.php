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
  <style>
    .dropdown-toggle{
       background: white;
       border: 0px;
    }
    .dropdown-toggle::after{
        display: none;
    }
    .divcontent{
        background: white;border: 1px solid #c0c0c0;border-radius: 10px; margin-top: 15px;
    }
    .divcontent:hover{
        box-shadow: 0 0 7px rgba(0, 0, 0, 5);
        transition: box-shadow 0.3s ease;
    }
</style>

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a class="nav-link">Panel</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">


      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{url('/')}}" class="brand-link">
      <img src="{{asset('dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">PanelAdmin</span>
    </a>

    <!-- Sidebar -->
        <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('dist/img/user2-160x160.jpg ')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

            @can('usuarios.index')
                <li class="nav-item menu">
                <a href="" class="nav-link active">
                  <i class="nav-icon fas"><i class="bi bi-people"></i></i>
                  <p>
                    Usuarios
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{url('/admin/usuarios')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Listado de usuarios</p>
                    </a>
                  </li>

                </ul>
              </li>

              <li class="nav-item menu">
                <a href="{{url('/admin/tienda')}}" class="nav-link active">
                  <i class="nav-icon fas"><i class="bi bi-folder-plus"></i></i>
                  <p>
                    Tienda

                  </p>
                </a>
              </li>
            @endcan



          <li class="nav-item menu">
            <a href="{{url('/admin/mi_unidad')}}" class="nav-link active">
              <i class="nav-icon fas"><i class="bi bi-folder-plus"></i></i>
              <p>
                Mi unidad

              </p>
            </a>
          </li>


          {{-- Almacen --}}
          <li class="nav-item menu">
            <a href="" class="nav-link active">
              <i class="nav-icon fas"><i class="bi bi-list-task"></i></i>
              <p>
                Almacen
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('/admin/almacen')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Listado de productos</p>
                </a>
              </li>

            </ul>
          </li>


          <!-- Authentication Links -->
        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                        <li class="nav-item" >
                            <a class="nav-link" href="{{ route('logout') }}" style="background-color: #d82912"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                         <i class="nav-icon fas"><i class="bi bi-door-closed"></i></i> Cerrar Session
                             </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                        </li>
                        @endguest



        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <br>

      @if( ($message = Session::get('mensaje')) && ($icono = Session::get('icono')) )
        <script>
            Swal.fire({
              position: "top-end",
              icon: "{{$icono}}",
              title: "{{$message}}",
              showConfirmButton: false,
              timer: 3000
            });
        </script>
      @endif

      <div class="container">
          @yield('content')
      </div>

  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('dist/js/adminlte.min.js')}}"></script>
</body>
</html>
