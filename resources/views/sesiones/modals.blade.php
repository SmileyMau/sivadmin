<!-- Modal dictamen-->
<div class="modal fade card-primary" id="dictamenModal" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="">Añadir Dictamen</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="card-body">
            <form method="post" action="{{route('sesiones.detstore',$sesion->id)}}" enctype="multipart/form-data">
                @method('post')
                @csrf

                <div id="form_det" defer>
                    <div class="" id="groupform0"defer>
                        <div class="row g-2 mb-2" >
                            <div class="col-12 ">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="nav-icon fas fa-copy"></i></span>
                                    </div>
                                    <select name="tipo0" id="select_tipo_voto0" data-count="0"  class="form-control" required onchange="mostrar_imputs(this)">
                                        <option value="0" data-tipo="0">Seleccionar tipo...</option>
                                        @foreach ($tipo_asuntos as $tipo_asunto)
                                            <option value="{{$tipo_asunto->id}}" data-tipo="{{$tipo_asunto->id}}">{{$tipo_asunto->descripcion}}</option>
                                        @endforeach
                                    </select>
                                    <select name="asunto0" id="select_asunto0"  class="form-control" hidden >
                                        <option value="">Seleccionar asunto...</option>
                                    </select>
                                    <input type="text" class="form-control " hidden name="titulo0" id="titulo0" placeholder="Titulo." >
                                    <input style="width: 30%;" type="text" hidden class="form-control" name="descripcion0" id="descripcion0" placeholder="Descripción del punto a votar." >
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
    </div>
</div>

<!-- Modal de suber acta de lasesion -->
<div class="modal fade card-primary" id="archivoModal" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="">Añadir acta de la sesiòn anterior</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="card-body">
                <form method="post" action="{{route('sesiones.store_archivo',$sesion->id)}}" enctype="multipart/form-data">
                    @method('post')
                    @csrf
                    <div class="mt-3">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><b>Archivo</b></span>
                            </div>
                            <input type="file" class="form-control" accept="application/pdf" name="archivo" id="" placeholder="Orden del dia" required>
                        </div>
                    </div>
                    <div class="form-group" style="display: none;">
                        <input type="hidden" id="input_tipo_archivo" name="tipo_archivo" required  readonly onmousedown="return false;"  value="ACTA">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-success">Guardar</button>

                    </div>
                </form>
            </div>
        </div>     
    </div>
</div>

<script>

  var c=0;
  function newInput()
  {
    c+=1;
    document.getElementById("form_det").insertAdjacentHTML('beforeend',' <div class="" id="div_'+c+'"defer><div class="row g-2 mb-2" ><div class="col-12"><div class="input-group"><div class="input-group-prepend"><span class="input-group-text"><i class="nav-icon fas fa-copy"></i></span></div><select name="tipo'+c+'" id="select_tipo_voto'+c+'" data-count="'+c+'"  class="form-control" required onchange="mostrar_imputs(this)"><option value="0" data-tipo="0">Seleccionar tipo...</option>@foreach ($tipo_asuntos as $tipo_asunto)<option value="{{$tipo_asunto->id}}" data-tipo="{{$tipo_asunto->id}}">{{$tipo_asunto->descripcion}}</option>@endforeach</select><select name="asunto'+c+'" id="select_asunto' + c + '"  class="form-control" hidden ><option value="">Seleccionar asunto...</option></select><input hidden type="text" class="form-control" name="titulo' + c + '" id="titulo'+c+'" placeholder="Titulo."  ><input hidden style="width: 30%;" type="text" class="form-control" name="descripcion'+c+'" id="descripcion'+c+'" placeholder="Descripción del dictamen." ></div></div></div></div>');

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

  function tipo_archivo(option) {
    var data_tipo = $('#' + option.id).attr('data-tipo_archivo');
    console.log(data_tipo);
    $('#input_tipo_archivo').val(data_tipo);
    

  }

  function mostrar_imputs(option){
    var tipo = $('#' + option.id + ' option:selected').attr('data-tipo');
    var count = $('#'+option.id).attr('data-count');
    console.log('select_asunto' + count);
    if (tipo == 5 || tipo == 7 || tipo == 8 || tipo == 9) {
      $('#titulo' + count).removeAttr('hidden');
      $('#descripcion' + count).removeAttr('hidden');
      $('#select_asunto' + count).attr('hidden',true);
    }else{
      var id = $('#select_partida option:selected').attr('value');
      $('#select_asunto' + count).empty();
      
      //console.log(id);
      document.getElementById('select_asunto' + count).insertAdjacentHTML('beforeend',' <option selected="selected">Seleccionar asunto...</option>');
      
      @foreach($asuntos as $asunto)
        if ({{$asunto->id_tipo}} == tipo) {
          document.getElementById('select_asunto' + count).insertAdjacentHTML('beforeend','  <option value="{{$asunto->id}}" >'+'{{$asunto->titulo}}'+'</option>');
        }
      @endforeach

      $('#titulo' + count).attr('hidden',true);
      $('#descripcion' + count).attr('hidden',true);
      $('#select_asunto' + count).removeAttr('hidden');

    }
  }



</script>