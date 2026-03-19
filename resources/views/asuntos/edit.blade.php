@extends('admin')
@section('css')
  <link rel="stylesheet" href="{{asset('admintle/plugins/select2/css/select2.min.css')}}">
  <link rel="stylesheet" href="{{asset('admintle/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('admintle/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css')}}">
@endsection
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Asunto #{{ $asunto->id }}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('Asuntos.index') }}">Lista de Asuntos</a></li>
                        <li class="breadcrumb-item active">Asunto #{{ $asunto->id }}</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-6">
                    <div class="card card-outline card-celsh">
                        <div class="card-top-border"></div>
                        <div class="card-header border-0 bg-light d-flex justify-content-between align-items-center">
                            <h3 class="card-title text-sm font-weight-bold text-uppercase">Asunto <span class="badge badge-primary " style="font-size: 12px;">No. {{ $asunto->no_oficio }}</span></h3>
                            <div class="card-tools ml-auto">

                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
                            </div>
                        </div>
                        <form method="post" action="{{route('Asuntos.update', $asunto->id)}}" enctype="multipart/form-data" class="p-3">
                            @method('put')
                            @csrf

                            <div class="row g-2 ">
                                <div class="col-6">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                    <span class="input-group-text"><b>Diputada/o</b></span>
                                    </div>
                                    <select name="id_user" id="" class="form-control" required>
                                    <option value="">Seleccionar...</option>
                                    @foreach ($users as $user)
                                        <option value="{{$user->id}}" @if($user->id == $asunto->id_user) selected @endif>{{strtoupper($user->name . ' ' . $user->appaterno . ' ' . $user->apmaterno)}}</option>
                                    @endforeach
                                    </select>
                                </div>
                                </div>
                                <div class="col-6">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><b>No. Oficio</b></span>
                                    </div>
                                    <input type="text" class="form-control" name="no_oficio" value="{{$asunto->no_oficio}}" aria-describedby="fechaHelp" placeholder="CELSH789" required>
                                </div>
                                </div>
                            </div>

                            <div class="row g-2">
                                <div class="col-6">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><b>Asunto</b></span>
                                        </div>
                                        <select name="id_tipo" id="" class="form-control" required>
                                            <option value="">Seleccionar...</option>
                                            @foreach ($tipo_asuntos as $tipo)
                                                <option value="{{$tipo->id}}" @if($tipo->id == $asunto->id_tipo) selected @endif>{{$tipo->descripcion}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                        </div>
                                        <input type="date" class="form-control" name="fecha" value="{{$asunto->fecha}}" aria-describedby="fechaHelp" required>
                                    </div>
                                </div>
                            </div>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><b>Titulo del asunto</b></span>
                                </div>
                                <input class="form-control" name="titulo" id="" cols="" rows="" required value="{{$asunto->titulo}}" placeholder="Ejemplo: Dictamen 601">
                            </div>
                            <br>

                            <div class="input-group">
                                <div class="input-group-prepend">
                                <span class="input-group-text"><b>Descripcion del asunto</b></span>
                                </div>
                                <input class="form-control" name="descripcion" id="" cols="" rows="" required value="{{$asunto->descripcion}}" placeholder="Ejemplo: Dictamen 601 relacionado con el asunto de...">
                            </div>
                            <br>

                                

                            <div class="input-group">
                                <div class="input-group-prepend">
                                <span class="input-group-text"><b>Archivo</b></span>
                                </div>
                                <input type="file" class="form-control" name="archivo"   value="" placeholder=""  accept="application/pdf">
                            </div>
                            
                            <br>
                            <div class="input-group">
                                <input type="text" class="form-control" name="observacion" id="" aria-describedby="" value="{{$asunto->observacion}}" placeholder="Observacion" required>
                            </div>

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success">Guardar</button>
                            </div>
                        </form>
                            
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="card card-outline card-celsh">
                        <div class="card-top-border"></div>
                        <div class="card-header border-0 bg-light d-flex justify-content-between align-items-center">
                            <h3 class="card-title text-sm font-weight-bold text-uppercase">Informes</h3>
                            
                            <div class="card-tools ml-auto">
                               <button class="btn btn-sm btn-outline-primary font-weight-bold" data-toggle="modal" data-target="#diputadoModal" type="button">
                                    <i class="fas fa-plus mr-1"></i> Añadir
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
                            </div>
                        </div>
                        <div class="card-body px-3 py-3">
                            <!-- Item Card 1 -->
                            @foreach ($diputados as $diputado)
                            <div class="card p-1 list-card">
                                <div class="d-flex justify-content-between align-items-start ">
                                    <span class="badge  " style="font-size: 15px;">{{ strtoupper($diputado->user->name . ' ' . $diputado->user->appaterno . ' ' . $diputado->user->apmaterno) }}</span>
                                    <div class="btn-group">
                                        <form action="{{ route('asuntos.destroy_diputado', $diputado->id) }}" method="POST" class="form_cancelar">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-link btn-xs text-muted" type="submit"><i
                                                    class="fas fa-trash"></i></button>
                                        </form>
                                    </div>
                                </div>
                                
                            </div>
                            @endforeach
                            
                            
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="row pl-5  pr-5">
                <div class="col-lg-12">
                    <div class="card card-outline card-celsh">
                        <div class="card-top-border"></div>
                        <div class="card-header border-0 bg-light d-flex justify-content-between align-items-center">
                            <h3 class="card-title text-sm font-weight-bold text-uppercase">Archivo</h3>

                        </div>
                        <!-- Item Card 1 -->
                        <div class=" p-3 list-card">
                            
                            <iframe src="{{url('storage/'.substr($asunto->archivo,7))}}" frameborder="0" width="100%" height="900px"></iframe>
                            
                        </div>
                            
                    </div>
                </div>
                
            </div>
        </div>

</div>
</section>

</div>

<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>



<!-- Modal Acuerdo Economico-->
<div class="modal fade card-primary" id="diputadoModal" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="">Añadir Acuerdo Economico</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="card-body">
                <form method="post" action="{{route('asuntos.store_diputado', $asunto->id)}}" enctype="multipart/form-data">
                    @method('patch')
                    @csrf

                    <div id="form_det" defer>
                        <div class="" id="groupform0"defer>
                            <div class="row g-2" >
                                <label>Diputada/o</label>
                                <select name="id_users[]" class="select2 select2-hidden-accessible" multiple="multiple" data-placeholder="Seleccionar..." row="3" style="width: 100%;">
                                    @foreach ($diputadosLibres as $libres)
                                        <option value="{{$libres->id}}">{{strtoupper($libres->name . ' ' . $libres->appaterno . ' ' . $libres->apmaterno)}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-success">Guardar</button>

                    </div>
                </form>
            </div>
        </div>     
    </div>
</div>

@endsection

@section ('userjs')
  <script src="{{asset('admintle/plugins/select2/js/select2.full.min.js')}}"></script>
  <script>
    $(function () {
      //Initialize Select2 Elements
      $('.select2').select2()
    });
  </script>
@endsection