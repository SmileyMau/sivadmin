<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SIV | VotacionEconomica</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{asset('/admintle/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('/admintle/dist/css/adminlte.min.css')}}">
  <link rel="stylesheet" href="{{asset('/css/user/style.css')}}">
  <link rel="shortcut icon" type="image/png" href="{{ asset('img/logo_poder_legis.png') }}"/>

</head>
<body class="hold-transition layout-top-nav" style="background-color: rgb(26, 26, 26); overflow-x:hidden; overflow-y:hidden;" >
<div class="wrapper">

  <!-- Navbar -->
  <!--<nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
      <a href="" class="navbar-brand">
        <!--<img src="{{ asset('img/logo2.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">CELSH</span>
      </a>

      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <!-- Left navbar links 
        <ul class="navbar-nav">
          <li class="nav-item">
            <a href="index3.html" class="nav-link"></a>
          </li>
         
          
          </li>
        </ul>

        <!-- SEARCH FORM 
        
      </div>

      <!-- Right navbar links 
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
        <!-- Notifications Dropdown Menu 
        
      </ul>
    </div>
  </nav>-->
  <!-- /.navbar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="background-color: rgb(26, 26, 26)">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="">
        <div class="row mb-2">
        <div class="col-sm-4 ">
            <h1 class="m-0" style="font-size: 46px; color: #c5c5c5;"> Votación &nbsp;&nbsp;&nbsp; {{$date}}</h1>
          </div>
          <div class="col-sm-2  cont-total-asist d-flex justify-content-center">
            <div class="" style="font-size: 37px;color: #c5c5c5;">
              <b >A FAVOR &nbsp;</b> 
            </div>
            <div class="cuadro-voto-a ">
              {{$afavor}}
            </div>
          </div>
          <div class="col-sm-2 cont-total-asist d-flex justify-content-center">
            <div class="" style="font-size: 37px;color: #c5c5c5;">
              <b>EN CONTRA &nbsp;</b> 
            </div>
            <div class="cuadro-voto-n">
               {{$encontra}}
            </div>
          </div>
          <div class="col-sm-2 cont-total-asist d-flex justify-content-center">
            <div class="" style="font-size: 37px;color: #c5c5c5;">
              <b>ABSTENCIÓN &nbsp;</b> 
            </div>
            <div class="cuadro-voto-s">
              {{$abstencion}}
            </div>
          </div>
          <div class="col-sm-2 cont-total-asist">
            <h1 class="m-0" style="font-size: 46px; color: #c5c5c5;"> <b>TOTAL: {{$total}}</b></h1>
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

            <div class="card card-celsh card-outline">
              
              <div class="card-body"  style="background-color: rgb(26, 26, 26)">
                <div class=" text-center">
                  <div class="row g-2">
                    <div class="col-6">
                      <table class="table" style="border: solid #c5c5c500 1px; border-radius: 7px; " >
                        <thead>
                          <tr class="tr-asist" >
                            <th scope="col"  style="font-size: 33px; padding:1px; color: #c5c5c5; border: #c5c5c500;">Diputada/o</th>
                            <th scope="col"   style="font-size: 33px; padding:1px; color: #c5c5c5; border: #c5c5c500;" > Voto</th>
                          </tr>
                        </thead>
                        <tbody>
                          @php
                            $count = 0;
                          @endphp
                          @foreach($votaciones as $votacion)
                            @if($count <= 14)
                              <tr class="tr-asist">
                               
                                <td  style="font-size: 27px;padding: 0px; border: #c5c5c500;">
                                  <div style="margin-top: 0px; text-align:start; font-size: 53px; color: #c5c5c5; ">
                                    <img src="{{url('storage/'.substr($votacion->img,7))}}" alt="" width="45">
                                    <b @if ($sesion->id_tipo == 2) class="color-solemne" @endif >{{$votacion->name}}</b> {{$votacion->appaterno}} {{$votacion->apmaterno}}
                                  </div> 
                                </td>
                                <td style="padding: 0px; border: #c5c5c500;"  >
                                  @if($votacion->votacion == 'A')
                                  <div class="cont-voto-a "style="font-size: 46px; ">
                                    <img src="{{asset('img/favor.png')}}" alt="a favor" width="45">
                                  </div>
                                  @endif
                                  @if($votacion->votacion == 'S')
                                  <div class="cont-voto-s" style="font-size: 46px; ">
                                    <img src="{{asset('img/abstencion.png')}}" alt="abstencion" width="45">
                                  </div>
                                  @endif
                                  @if($votacion->votacion == 'N')
                                  <div class="cont-voto-n" style="font-size: 46px;">
                                    <img src="{{asset('img/contra.png')}}" alt="en contra" width="45">
                                  </div>
                                  @endif
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
                    <div class="col-6">
                      <table class="table" style="border: solid #c5c5c500 1px;">
                        <thead>
                          <tr class="tr-asist" >
                            <th scope="col"  style="font-size: 33px; padding:1px; color: #c5c5c5; border: #c5c5c500;">Diputada/o</th>
                            <th scope="col"  style="font-size: 33px; padding:1px; color: #c5c5c5; border: #c5c5c500;"> Voto</th>
                          </tr>
                        </thead>
                        <tbody>
                          @php
                            $count = 0;
                          @endphp
                          @foreach($votaciones as $votacion)
                            @if($count > 14)

                              <tr class="">
                                
                                <td  style="font-size: 27px;padding: 0px; border: #c5c5c500;">
                                  <div style="margin-top: 0px; text-align:start; font-size: 53px; color: #c5c5c5; ">
                                    <img src="{{url('storage/'.substr($votacion->img,7))}}" alt="" width="45">
                                    <b @if ($sesion->id_tipo == 2) class="color-solemne" @endif >{{$votacion->name}}</b> {{$votacion->appaterno}} {{$votacion->apmaterno}}
                                  </div> 
                                </td>
                                <td style=" font-size:100px; padding: 0px; border: #c5c5c500;"  >
                                  @if($votacion->votacion == 'A')
                                  <div class="cont-voto-a" style="font-size: 46px;">
                                    <img src="{{asset('img/favor.png')}}" alt="a favor" width="45">
                                  </div>
                                  @endif
                                  @if($votacion->votacion == 'S')
                                  <div class="cont-voto-s" style="font-size: 46px;">
                                    <img src="{{asset('img/abstencion.png')}}" alt="abstencion" width="45">
                                  </div>
                                  @endif
                                  @if($votacion->votacion == 'N')
                                  <div class="cont-voto-n" style="font-size: 46px;">
                                    <img src="{{asset('img/contra.png')}}" alt="en contra" width="45">
                                  </div>
                                  @endif
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


  <!-- Main Footer -->
  <footer class="" style="background-color: rgb(26, 26, 26)">
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
    setInterval("location.reload()",5000);
  });
  </script>
</html>
