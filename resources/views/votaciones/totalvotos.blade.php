<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>CELSH | Votaciones</title>

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

  

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            @if ($total_asis == null && $total == null)
                <div class="content-header text-center">
                    <div class="">
                        <h1 class="m-0" style="font-size: 90px"> No se encontró ningún dictamen o asistencia.  </h1>
                    </div><!-- /.container-fluid -->
                </div>
                <div class="content-header text-center" style="padding-left: 20%; padding-right: 20%;">
                    <div class="card card-outline card-celsh">
                        <button class="btn btn-actualizar" style="font-size: 50px; " onClick="location.reload();">ACTUALIZAR</button>
                    </div><!-- /.container-fluid -->
                </div>
            @else
                @if ($total != null)
                    <!-- Content Header (Page header) -->
                    <div class="content-header text-center">
                        <div class="">
                            <h1 class="m-0" style="font-size: 45px"> {{$dictamen->titulo}}  </h1>
                        </div><!-- /.container-fluid -->
                    </div>
                    <!-- /.content-header -->
                    <section>
                        <div>

                        </div>
                    </section>  
                    <!-- Main content -->
                    <div class="content">
                        <div class="card card-outline" style=" border-left: solid 15px #00a65a;">
                            <div class="card-header">
                                <h1 class="card-title m-0" style="font-size: 85px"><b>A FAVOR:  {{$afavor}}</b></h1>
                            </div>
                        </div>
                        <div class="card card-outline" style=" border-left: solid 15px #f56954;">
                            <div class="card-header">
                                <h1 class="card-title m-0" style="font-size: 85px"><b>EN CONTRA:  {{$encontra}}</b></h1>
                            </div>
                        </div>
                        <div class="card card-outline" style=" border-left: solid 15px #f39c12;">
                            <div class="card-header">
                                <h1 class="card-title m-0" style="font-size: 85px"><b>ABSTENCIÓN:  {{$abstencion}}</b></h1>
                            </div>
                        </div>
                    </div>
                    <div class="content-header text-center" style="padding-left: 20%; padding-right: 20%;">
                        <div class="card card-outline card-celsh">
                            <button class="btn btn-actualizar" style="font-size: 50px; " onClick="location.reload();">ACTUALIZAR</button>
                        </div><!-- /.container-fluid -->
                    </div>
                @else
                    <section>
                        <div>

                        </div>
                    </section> 
                    <br>
                    <br>
                    <!-- Main content -->
                    <div class="content">
                        <div class="card card-outline" style=" border-left: solid 15px #a69b00;">
                            <div class="card-header">
                                <h1 class="card-title m-0" style="font-size: 150px"><b>Asistencias:  {{$total_asis}}</b></h1>
                            </div>
                        </div>
                    
                    </div>
                    <div class="content-header text-center" style="padding-left: 20%; padding-right: 20%;">
                        <div class="card card-outline card-celsh">
                            <button class="btn btn-actualizar" style="font-size: 50px; " onClick="location.reload();">ACTUALIZAR</button>
                        </div><!-- /.container-fluid -->
                    </div>
                @endif
            @endif

            
            
        
    </div>
        <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
   
    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="{{asset('/admintle/plugins/jquery/jquery.min.js')}}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{asset('/admintle/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('/admintle/plugins/chart.js/Chart.min.js')}}"></script>

    <script src="{{asset('/admintle/dist/js/adminlte.min.js')}}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{asset('/admintle/dist/js/demo.js')}}"></script>



</body>
</html>
