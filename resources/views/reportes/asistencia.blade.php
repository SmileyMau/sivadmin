<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{public_path('bootstrap/css/bootstrap.min.css')}}" >
        <title>SIV | Asistencias</title>

    </head>

    <body style="padding: 0%; margin: 0%;">
        <!--<div class="watermark">
            <img src="{{asset('/img/logo2.png')}}" width="740" alt="">
        </div>-->
        <div class="cont-logo-sello">
            <img src="{{public_path('img/logo2.png')}}" alt="" width="90">
        </div>
        <div class="cont-titulos">
            <br>
            <p style="font-size: 25px; font-weight: bold; line-height: 85%; color:rgb(75, 75, 75)">Lista de Asistencias</p>
            <p style="font-size: 20px; font-weight: bold; color:rgb(75, 75, 75)">{{$sesion->descripcion}}</p>
        </div>          
        <div class="cont-table">
            <table class="table table-striped">
                <thead>
                    <tr style="text-align: center; ">
                        <th scope="col" style="color:rgb(75, 75, 75);">Nombre</th>
                        <th scope="col" style="color:rgb(75, 75, 75);">Hora</th>
                        <th scope="col" style="color:rgb(75, 75, 75);">Estatus</th>
                    </tr>
                </thead>
                <tbody>
                    
                    @foreach($asistencias as $asistencia)
                    <tr>
                        <td style="padding-left: 10px;">{{$asistencia->name}} {{$asistencia->appaterno}} {{$asistencia->apmaterno}}</td>
                        <td style="text-align: center; ">{{$asistencia->hora}}</td>
                        @if($asistencia->asistencia == 'A')
                            <td style="text-align: center; color:rgb(35, 75, 35);">Asistencia</td>
                        @endif
                        @if($asistencia->asistencia == 'N')
                            <td style="text-align: center; color:rgb(89, 90, 3);">Retardo</td>
                        @endif
                        </tr>
                        @endforeach
                    <tr>
                        <td> Hora de Apertura: {{$sesion->hora_ini}} y Hora de Cierre: {{$sesion->hora_fin}}</td>
                        <td> Total:</td>
                        <td style="text-align: center; "><b> {{$total}}</b> de <b>30</b></td>
                    </tr>
                </tbody>
            </table>
        </div>


        <script src="{{public_path('bootstrap/js/bootstrap.bundle.min.js')}}" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

    </body>
</html>

<style>
    @page {
        margin-top: 0.5cm;
		margin-left: 0.5cm;
		margin-right: 0.5cm;
        margin-bottom: 0cm;
        font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
	}
body{
   
}
.watermark {
   
    color: BLACK;
    position: fixed;
    top: auto;
    width: 25%;
}
.cont-logo-sg{
    position: absolute;
    right: 0%;
    top: 10px;
}
hr{
    height: 1px;
    border-radius: 99%;
    background-color: rgb(75, 75, 75);
}
.table td{
    padding: 0%;
}
.cont-titulos{
    font-family: Arial, Helvetica, sans-serif;
    text-align: center;
    width: 70%;
    margin-bottom: 20px;
    position: absolute;
    top:0px;
    left:140PX
}

.cont-titulos p{
   margin-bottom: 1px;
}

.contn-info-vale{
    font-family: Arial, Helvetica, sans-serif;
    width: 100%;
    position: absolute;
    top:140px;
}
.contn-info-vale p{
    margin-bottom: 1px;
}
.p-vale{
    font-size: medium;
    text-align: left;
}

.cont-table{
    border: 1px solid rgb(117, 117, 117);
    position: absolute;
    top: 105px;
    width: 100%;
    border-radius: 5px;
    font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

.cont-firma-entrego{
    text-align: center;
    width: 220px;
    display: inline-block;
    position: absolute;
    bottom: 150px;
}

.cont-firma-entrego img{
    position: absolute;
    width: 130px;
    bottom: 870px;
    left: 60px;
}

.p-entrego{
    font-size: medium;
    font-weight: bold;
    padding: 0%;
    margin: 0%;
}

.p-firma{
    font-weight: lighter;
    padding: 0%;
    margin-bottom: 80px;
    margin-top: 0px;
}

.cont-firma-director{
    text-align: center;
    width: 220px;
    display: inline-block;
    position: absolute;
    bottom: 100px;
    right: 240px;
}

.cont-firma-recibo{
    text-align: center;
    width: 220px;
    display: inline-block;
    position: absolute;
    bottom: 150px;
    right: 0px;
}
.cont-firma-director img{
    position: absolute;
    width: 190px;
    bottom: 890px;
    left: 20px;
}

.cont-logo-informatica{
    position: absolute;
    bottom: 0px;
    left: 0px;
}

.cont-logo-informatica img{
    width: 250px;
}

.cont-logo-qr{
    position: absolute;
    bottom: 0px;
    right: 0px;
}

.cont-logo-qr img{
    width: 250px;
}
</style>

    
