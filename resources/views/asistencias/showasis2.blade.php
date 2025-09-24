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
<body class="hold-transition layout-top-nav" style="background-color: rgb(26, 26, 26); overflow-x:hidden; overflow-y:hidden;" >
<div class="wrapper">

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="background-color: rgb(26, 26, 26)">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="">
        <div class="row mb-2">
          <div class="col-sm-6 ">
            <h1 class="m-0" style="font-size: 47px; color: #c5c5c5;" > Lista de asistencia &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{$date}}</h1>
          </div>
          <div class="col-sm-6 cont-total-asist">
            <h1 class="m-0" style="font-size: 47px; color: #c5c5c5;" > <b>TOTAL: {{$total}}</b></h1>
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
              
              <div class="card-body " style="background-color: rgb(26, 26, 26)">
                <div class=" text-center">
                  <div class="row g-2">
                    <div class="col-6">
                      <div>
                        <table class="table" style="border: solid #c5c5c500 1px;">
                          <thead>
                            <tr class="tr-asist" >
                              <th scope="col"  style="font-size: 33px; padding:1px; color: #c5c5c5; border: #c5c5c500;">Diputada/o</th>
                              <th scope="col"  style="font-size: 33px; padding:1px; color: #c5c5c5; border: #c5c5c500;">Asist.</th>
                            </tr>
                          </thead>
                          <tbody>
                            @php
                              $count = 0;
                            @endphp
                            @foreach($asistencias as $asistencia)
                              @if($count <= 14)
  
                                <tr class="">
                                  <td  class="td-nombre" style="font-size: 53px; padding: 0px; margin: 0px; color: #c5c5c5;border: #c5c5c500;">
                                    <img src="{{url('storage/'.substr($asistencia->img,7))}}" alt="" width="70">
                                    <b @if ($sesion->id_tipo == 2) class="color-solemne" @endif >{{$asistencia->name}}</b> {{$asistencia->appaterno}} {{$asistencia->apmaterno}}
                                  </td>
                                  
                                  <td style="padding: 0px;border: #c5c5c500;">
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
                      <table class="table" style="border: solid #c5c5c500 1px;">
                        <thead>
                          <tr class="tr-asist" >
                            <th scope="col"  style="font-size: 33px; padding:1px; color: #c5c5c5; border: #c5c5c500;">Diputada/o</th>
                            <th scope="col"  style="font-size: 33px; padding:1px; color: #c5c5c5; border: #c5c5c500;">Asist.</th>
                          </tr>
                        </thead>
                        <tbody>
                          @php
                            $count = 0;
                          @endphp
                          @foreach($asistencias as $asistencia)
                            @if($count > 14)

                              <tr class="" >
                                <td  class="td-nombre" style="font-size: 53px; padding: 0px; margin: 0px; color: #c5c5c5; border: #c5c5c500;">
                                <img src="{{url('storage/'.substr($asistencia->img,7))}}" alt="" width="70">
                                <b @if ($sesion->id_tipo == 2) class="color-solemne" @endif >{{$asistencia->name}}</b> {{$asistencia->appaterno}} {{$asistencia->apmaterno}}</td>
                                <td style="padding: 0px; border: #c5c5c500;">
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
