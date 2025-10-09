@extends('admin')
@section ('content')


<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Sesiones</h1>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
  <!-- Default box -->
  <div class="card card-outline card-celsh">
    <div class="card-header">
      <h3 class="card-title">Lista de Sesiones</h3>
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

        @livewire('sesion-table')

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
          <h5 class="modal-title" id="exampleModalLabel">Añadir nueva sesion</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="card card-primary card-tabs">
            <div class="card-header p-0 pt-1">
              <ul class="nav nav-tabs" id="custom-tabs-two-tab" role="tablist">
                <li class="nav-item" >
                  <a class="nav-link active" id="custom-tabs-two-home-tab" data-toggle="pill" href="#custom-tabs-two-home" role="tab" aria-controls="custom-tabs-two-home" aria-selected="true">Datos de Sesion</a>
                </li>
                <li class="nav-item" id="li_formresguerdo" >
                  <a class="nav-link" id="custom-tabs-two-profile-tab" data-toggle="pill" href="#custom-tabs-two-profile" role="tab" aria-controls="custom-tabs-two-profile" aria-selected="false">Puntos a Votar</a>
                </li>

              </ul>
            </div>
          <div class="card-body">
          <form method="post" action="{{route('sesiones.store')}}" enctype="multipart/form-data">
            @method('post')
              @csrf
              <div class="tab-content" id="custom-tabs-two-tabContent">
                <div class="tab-pane fade show active" id="custom-tabs-two-home" role="tabpanel" aria-labelledby="custom-tabs-two-home-tab">

                  <div class="mb-3">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="nav-icon fas fa-copy"></i></span>
                      </div>
                      <select name="id_tipo" id="" class="form-control" required>
                        <option value="">Seleccionar...</option>
                        @foreach ($tipos as $tipo)
                          <option value="{{$tipo->id}}">{{$tipo->descripcion}}</option>
                            
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
                        <input type="number" placeholder="Número de Sesión" class="form-control" name="no_sesion" id="" aria-describedby="sesionHelp" required>
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                        </div>
                        <input type="date" class="form-control" name="fecha" id="" aria-describedby="fechaHelp" required>
                      </div>
                    </div>
                  </div>

                  <div class="">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="nav-icon fas fa-copy"></i></span>
                      </div>
                        <input type="text" class="form-control" name="titulo" id="" placeholder="Titulo de la Sesión." required>
                    </div>
                  </div>

                  <div class="mt-3">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="nav-icon fas fa-copy"> Orden del dia</i></span>
                      </div>
                      <input type="file" class="form-control" accept="application/pdf" name="orden_pdf" id="" placeholder="Orden del dia" required>
                    </div>
                  </div>
                </div>

                <div class="tab-pane fade" id="custom-tabs-two-profile" role="tabpanel" aria-labelledby="custom-tabs-two-profile-tab">
                  <div id="form_det" defer>
                    <div class="" id="groupform0"defer>
                      <div class="row g-2" >
                        <div class="col-2">
                          <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text">No.</span>
                            </div>
                            <input type="number" class="form-control" placeholder="Punto" name="no_dictamen0" id="no_inventario" aria-describedby="dictamenHelp" required>
                          </div>  
                        </div>
                        <div class="col-10">
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="nav-icon fas fa-copy"></i></span>
                            </div>
                            <select name="tipo0" id=""  class="form-control" required>
                              <option value="">Seleccionar tipo...</option>
                              <option value="1">Votacion</option>
                              <option value="2">Participacion</option>
                            </select>
                            <input type="text" class="form-control" name="titulo0" id="" placeholder="Titulo." required>
                            <input style="width: 30%;" type="text" class="form-control" name="descripcion0" id="" placeholder="Descripción del punto a votar." required>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <br>
                  <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                    <a href="javascript:deleteInput()" class="btn btn-danger m-2" id="btn_deleteinput"><i class="fas fa-minus"></i></a>
                    <a href=""></a>
                    <a href="javascript:newInput()" class="btn btn-primary m-2"> <i class="fas fa-plus"></i></a>
                  </div>
                  <div class="form-group" style="display: none;">
                    <input type="hidden" id="idcount" name="count" required  readonly onmousedown="return false;" >
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success">Guardar</button>
                  </div>
                </div>

              </div>

            </form>
          </div>
          <!-- /.card -->
        </div>
      </div>     
    </div>
  </div>
</section>




@endsection

@section ('js')
<script>

  var c=0;
  function newInput()
  {
    c+=1;
    document.getElementById("form_det").insertAdjacentHTML('beforeend',' <div class="" id="div_'+c+'"defer><div class="row g-2" ><div class="col-2"><div class="input-group mb-3"><div class="input-group-prepend"><span class="input-group-text">No.</span></div><input type="number" class="form-control" placeholder="Punto" name="no_dictamen'+c+'" id="" aria-describedby="dictamenHelp" required></div>  </div><div class="col-9"><div class="input-group"><div class="input-group-prepend"><span class="input-group-text"><i class="nav-icon fas fa-copy"></i></span></div><select name="tipo'+c+'" id=""  class="form-control" required><option value="">Seleccionar tipo...</option><option value="1">Votacion</option><option value="2">Participacion</option></select><input  type="text" class="form-control" name="titulo' + c + '" id="" placeholder="Titulo." required><input style="width: 30%;" type="text" class="form-control" name="descripcion'+c+'" id="" placeholder="Descripción del dictamen." required></div></div></div></div>');

    $("#idcount").val(c);
    $("#btn_deleteinput").show();

  }

  function deleteInput()
  {
    if (c != 0) {
      
      div = "#div_" + c;
      br = "#br_" + c;
      console.log(div);
      $(div).remove();
      $(br).remove();
      c = c - 1;
      $("#idcount").val(c);
    }
    if(c == 0){
      $("#btn_deleteinput").hide();
    }
  }
  function llenar_inventario(opcion){
    var codigo = $('#select_partida option:selected').attr('data-codigo');
    var subclase = $('#select_subclase option:selected').attr('value');
    var subclasif = $('#select_subclasif option:selected').attr('data-clave');
    var id = $('#select_partida option:selected').attr('value');
    var invent = codigo.slice(1) + subclase + subclasif;
    var count = 0;
    var numinvent = 0;
    var ceros = '000';

    
    parseInt(numinvent)
    numinvent = parseInt(numinvent) + 1;

    if (numinvent >= 1000) {
      ceros = '';
    } else if(numinvent >= 100){
      ceros = '0';
    }else if(numinvent >= 10){
      ceros = '00';
    }
    console.log('ceros:' + ceros);
    console.log('numero nuevo:'+invent);
    console.log('ultimo numero :'+ numinvent);
    console.log('cantidad ' + count);
    
    

    $('#no_inventario').val(codigo + subclase + subclasif + ceros + numinvent);
    //document.getElementById("select_subclasif").insertAdjacentHTML('beforeend',' <option selected="selected">Seleccionar...</option>');

  }
</script>

<script>

$(function () {
    $("#tablebien").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false, "paging": false,
      "buttons": ["copy", "excel", "pdf", "print"]
    }).buttons().container().appendTo('#tablebien_wrapper .col-md-6:eq(0)');
    $('#tablebien2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });

  var Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000
  });

  @if($message = Session::get('success'))
    Toast.fire({
      icon: 'success',
      title: '{{$message}}'
    });
  @endif

  @if($message = Session::get('error'))
    Toast.fire({
      icon: 'error',
      title: '{{$message}}'
    });
  @endif


</script>

@endsection