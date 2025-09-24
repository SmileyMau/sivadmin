<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <title>SIV | Asistencias</title>

    </head>

    <body style="padding: 0%; margin: 0%;">
        <!--<div class="watermark">
            <img src="{{asset('/img/logo2.png')}}" width="740" alt="">
        </div>-->
        
        <div class="cont-logo-sg">
            <img src="{{public_path('img/logo2.png')}}" alt="" width="80">
        </div>
        
        <div class=" cont-titulos">
            <p style="font-size: 25px; font-weight: bold; line-height: 85%; color:rgb(75, 75, 75)">{{$sesion->descripcion}}</p>
            <p style="font-size: 20px; font-weight: bold; color:rgb(75, 75, 75)">{{$dictamen->titulo}}</p>
            <p style="font-size: 15px; font-weight: bold; color:rgb(75, 75, 75)">{{$dictamen->descripcion}}</p>
        </div>   
            
         

        <div class="cont-table">
            <table class="table table-striped">
                <thead>
                    <tr style="text-align: center; ">
                        <th scope="col" style="color:rgb(75, 75, 75);">Nombre</th>
                        <th scope="col" style="color:rgb(75, 75, 75);">Votacion</th>
                    </tr>
                </thead>
                <tbody>
                    
                    @foreach($votaciones as $votacion)
                    <tr>
                        <td style="padding-left: 10px;">{{$votacion->name}} {{$votacion->appaterno}} {{$votacion->apmaterno}}</td>
                        @if($votacion->votacion == 'A')
                            <td style="text-align: center; color:rgb(35, 75, 35);">A FAVOR</td>
                        @endif
                        @if($votacion->votacion == 'N')
                            <td style="text-align: center; color:rgb(78, 28, 24);">EN CONTRA</td>
                        @endif
                        @if($votacion->votacion == 'S')
                        <td style="text-align: center; color:rgb(89, 90, 3);">ABSTENCIÓN</td>
                    @endif
                        </tr>
                        @endforeach
                    <tr>
                        <td> Total:</td>
                        <td style="text-align: center; "><b> {{$total}}</b> de <b>30</b></td>
                        <td> </td>
                        <td> </td>

                    </tr>
                </tbody>
            </table>
        </div>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

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
    left: ;: 0%;
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
    margin-left: 100px;
    width: 70%;
    margin-bottom: 20px;
    font-family: Arial, Helvetica, sans-serif;
    text-align: center;
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
    
    width: 100%;
    border-radius: 5px;
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

    
