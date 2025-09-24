<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>CELSH | Log in </title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{asset('/admintle/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('/admintle/dist/css/adminlte.min.css')}}">
  <link rel="stylesheet" href="{{asset('css/style.css')}}">

</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-celsh card-outline ">
    <div class="card-header text-center">
      <span href="" class="h1"><b>Admin </b>SIV</span> <br>
      <span href="" class="">Sistema Integral de Votaciones</span>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Iniciar sesion</p>
      @if ($message = Session::get('error'))
        <div class="alert alert-danger d-flex align-items-center" role="alert">
          <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
          <div>
            {{ $message }}
          </div>
        </div>
      @endif
      
      <form action="{{ route('login') }}" method="post">
          @csrf
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Usuario" value="{{old('user')}}" name="user" id="input_user" autofocus value="{{ old('name') }}" require>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Contraseña" name="password" id="input_pass"  require>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              
              <label for="remember">
                
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Iniciar</button>
          </div>
          <!-- /.col -->
        </div>
      </form>


      <!-- /.social-auth-links -->

      <p class="mb-1">
        <a href="">Olvidé mi contraseña</a>
      </p>

    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{asset('/admintle/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('/admintle/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('/admintle/dist/js/adminlte.min.js')}}"></script>
<!-- Validacion form -->
<script src="{{asset('/js/login.js')}}"></script>

<script>
 @if ($message = Session::get('error'))
    $('#input_pass').addClass('form-control is-invalid');
    $('#input_user').addClass('form-control is-invalid');
    console.log('pes');
  @endif

  
</script>
</body>
</html>
