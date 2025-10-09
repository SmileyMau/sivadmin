<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('/admintle/dist/css/adminlte.min.css')}}">

    <title>SIV | Faltantes</title>
</head>
<body>
    <div class="container mt-4">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Lista de Faltantes</h3>
            </div>
            <div class="card-body">
                @foreach ($faltantes as $faltante)
                    <li class="list-group-item">
                        <b>{{$faltante->name}} </b>{{  $faltante->appaterno . ' ' . $faltante->apmaterno }}
                    </li>
                @endforeach
            </div>
        </div>
    </div>
    
 



    <script src="{{asset('/admintle/plugins/jquery/jquery.min.js')}}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{asset('/admintle/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('/admintle/dist/js/adminlte.min.js')}}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{asset('/admintle/dist/js/demo.js')}}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>
</html>