@extends('admin')
@section ('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Editar Guion</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('Guion.index')}}">Lista del Guiones</a></li>
                    <li class="breadcrumb-item active">Editar Guion</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<div class="m-3">
    <div class="card card-celsh card-outline card-tabs">
        <form method="post" action="{{ route('Guion.update', $edit->id) }}" enctype="multipart/form-data">
            @method('patch')
            @csrf
            <div class="card-body">
                <div class="mb-3">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="nav-icon fas fa-copy"></i></span>
                      </div>
                        <input type="text" class="form-control" name="titulo" id="" placeholder="Titulo de la Sesión."  value="{{ $edit->titulo }}" required>
                    </div>
                </div>
        
                <div class="mb-3">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="nav-icon fas fa-copy"></i></span>
                        </div>
                        <input type="date" class="form-control" name="fecha" id="" placeholder="fecha" value="{{ $edit->fecha }}" required>
                    </div>
                </div>
    
                <div class="input-group input-group-outline mb-3">
                    <textarea class="ckeditor" name="texto" id="" rows="10" cols="80">
                    {!! $edit->texto !!}
                    </textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success">Guardar</button>
            </div>
        </form>
    </div>
</div>
@endsection