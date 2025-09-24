@extends('admin')
@section ('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Editar Tipo</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('Tipo.index')}}">Lista del Tipos</a></li>
                    <li class="breadcrumb-item active">Editar Tipo</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<div class="m-3">
    <div class="card card-celsh card-outline card-tabs">
        
        <div class="card-body">
            <form method="post" action="{{ route('sesiones.update', $edit->id) }}">
                @method('patch')
                @csrf
                <div class="row g-2">
                    <div class="col-6">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Tipo</span>
                            </div>
                            <input type="text" placeholder="Número de Sesión" class="form-control" name="descripcion" value="{{$edit->descripcion}}" id="" aria-describedby="sesionHelp" required>
                        </div>
                    </div>
                    
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-success">Guardar</button>
        </div>
    </div>
</div>
@endsection