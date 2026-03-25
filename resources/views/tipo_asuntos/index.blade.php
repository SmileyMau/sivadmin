@extends('admin')
@section ('content')


<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Tipo De Asuntos</h1>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
  <!-- Default box -->
  <div class="card card-outline card-celsh">
    <div class="card-header">
      <h3 class="card-title">Lista de tipos de asuntos</h3>
      <button type="button" class="btn btn-reasig float-right m-1" data-toggle="modal" data-target="#exampleModal">
        Añadir
      </button>
      <!--<form action="" method="post">
        @csrf
        <button type="sumbit" class="btn btn-sm btn-primary float-right m-1" >
          Export
        </button>
      </form> -->
      <div class="card-body">

        <table id="" class="table m-0 border  text-muted">
          <thead>
              <tr>
                  <th style="width: 10%" class="text-center">#</th>
                  <th>DESCRIPCION</th>
                  <th style="width: 4%" class="text-center">OPCIONES</th>
              </tr>
          </thead>
              
          <tbody>
              @foreach($tipos as $tipo) 
                  <tr class="fs-5" >           
                      <td class="text-center"><b><i>{{$tipo->id}}</i></b></td>
                      <td ><b><i>{{$tipo->descripcion}}</i></b></td>
                      <td  class="text-center">
                          <div class="dropstart " style="z-idex: 999;"> 
                              <button type="button" class="btn btn-option" data-toggle="dropdown">
                                  <i class="fas fa-align-center"></i>
                              </button>
                              <div class="dropdown-menu p-2" role="menu">
                                <a class="dropdown-item btn-editar mb-1" href="{{ route('Tipo_Asunto.edit', $tipo->id) }}">Editar</a>
                                @if ($tipo->status == 'A')
                                  <form method="post" action="{{ route('Tipo_Asunto.destroy', $tipo->id) }}" class="form_cancelar">
                                    @method('delete')
                                    @csrf
                                    <button class="dropdown-item btn-eliminar mb-1">Eliminar</button>
                                  </form>
                                @endif
                              </div>
                          </div>
                      </td>
                  </tr>  
              @endforeach
              
          </tbody>
      </table>
        
      </div>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Añadir nuevo tipo </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="post" action="{{route('Tipo_Asunto.store')}}" enctype="multipart/form-data">
            @method('post')
            @csrf
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"> Descripcion</span>
              </div>
              <input type="text" class="form-control" accept="application/pdf" name="descripcion" id="" placeholder="Ejemplo: Orden del dia" required>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-success">Guardar</button>
            </div>
          </form>
          <!-- /.card -->
        </div>
      </div>     
    </div>
  </div>
</section>
@endsection
