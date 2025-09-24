@extends('admin')
@section ('content')


<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Tipos</h1>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
  <!-- Default box -->
  <div class="card card-outline card-celsh">
    <div class="card-header">
      <h3 class="card-title">Lista de Tipos</h3>
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
                        <th>DESCRIPCIÓN</th>
                        <th>OPCIONES</th>
                    </tr>
                </thead>
                    
                <tbody>
                    @foreach($tipos as $tipo) 
                        <tr class="fs-5">           
                            <td><b><i>{{$tipo->id}}</i></b></td>
                            <td ><b><i>{{$tipo->descripcion}}</i></b></td>
                            <td  class="">
                                <div class="dropdown"> 
                                    <button type="button" class="btn btn-info" data-toggle="dropdown">
                                        <i class="fas fa-align-center"></i>
                                    </button>
                                    <div class="dropdown-menu" role="menu">
                                        <a class="dropdown-item" href="{{ route('Tipo.edit', $tipo->id) }}">Editar</a>
                                        <a class="dropdown-item" href="{{ route('Tipo.show', $tipo->id) }}">Ver</a>
                                        <form method="post" action="{{ route('Tipo.destroy', $tipo->id) }}" class="form_cancelar">
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
         
            {{ $tipos->links() }}
        </div>
        

      </div>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog " role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Añadir nuevo tipo</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="post" action="{{route('Tipo.store')}}" enctype="multipart/form-data">
          @method('post') @csrf
          <div class="modal-body">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="nav-icon fas fa-copy"></i></span>
              </div>
              <input type="text" class="form-control" name="descripcion" id="" placeholder="Ejemplo: Ordinaria." required>
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




@endsection

@section ('js')



@endsection