<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>CELSH | Asistencias</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{asset('/admintle/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('/admintle/dist/css/adminlte.min.css')}}">
  <link rel="stylesheet" href="{{asset('/css/user/style.css')}}">
  <link rel="shortcut icon" type="image/png" href="{{ asset('img/logo_poder_legis.png') }}"/>

</head>
<body class="hold-transition layout-top-nav">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
      <a href="" class="navbar-brand">
        <img src="{{ asset('img/logo2.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">CELSH</span>
      </a>

      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a href="index3.html" class="nav-link"></a>
          </li>
         
          
          </li>
        </ul>

        <!-- SEARCH FORM -->
        
      </div>

      <!-- Right navbar links -->
      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
        <!-- Messages Dropdown Menu 
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="fas fa-comments"></i>
            <span class="badge badge-danger navbar-badge">3</span>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <a href="#" class="dropdown-item">
               Message Start 
              <div class="media">
                <img src="../../dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                <div class="media-body">
                  <h3 class="dropdown-item-title">
                    Brad Diesel
                    <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                  </h3>
                  <p class="text-sm">Call me whenever you can...</p>
                  <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                </div>
              </div>
              Message End 
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
               Message Start 
              <div class="media">
                <img src="../../dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                <div class="media-body">
                  <h3 class="dropdown-item-title">
                    John Pierce
                    <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                  </h3>
                  <p class="text-sm">I got your message bro</p>
                  <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                </div>
              </div>
               Message End
            </a> 
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
               Message Start 
              <div class="media">
                <img src="../../dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                <div class="media-body">
                  <h3 class="dropdown-item-title">
                    Nora Silvester
                    <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                  </h3>
                  <p class="text-sm">The subject goes here</p>
                  <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                </div>
              </div>
              Message End 
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
          </div>
        </li>-->
        <!-- Notifications Dropdown Menu -->
        
      </ul>
    </div>
  </nav>
  <!-- /.navbar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="">
        <div class="row mb-2">
          <div class="col-sm-6 ">
            <h1 class="m-0" style="font-size: 36px;"> Lista de asistencia &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{$date}}</h1>
          </div>
          <div class="col-sm-6 cont-total-asist">
            <h1 class="m-0" style="font-size: 36px;"> <b>TOTAL: {{$total}}</b></h1>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="">
        <div class="">
          <!-- /.col-md-6 -->
          <div class="">

            <div class="card card-primary card-outline">
              
              <div class="card-body">
                <div class=" text-center">
                  <div class="row g-2">
                    <div class="col-6">
                      <div>
                        <table class="table" style="border: solid #c5c5c5 1px;">
                          <thead>
                            <tr class="tr-asist" >
                              <th scope="col"  style="font-size: 33px; padding:1px;">Diputada/o</th>
                              <th scope="col"  style="font-size: 33px; padding:1px;">Asistencia</th>
                            </tr>
                          </thead>
                          <tbody>
                            @php
                              $count = 0;
                            @endphp
                            @foreach($asistencias as $asistencia)
                              @if($count <= 14)
  
                                <tr class="">
                                  <td  class="td-nombre">
                                    <img src="{{url('storage/'.substr($asistencia->img,7))}}" alt="" width="45">
                                    <b>{{$asistencia->name}}</b> {{$asistencia->appaterno}} {{$asistencia->apmaterno}}
                                  </td>
                                  
                                  <td style="padding: 0px;">
                                    <img src="{{asset('/img/botonesSL/asistencia.png')}}" alt="">
                                  </td>
                                </tr>
                              @endif
                              @php
                                $count = $count + 1;
                              @endphp
                            @endforeach
                          </tbody>
                        </table>
                      </div>
                    </div>
                    <div class="col-6">
                      <table class="table" style="border: solid #c5c5c5 1px;">
                        <thead>
                          <tr class="tr-asist" >
                            <th scope="col"  style="font-size: 33px; padding:1px;">Diputada/o</th>
                            <th scope="col"  style="font-size: 33px; padding:1px;">Asistencia</th>
                          </tr>
                        </thead>
                        <tbody>
                          @php
                            $count = 0;
                          @endphp
                          @foreach($asistencias as $asistencia)
                            @if($count > 14)

                              <tr class="">
                                <td  class="td-nombre">
                                  <img src="{{url('storage/'.substr($asistencia->img,7))}}" alt="" width="45">
                                  <b>{{$asistencia->name}}</b> {{$asistencia->appaterno}} {{$asistencia->apmaterno}}
                                </td>
                               
                                <td style="padding: 0px;">
                                  <img src="{{asset('/img/botonesSL/asistencia.png')}}" alt="">
                                </td>
                              </tr>
                            @endif
                            @php
                              $count = $count + 1;
                            @endphp
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              
              </div>
            </div>
          </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->

    <!-- Default to the left -->
    <strong>Copyright &copy; 2022 <a href="">CELSH</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{asset('/admintle/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('/admintle/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('/admintle/dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('/admintle/dist/js/demo.js')}}"></script>

</body>
<script>
  $(function () {
    //setInterval("location.reload()",5000);
  });
  </script>
</html>
