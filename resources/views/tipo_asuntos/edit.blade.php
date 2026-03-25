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
                <li class="breadcrumb-item"><a href="{{route('Tipo_Asunto.index')}}">Lista de tipos</a></li>
                <li class="breadcrumb-item active">Editar Tipo</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
</section>
<div class="m-3 card">
    <div class="card-body">
        <div class="tab-content" id="custom-tabs-two-tabContent">
            <div class="tab-pane fade show active" id="custom-tabs-two-home" role="tabpanel" aria-labelledby="custom-tabs-two-home-tab">
                <form method="post" action="{{ route('Tipo_Asunto.update', $tipo->id) }}" enctype="multipart/form-data">
                    @method('patch')
                    @csrf
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> Descripcion</span>
                        </div>
                        <input type="text" class="form-control" accept="application/pdf" value="{{$tipo->descripcion}}" name="descripcion" id="" placeholder="Ejemplo: Orden del dia" required>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Guardar</button>
                    </div>
                </form>
                
            </div>
        </div>
    </div>
</div>
@endsection