<div>
    <input wire:model="search" type="text" placeholder="Buscar.." class="form-control">
    <br>
    <table id="" class="table m-0 border  text-muted">
        <thead>
            <tr>
                <th style="width: 4%">#</th>
                <th style="width: 10%" class="text-center">DICTAMEN</th>
                <th>TITULO</th>
                <th>DESCRIPCION</th>
                <th style="width: 4%">VOTOS</th>
                <th style="width: 4%">ESTATUS</th>
                <th style="width: 4%" class="text-center">OPCIONES</th>
            </tr>
        </thead>
            
        <tbody>
            @foreach($sesion_dets as $sesion_det) 
                <tr class="fs-5">           
                    <td><b><i>{{$sesion_det->id}}</i></b></td>
                    <td class="text-center"><b><i>{{$sesion_det->no_dictamen}}</i></b></td>
                    <td ><b><i>{{$sesion_det->titulo}}</i></b></td>
                    <td ><b><i>{{$sesion_det->descripcion}}</i></b></td>
                    <td class="text-center"><b><i>{{$sesion_det->votos}}</i></b></td>

                    <td  class="text-center ">
                        <form method="post" action="{{route ('sesiones.ac', $sesion_det->id)}}" class=" 
                            @if ($sesion_det->status == 'A')
                                form_cerrar
                            @endif
                            @if ($sesion_det->status == 'N')
                                form_activar
                            @endif ">

                            @method('patch')
                            @csrf

                            <button type="submit" class="btn 
                                @if ($sesion_det->status == 'A')
                                    btn-reasig
                                @endif
                                @if ($sesion_det->status == 'N')
                                    btn-off
                                @endif ">
                                <i>
                                    @if ($sesion_det->status == 'A')
                                    ACTIVA
                                    @endif
                                    @if ($sesion_det->status == 'N')
                                        CERRADA
                                    @endif
                                </i>
                            </button>
                        </form>
                    </td>
                    <td  class="text-center">
                        <div class="dropstart " style="z-idex: 999;"> 
                            <button type="button" class="btn btn-option" data-toggle="dropdown">
                                <i class="fas fa-align-center"></i>
                            </button>
                            <div class="dropdown-menu p-2" role="menu">
                                <a class="btn-report mb-1" href="" type="button" data-toggle="modal" data-target="#faltanteModal"  wire:click="verFaltantes({{ $sesion_det->id }})">Faltantes</a>
                               
                                <form method="post" action="{{ route('Reporte.votaciones', $sesion_det->id) }}" class="" target="_blank">
                                    @method('post')
                                    @csrf
                                    <button class="dropdown-item btn-ver mb-1">Reporte PDF</button>
                                </form>
                                <form method="post" action="{{route ('Votaciones.showvota', $sesion_det->id)}}" class="" target="_blank">
                                    @method('post')
                                    @csrf
                                    <button class="dropdown-item btn-ver mb-1">Total de votos</button>
                                </form>
                                    <form method="post" action="{{route ('Votaciones.showvotaeco', $sesion_det->id)}}" class="" target="_blank">
                                    @method('post')
                                    @csrf
                                    <button class="dropdown-item btn-ver mb-1">Votos por diputado</button>
                                </form>
                                @if ($sesion_det->status == 'A')
                                    <form method="post" action="{{ route('sesiones.detdestroy', $sesion_det->id) }}" class="form_cancelar">
                                        @method('delete')
                                        @csrf
                                        <button class="dropdown-item btn-eliminar mb-1">Eliminar</button>
                                    </form>
                                @endif
                                @if ($sesion_det->tipo == '2')
                                    <form method="post" action="{{ route('sesiones.report_part', $sesion_det->id) }}" class="">
                                        @method('post')
                                        @csrf
                                        <button class="dropdown-item btn-report mb-1">Reporte de participacion</button>
                                    </form>
                                @endif
                            </div>
                        </div>
                    </td>
                </tr>  
            @endforeach
        </tbody>
    </table>


 <div class="modal fade" id="faltanteModal" tabindex="-1" aria-labelledby="faltanteModalLabel" aria-hidden="true"  wire:ignore.self>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Diputados que faltan por votar</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
               
                <div class="modal-body">
                    @if($faltantes === null)
                        <p>Cargando...</p>
                    @else
                        @foreach($faltantes as $faltante)
                            <li class="list-group-item">
                                <b>{{$faltante->usuario->name}} </b>{{  $faltante->usuario->appaterno . ' ' . $faltante->usuario->apmaterno }}
                            </li>
                        @endforeach
                    @endif

                </div>
                <div class="text-center ">
                    <button wire:click="refrescarFaltantes" class="btn  btn-reasig">
                        <span wire:loading.remove wire:target="refrescarFaltantes">Refrescar</span>
                        <span wire:loading wire:target="refrescarFaltantes">Cargando...</span>
                    </button>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

</div>

        
    <!-- Modal -->
    