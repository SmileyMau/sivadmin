@extends('admin')
@section ('content')

<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Editar Personal</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('sesiones.index')}}">Lista del Personal</a></li>
                <li class="breadcrumb-item active">Editar Personal</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
</section>
<div class="m-3">
    <div class="">
        <div class="">
            <div class="card card-celsh card-outline card-tabs">
                <div class="card-header p-0 pt-1">
                    <ul class="nav nav-tabs" id="custom-tabs-two-tab" role="tablist">
                        <li class="nav-item" >
                            <a class="nav-link active" id="custom-tabs-two-home-tab" data-toggle="pill" href="#custom-tabs-two-home" role="tab" aria-controls="custom-tabs-two-home" aria-selected="true">Datos de Sesion</a>
                        </li>
                        <li class="nav-item" id="li_formresguerdo" >
                            <a class="nav-link" id="custom-tabs-two-profile-tab" data-toggle="pill" href="#custom-tabs-two-profile" role="tab" aria-controls="custom-tabs-two-profile" aria-selected="false">Dictamenes</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content" id="custom-tabs-two-tabContent">
                        <div class="tab-pane fade show active" id="custom-tabs-two-home" role="tabpanel" aria-labelledby="custom-tabs-two-home-tab">
                            <form method="post" action="{{ route('sesiones.update', $edit->id) }}">
                                @method('patch')
                                @csrf
                                <div class="mb-3">
                                    <div class="input-group">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="nav-icon fas fa-copy"></i></span>
                                      </div>
                                      <select name="id_tipo" id="" class="form-control" required>
                                        <option value="">Seleccionar...</option>
                                        @foreach ($tipos as $tipo)
                                          <option value="{{$tipo->id}}" @if ($tipo->id == $edit->id_tipo) selected  @endif>{{$tipo->descripcion}}</option>
                                        @endforeach
                                      </select>
                                    </div>
                                  </div>
                                <div class="row g-2">
                                    <div class="col-6">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">No.</span>
                                            </div>
                                            <input type="number" placeholder="Número de Sesión" class="form-control" name="no_sesion" value="{{$edit->no_sesion}}" id="" aria-describedby="sesionHelp" required>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                            </div>
                                            <input type="date" class="form-control" name="fecha" id="" value="{{$edit->fecha}}" aria-describedby="fechaHelp" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="nav-icon fas fa-copy"></i></span>
                                        </div>
                                        <input type="text" class="form-control" name="titulo" id="" value="{{$edit->descripcion}}" placeholder="Titulo de la Sesión." required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-success">Guardar</button>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="custom-tabs-two-profile" role="tabpanel" aria-labelledby="custom-tabs-two-profile-tab">
                            <div id="form_det" >
                                @foreach ($sesion_dets as $sesion_det)
                                    <form method="post" action="{{ route('sesiones.updatedet', $sesion_det->id) }}">
                                        @method('patch')
                                        @csrf
                                        <div class="" id="groupform0">
                                            <div class="row g-2" >
                                                <div class="col-3">
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">No.</span>
                                                        </div>
                                                        <input type="number" class="form-control" placeholder="Dictamen" name="no_dictamen" value="{{$sesion_det->no_dictamen}}" id="no_inventario" aria-describedby="dictamenHelp" required>
                                                    </div>  
                                                </div>
                                                <div class="col-9">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="nav-icon fas fa-copy"></i></span>
                                                        </div>
                                                        <input type="text" class="form-control" name="descripcion" id="" value="{{$sesion_det->descripcion}}" placeholder="Descripción del dictamen." required>
                                                        <button type="submit" class="btn btn-success">Guardar</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                @endforeach
                            </div>
                            <br>
                            <div class="form-group" style="display: none;">
                                <input type="hidden" id="idcount" name="count" required  readonly onmousedown="return false;" >
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection