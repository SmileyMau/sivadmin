@extends('admin')

@section('content')

<div class="">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Archivos Transparencia de la sesión {{$sesion->descripcion}} </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('sesiones.index')}}">Lista de Sesiones</a></li>
                        <li class="breadcrumb-item active">Archivos</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card card-outline card-celsh">
                        <div class="card-top-border"></div>
                        <div class="card-header border-0 bg-light d-flex justify-content-between align-items-center">
                            <h3 class="card-title text-sm font-weight-bold text-uppercase">Archivos</h3>
                            <div class="card-tools ml-auto">
                                
                                <button class="btn btn-sm btn-outline-primary font-weight-bold" data-toggle="modal"
                                    data-target="#archivoModal" type="button">
                                    <i class="fas fa-plus mr-1"></i> Añadir
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                        class="fas fa-plus"></i></button>
                            </div>
                        </div>
                        <div class="card-body px-3 py-3">
                            @foreach ($archivos as $archivo)
                                <div class="card p-3 list-card">
                                    <div class="d-flex justify-content-between align-items-start mb-2">
                                        <span class="badge badge-primary " style="font-size: 10px;">#{{ $archivo->id}}</span>
                                        <div class="btn-group">
                                            <form action="{{ route('sesiones.destroy_archivo_transparencia', $archivo->id ) }}" class="form_cancelar" method="POST">
                                                @method('delete')
                                                @csrf
                                                <button class="btn btn-link btn-xs text-muted" type="submit"><i
                                                        class="fas fa-trash"></i></button>
                                            </form>
                                        </div>
                                    </div>
                                    <h5 class="text-xs font-weight-bold mb-1">{{ $archivo->tipoArchivo->descripcion }}</h5>
                                    <p class="text-xs text-muted mb-3">{{ $archivo->descripcion }} </p>
                                    <div class="text-xs text-danger font-weight-bold">
                                        <i class="fas fa-file-pdf mr-2"></i> <a
                                            href="{{url('storage/'.substr($archivo->archivo,7))}}" target="_blank">Ver
                                            PDF</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
 
<div class="modal fade card-primary" id="archivoModal" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="">Añadir asunto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="card-body">
            <form method="post" action="{{route('sesiones.store_archivo_transparencia',$sesion->id)}}" enctype="multipart/form-data">
                @method('post')
                @csrf
                <div id="form_det" defer>
                    <div class="" id="groupform0"defer>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="nav-icon fas fa-copy"></i></span>
                            </div>
                            <select name="id_tipo_archivo" id=""  class="form-control" required >
                                <option value="0" data-tipo="0">Seleccionar tipo...</option>
                                @foreach ($tipo_archivos as $tipo_archivo)
                                    <option value="{{$tipo_archivo->id}}" data-tipo="{{$tipo_archivo->id}}">{{$tipo_archivo->descripcion}}</option>
                                @endforeach
                            </select>
                        </div>
                        <br>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="nav-icon fas fa-copy"></i> Documento</span>
                            </div>
                            <input type="file" class="form-control" accept="application/pdf" name="archivo" id="" placeholder="Orden del dia" required>
                        </div>
                        <br>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="nav-icon fas fa-copy"></i> Descripcion</span>
                            </div>
                            <input type="text" class="form-control" name="descripcion" id="" placeholder="Descripcion del archivo" required>
                        </div>
                    </div>
                </div>
                <br>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success">Guardar</button>
                </div>
            </form>
        </div>     
    </div>
</div>
</div>



@endsection