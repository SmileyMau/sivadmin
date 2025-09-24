<!DOCTYPE html>
<html lang="es">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Sistema de Votación</title>

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
        <div class="content-wrapper cont_auto" style="background-color: rgb(26, 26, 26)">
            @if ($total_asis == null && $total == null)
                <div class="content-header text-center">
                    <div class="">
                        <img src="{{ asset('img/logo_poder_legis.jpg') }}" alt="poder legis" style="width: 100%">
                    </div><!-- /.container-fluid -->
                </div>
            @else
            @if ($total != null)
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
                        <div class="card card-celsh card-outline">
                            <div class="card-body"  style="background-color: rgb(26, 26, 26)">
                                <div class=" text-center">
                                    <div class="row g-2">
                                        <div class=""> 
                                            <table class="table" style="border: solid #c5c5c500 1px; border-radius: 7px; " >
                                                <!--<thead>
                                                <tr class="tr-asist" >
                                                    <th scope="col"  style="font-size: 33px; padding:1px; color: #c5c5c5; border: #c5c5c500;">Diputada/o</th>
                                                    <th scope="col"   style="font-size: 33px; padding:1px; color: #c5c5c5; border: #c5c5c500;" > Voto</th>
                                                </tr>
                                                </thead>-->
                                                <tbody>
                                                    @php
                                                        $count = 0;
                                                    @endphp
                                                    @foreach($votaciones as $votacion)
                                                        <tr class="tr-asist">
                                                            <td  style="padding: 0px; border: #c5c5c500;">
                                                                <div style="margin-top: 0px; text-align:start; font-size: 79px; color: #c5c5c5; ">
                                                                    <img src="{{url('storage/'.substr($votacion->img,7))}}" alt="" width="45">
                                                                    <b @if ($sesion->id_tipo == 2) class="color-solemne" @endif >{{$votacion->name}}</b> {{$votacion->appaterno}} {{$votacion->apmaterno}}
                                                                </div> 
                                                            </td>
                                                            <td style="padding: 0px; padding-top: 10px; border: #c5c5c500;"  >
                                                                @if($votacion->votacion == 'A')
                                                                    <div class="cont-voto-a "style="font-size: 30px; ">
                                                                        <img src="{{asset('img/favor.png')}}" alt="a favor" width="40" heigt="40">
                                                                    </div>
                                                                @endif
                                                                @if($votacion->votacion == 'S')
                                                                    <div class="cont-voto-s" style="font-size: 30px; ">
                                                                        <img src="{{asset('img/abstencion.png')}}" alt="abstencion" width="45">
                                                                    </div>
                                                                @endif
                                                                @if($votacion->votacion == 'N')
                                                                    <div class="cont-voto-n" style="font-size: 30px;">
                                                                        <img src="{{asset('img/contra.png')}}" alt="en contra" width="45">
                                                                    </div>
                                                                @endif
                                                            </td>
                                                        </tr>
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
                </div>
                <!-- /.content -->
            @else
                <!-- Content Header (Page header) -->
                <div class="content-header">
                    <div class="">
                        <div class="row mb-2">
                            <div class="col-sm-6 ">
                                <h1 class="m-0" style="font-size: 47px; color: #c5c5c5;" > Lista de asistencia &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{$date}}</h1>
                            </div>
                            <div class="col-sm-6 cont-total-asist">
                                <h1 class="m-0" style="font-size: 47px; color: #c5c5c5;" > <b>TOTAL: {{$total_asis}}</b></h1>
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
                                <div class="">
                                <div>
                                    <table class="table" style="border: solid #c5c5c500 1px;">
                                    <!--<thead>
                                        <tr class="tr-asist" >
                                        <th scope="col"  style="font-size: 33px; padding:1px; color: #c5c5c5; border: #c5c5c500;">Diputada/o</th>
                                        <th scope="col"  style="font-size: 33px; padding:1px; color: #c5c5c5; border: #c5c5c500;">Asist.</th>
                                        </tr>
                                    </thead>-->
                                    <tbody>
                                        @php
                                        $count = 0;
                                        @endphp
                                        @foreach($asistencias as $asistencia)

                                            <tr class="">
                                            <td  class="td-nombre" style="font-size: 79px; padding: 0px; margin: 0px; color: #c5c5c5;border: #c5c5c500;">
                                                <img src="{{url('storage/'.substr($asistencia->img,7))}}" alt="" width="70">
                                                <b @if ($sesion->id_tipo == 2) class="color-solemne" @endif >{{$asistencia->name}}</b> {{$asistencia->appaterno}} {{$asistencia->apmaterno}}
                                            </td>
                                            
                                            <td style="padding: 0px; padding-top: 14px; border: #c5c5c500;">
                                                <img src="{{asset('/img/botonesSL/asistencia.png')}}" alt=""  width="40">
                                            </td>
                                            </tr>
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
                    </div>
                    <!-- /.col-md-6 -->
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
                </div>
                <!-- /.content -->
            @endif
        @endif

    </div>
  <!-- /.content-wrapper -->


    









  <!-- Main Footer -->
  <footer class=" " style="background-color: rgb(26, 26, 26)">
    <!-- To the right -->

    <!-- Default to the left -->
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>
<script>
    function fetchServiceStatus() {
        $.ajax({
            url: "autoall",
            type: "GET",
            success: function (data) {
                // Reemplaza solo el contenido de la tabla
                $(".cont_auto").html(data);
                console.log("se modifico correctamente.");

            },
            error: function () {
                console.error("Error al obtener el estado de los servicios.");
            }
        });
    }

    // Consulta el estado cada 5 segundos
    setInterval(fetchServiceStatus, 5000);
    $(function () {
        //setInterval("location.reload()",5000);
    });
  
  </script>
</html>
