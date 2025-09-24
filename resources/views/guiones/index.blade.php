@extends('admin')
@section ('content')


<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Guiones</h1>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
  <!-- Default box -->
  <div class="card card-outline card-celsh">
    <div class="card-header">
      <h3 class="card-title">Lista de Guiones</h3>
      <button type="button" class="btn btn-sm btn-primary float-right m-1" data-toggle="modal" data-target="#exampleModal">
        Añadir
      </button>
      <!--<form action="" method="post">
        
        <button type="sumbit" class="btn btn-sm btn-primary float-right m-1" >
          Export
        </button>
      </form> -->
      <div class="card-body">

        <div>
            
            <table id="" class="table m-0 border  text-muted">
              <thead>
                <tr>
                  <th>#</th>
                  <th>TITULO</th>
                  <th>OPCIONES</th>
                </tr>
              </thead>
                    
                <tbody>
                    @foreach($guions as $guion) 
                      <tr class="fs-5">           
                        <td><b><i>{{$guion->id}}</i></b></td>
                        <td ><b><i>{{$guion->titulo}}</i></b></td>
                        <td  class="">
                            <div class="dropdown"> 
                                <button type="button" class="btn btn-info" data-toggle="dropdown">
                                    <i class="fas fa-align-center"></i>
                                </button>
                                <div class="dropdown-menu" role="menu">
                                    <a class="dropdown-item" href="{{ route('Guion.edit', $guion->id) }}">Editar</a>
                                    <a class="dropdown-item" href="{{ route('Guion.show', $guion->id) }}">Ver</a>
                                    <form method="post" action="{{ route('Guion.destroy', $guion->id) }}" class="form_cancelar">
                                        @method('delete')
                                        @csrf
                                        <button class="dropdown-item">Eliminar</button>
                                    </form>
                                </div>
                            </div>
                        </td>
                      </tr>  
                    @endforeach
                </tbody>
            </table>
         
            {{ $guions->links() }}
        </div>
        

      </div>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Añadir nuevo tipo</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="post" action="{{route('Guion.store')}}" enctype="multipart/form-data">
          @method('post') @csrf
          <div class="modal-body">
            <div class="mb-3">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="nav-icon fas fa-copy"></i></span>
                </div>
                  <input type="text" class="form-control" name="titulo" id="" placeholder="Titulo de la Sesión." required>
              </div>
            </div>

            <div class="mb-3">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="nav-icon fas fa-copy"></i></span>
                </div>
                  <input type="date" class="form-control" name="fecha" id="" placeholder="fecha" required>
              </div>
            </div>

            <div class="input-group input-group-outline mb-3">
              <textarea class="ckeditor" name="texto" id="" rows="10" cols="80">
                
              </textarea>
            </div>
          </div>
          <!-- /.card -->
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-success">Guardar</button>
          </div>
        </form>
      </div>
      </div>     
    </div>
  </div>
</section>




@section('js')
@endsection



@endsection