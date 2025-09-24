<div>
    <input wire:model="search" type="text" placeholder="Buscar.." class="form-control">
    <br>
    <table id="" class="table m-0 border  text-muted">
        <thead>
            <tr>
                <th style="width: 4%">#</th>
                <th style="width: 10%" class="text-center">DICTAMEN</th>
                <th>TITULO</th>
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
                                    btn-info
                                @endif
                                @if ($sesion_det->status == 'N')
                                    btn-danger
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
                            <button type="button" class="btn btn-info" data-toggle="dropdown">
                                <i class="fas fa-align-center"></i>
                            </button>
                            <div class="dropdown-menu" role="menu">
                                @if ($sesion_det->status == 'A')
                                <form method="post" action="{{ route('sesiones.detdestroy', $sesion_det->id) }}" class="form_cancelar">
                                    @method('delete')
                                    @csrf
                                    <button class="dropdown-item">Eliminar</button>
                                </form>
                                @endif
                                <form method="post" action="{{ route('Reporte.votaciones', $sesion_det->id) }}" class="" target="_blank">
                                    @method('post')
                                    @csrf
                                    <button class="dropdown-item">Reporte PDF</button>
                                </form>
                                <form method="post" action="{{route ('Votaciones.showvota', $sesion_det->id)}}" class="" target="_blank">
                                    @method('post')
                                    @csrf
                                    <button class="dropdown-item">Total de votos</button>
                                </form>
                                    <form method="post" action="{{route ('Votaciones.showvotaeco', $sesion_det->id)}}" class="" target="_blank">
                                    @method('post')
                                    @csrf
                                    <button class="dropdown-item">Votos por diputado</button>
                                </form>
                            </div>
                        </div>
                    </td>
                </tr>  
            @endforeach
        </tbody>
    </table>
 
</div>
