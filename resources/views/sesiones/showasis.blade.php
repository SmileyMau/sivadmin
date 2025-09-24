@extends('admin')
@section ('content')

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Ver asistencia</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{route('sesiones.index')}}">Lista de Asistencias</a></li>
          <li class="breadcrumb-item active">Ver asistencia</li>
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
            <form method="post" action="{{route('Asistencia.Asistencias2',$sesion->id)}}" class="" target="_blank">
              @method('post')
              @csrf
              <button class="btn btn-sm btn-primary float-right m-1">Ver Asistencias</button>
            </form>
            <form method="post" action="{{route('Reporte.asistencias', $sesion->id)}}" class="" target="_blank">
              @method('post')
              @csrf
              <button class="btn btn-sm btn-primary float-right m-1">Ver Asistencias PDF</button>
            </form>
          </div>
        </div>

        <div class="">
                    
          <hr>
          <h4 class="text-center">Información del las Asistencias</h4>
          <hr>
          <div class=" overflow-hidden ">
            <div class=" m-1">
              <table id="" class="table m-0 border  text-muted">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>DIPUTADO</th>
                        <th class="text-center ">ESTATUS</th>
                        <th class="text-center">OPCIONES</th>
                    </tr>
                </thead>
                    
                <tbody>
                  @foreach($asistencias as $asistencia) 
                    <tr class="fs-5">           
                      <td><b><i>{{$asistencia->id}}</i></b></td>
                      <td><b><i>{{$asistencia->name}} {{$asistencia->appaterno}} {{$asistencia->apmaterno}}</i></b></td>
                      <td  class="text-center ">
                        <b><i>{{$asistencia->asistencia}}</i></b>
                      </td>
                      <td  class="text-center">
                        <div class="dropdown"> 
                          <button type="button" class="btn btn-info" data-toggle="dropdown">
                            <i class="fas fa-align-center"></i>
                          </button>
                          <!--<div class="dropdown-menu" role="menu">
                            <a class="dropdown-item" href="{{ route('sesiones.edit', $asistencia->id) }}">Editar</a>
                            <a class="dropdown-item" href="{{ route('sesiones.show', $asistencia->id) }}">Ver</a>
                            <form method="post" action="{{ route('sesiones.asistencia', $asistencia->id) }}" class="">
                              @method('post')
                              @csrf
                              <button class="dropdown-item">Asistencias</button>
                            </form>
                            <form method="post" action="{{ route('sesiones.destroy', $asistencia->id) }}" class="form_cancelar">
                              @method('delete')
                              @csrf
                              <button class="dropdown-item">Eliminar</button>
                            </form>
                          </div>-->
                        </div>
                      </td>
                    </tr>  
                  @endforeach
                </tbody>
            </table>
         
            </div>
            <hr>
          </div>
        </div>
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
    document.getElementById("form_det").insertAdjacentHTML('beforeend',' <div class="" id="div_'+c+'"defer><div class="row g-2" ><div class="col-3"><div class="input-group mb-3"><div class="input-group-prepend"><span class="input-group-text">No.</span></div><input type="number" class="form-control" placeholder="Dictamen" name="no_dictamen'+c+'" id="" aria-describedby="dictamenHelp" required></div>  </div><div class="col-9"><div class="input-group"><div class="input-group-prepend"><span class="input-group-text"><i class="nav-icon fas fa-copy"></i></span></div><input type="text" class="form-control" name="descripcion'+c+'" id="" placeholder="Descripción del dictamen." required></div></div></div></div>');

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