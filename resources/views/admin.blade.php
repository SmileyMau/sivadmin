<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SIV | Admin</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('admintle/plugins/fontawesome-free/css/all.min.css')}}">

  <link rel="stylesheet" href="{{asset('admintle/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('admintle/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('admintle/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('admintle/dist/css/adminlte.min.css')}}">
  <link rel="stylesheet" href="{{asset('css/style.css')}}">

  <link rel="stylesheet" href="{{asset('admintle/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}">

  
  @livewireStyles

</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
      <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far "></i>
          <span class="badge badge-danger navbar-badge"></span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Cerrar Sesion
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
              </div>
            </div>
            <!-- Message End -->
          </a>
        </div>
        <!--<a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>-->
      </li>

      <!-- Messages Dropdown Menu 
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
      </li>-->
      <!-- Notifications Dropdown Menu 
      <li class="nav-item dropdown">
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>-->
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
    <a href="" class="brand-link">
      <img src="{{asset('/img/logo_poder_legis.png')}}" alt="AdminLTE Logo" width="100" class="w-10 brand-image" style="opacity: .8">
      <span class="brand-text font-weight-light">SIV</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">

        <div class="info">
          <a href="#" class="d-block">{{auth()->user()->name}}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">

      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
          with font-awesome or any other icon font library -->

          <li class="nav-item user-panel ">
            <a href="{{route('dashboard.index')}}" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>Panel Administrativo</p>
            </a>
          </li>
          <li class="nav-header">CATALOGOS</li>

          <li class="nav-item">
            <a href="{{route('Tipo.index')}}" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>Cargos</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('Asuntos.index')}}" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>Tipo de Asunto</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('Tipo.index')}}" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>Comisiones</p>
            </a>
          </li>
          <li class="nav-item user-panel">
            <a href="{{route('Tipo.index')}}" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>Tipos de Sesion</p>
            </a>
          </li>
          <li class="nav-header ">SL</li>
          <li class="nav-item">
            <a href="{{route('Asuntos.index')}}" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>Asuntos</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('sesiones.index')}}" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>Sesiones</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('Guion.index')}}" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>Guion</p>
            </a>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @yield('content')

    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.2.0
    </div>
    <strong>Copyright &copy; 2023 <a href=""></a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->

<script src="{{asset('admintle/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('admintle/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('admintle/plugins/sweetalert2/sweetalert2.min.js')}}"></script>
<script src="{{asset('admintle/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('admintle/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('admintle/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('admintle/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('admintle/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('admintle/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('admintle/plugins/jszip/jszip.min.js')}}"></script>
<script src="{{asset('admintle/plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('admintle/plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('admintle/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('admintle/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('admintle/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
<script src="{{ asset('/vendor/ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('admintle/plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>

@yield('userjs')

@livewireScripts


<!-- AdminLTE App -->
<script src="{{asset('admintle/dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('admintle/dist/js/demo.js')}}"></script>
<script>

    
  $(function() {
    $('.form_cancelar').submit(function (event) {
      event.preventDefault();
      Swal.fire({
        title: "¿Desea eliminar este registro?",
        text: "No podrá recuperarse",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Eliminar",
        confirmButtonColor: "#d33",
        cancelButtonText: "Cancelar",
        reverseButtons: true
      }).then((result) => {
        if (result.isConfirmed) {
          this.submit();
        } else if (result.dismiss === "cancel") {
          icon: 'error',
          Toast.fire({
            icon: 'error',
            title: 'Se canceló la operación.'
          })
        }
      });
    });
  });

  $(function() {
    $('.form_activar').submit(function (event) {
      event.preventDefault();
      Swal.fire({
        title: "¿Desea activar el dictamen?",
        text: "Esto permite las votaciones en el dictamen.",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Activar",
        confirmButtonColor: "#008f4c",
        cancelButtonText: "Cancelar",
        reverseButtons: true
      }).then((result) => {
        if (result.isConfirmed) {
          this.submit();
        } else if (result.dismiss === "cancel") {
          icon: 'error',
          Toast.fire({
            icon: 'error',
            title: 'Se canceló la operación.'
          })
        }
      });
    });
  });

  $(function() {
    $('.form_cerrar').submit(function (event) {
      event.preventDefault();
      Swal.fire({
        title: "¿Desea cerra el dictamen?",
        text: "Esto desactiva las votaciones en el dictamen.",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Cerrar",
        confirmButtonColor: "#d33",
        cancelButtonText: "Cancelar",
        reverseButtons: true
      }).then((result) => {
        if (result.isConfirmed) {
          this.submit();
        } else if (result.dismiss === "cancel") {
          icon: 'error',
          Toast.fire({
            icon: 'error',
            title: 'Se canceló la operación.'
          })
        }
      });
    });
  });

  $(function() {
    $('.form_sactivar').submit(function (event) {
      event.preventDefault();
      Swal.fire({
        title: "¿Desea activar la sesion?",
        text: "Esto permite hacer cambios en la sesion y en los dictamenes.",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Activar",
        confirmButtonColor: "#008f4c",
        cancelButtonText: "Cancelar",
        reverseButtons: true
      }).then((result) => {
        if (result.isConfirmed) {
          this.submit();
        } else if (result.dismiss === "cancel") {
          icon: 'error',
          Toast.fire({
            icon: 'error',
            title: 'Se canceló la operación.'
          })
        }
      });
    });
  });

  $(function() {
    $('.form_scerrar').submit(function (event) {
      event.preventDefault();
      Swal.fire({
        title: "¿Desea cerra la sesion?",
        text: "Esto desactiva toda modificacion en la sesion y los dictamenes.",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Cerrar",
        confirmButtonColor: "#d33",
        cancelButtonText: "Cancelar",
        reverseButtons: true
      }).then((result) => {
        if (result.isConfirmed) {
          this.submit();
        } else if (result.dismiss === "cancel") {
          icon: 'error',
          Toast.fire({
            icon: 'error',
            title: 'Se canceló la operación.'
          })
        }
      });
    });
  });

  var Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000
  });

  @if($message = Session::get('success'))
    Toast.fire({
      icon: 'success',
      title: '{{$message}}'
    });
  @endif

  @if($message = Session::get('error'))
    Toast.fire({
      icon: 'error',
      title: '{{$message}}'
    });
  @endif

  @if($message = Session::get('warning'))
    Toast.fire({
      icon: 'warning',
      title: '{{$message}}'
    });
  @endif

</script>
@yield('js')

</body>
</html>
