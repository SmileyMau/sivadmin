@extends('admin')
@section ('content')

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
       
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{route('sesiones.index')}}">Lista de Sesiones</a></li>
          <li class="breadcrumb-item active">Ver Sesion</li>
        </ol>
      </div> 
    </div>
  </div>
</section>

<div class="m-3">
  <div class="">
    <div class="card-body text-muted">
      <div class="card card-outline card-celsh">
        <div class="card-header">
          <h1 class="card-title"></h1>
          <div class="form-group">
            <button type="button" class="btn btn-reasig float-right m-1 " data-toggle="modal" data-target="#añadirModal">
              Añadir
            </button>
            @if ($sesion->asistencia == 'N'|| $sesion->asistencia == 'C')
              <form method="post" action="{{route('sesiones.onasist', $sesion->id)}}" class="" >
                @method('post')
                @csrf
                <button class="btn btn-on float-right m-1">Activar asistencia</button>
              </form>
            @endif
            @if ($sesion->asistencia == 'A')
              <form method="post" action="{{route('sesiones.offasist', $sesion->id)}}" class="" >
                @method('post')
                @csrf
                <button class="btn btn-ret float-right m-1">Activar retardo</button>
              </form>
            @endif
            @if ($sesion->asistencia == 'A'|| $sesion->asistencia == 'N')
              <form method="post" action="{{route('sesiones.closeasist', $sesion->id)}}" class="" >
                @method('post')
                @csrf
                <button class="btn btn-off float-right m-1">Cerra asistencia</button>
              </form>
            @endif

          </div>
        </div>

        <div class="">
          <br>
          <h4 class="text-center">Información de la Sesion</h4>
          <hr>
          <div class=" overflow-hidden ">
            <div class="row gy-5 " style="font-size: 20px">
              <div class="col-6 ">
                <div class="p-3 " ><p class=""><b>Sesion:</b> {{$sesion->no_sesion}} - {{$sesion->descripcion}}</p></div>
              </div>
              <div class="col-6">
                <div class="p-3  "><b>Fecha:</b> {{$sesion->fecha}}</div>
              </div>
              <div class="col-6">
                <div class="p-3  ">
                  <b>Orden del dia:</b> 
                  <a  class="btn btn-danger" href="{{url('storage/'.substr($sesion->orden_pdf,7))}}" target="_blank">PDF</a> 
                  <a  class="btn btn-danger" href="{{route('sesiones.descargar',$sesion->id)}}" target="_blank">Descargar</a>
                </div>
              </div>
            </div>
          </div>
                    
          <hr>
          <h4 class="text-center">Información del los Dictamenes</h4>
          <hr>
          <div class=" overflow-hidden ">
            <div class=" m-1">
              @livewire('dictamen-table', ['id_sesion' => $sesion->id])
            </div>
            <hr>
          </div>
        </div>
      </div>
      <div class="card img-fluid" style="width: 100rem; border-radius: 6px;">
        <iframe src="{{url('storage/'.substr($sesion->orden_pdf,7))}}" frameborder="0" style="height: 45rem; border-radius: 6px;"></iframe>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="añadirModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
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

            </ul>
          </div>
          <div class="card-body">
            <form method="post" action="{{route('sesiones.detstore',$sesion->id)}}" enctype="multipart/form-data">
              @method('post')
              @csrf
                <div id="form_det" defer>
                  <div class="" id="groupform0"defer>
                    <div class="row g-2" >
                      <div class="col-3">
                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text">No.</span>
                          </div>
                          <input type="number" class="form-control" placeholder="Dictamen" name="no_dictamen0" id="no_inventario" aria-describedby="dictamenHelp" required>
                        </div>  
                      </div>
                      <div class="col-9">
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="nav-icon fas fa-copy"></i></span>
                          </div>
                          <input type="text" class="form-control" name="titulo0" id="" placeholder="Titulo." required>
                          <input type="text" class="form-control" name="descripcion0" id="" placeholder="Descripción del dictamen." required>
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
            </form>
          </div>
          <!-- /.card -->
        </div>
      </div>     
    </div>
  </div>

@endsection


@section ('js')
<script>

  var c=0;
  function newInput()
  {
    c+=1;
    document.getElementById("form_det").insertAdjacentHTML('beforeend',' <div class="" id="div_'+c+'"defer><div class="row g-2" ><div class="col-3"><div class="input-group mb-3"><div class="input-group-prepend"><span class="input-group-text">No.</span></div><input type="number" class="form-control" placeholder="Dictamen" name="no_dictamen'+c+'" id="" aria-describedby="dictamenHelp" required></div>  </div><div class="col-9"><div class="input-group"><div class="input-group-prepend"><span class="input-group-text"><i class="nav-icon fas fa-copy"></i></span></div><input  type="text" class="form-control" name="titulo' + c + '" id="" placeholder="Titulo." required><input type="text" class="form-control" name="descripcion'+c+'" id="" placeholder="Descripción del dictamen." required></div></div></div></div>');

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
@endsection