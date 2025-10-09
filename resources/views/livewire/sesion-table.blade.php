<div>
    <input wire:model="search" type="text" placeholder="Buscar.." class="form-control">
    <br>
    <table id="" class="table m-0 border  text-muted">
        <thead>
            <tr>
                <th>#</th>
                <th class="w-10" >SESION</th>
                <th>DESCRIPCIÓN</th>
                <th class="text-center ">ESTATUS</th>
                <th class="text-center">OPCIONES</th>
            </tr>
        </thead>
            
        <tbody>
            @foreach($sesiones as $sesion) 
                <tr class="fs-5">           
                    <td><b><i>{{$sesion->id}}</i></b></td>
                    <td ><b><i>{{$sesion->no_sesion}}</i></b></td>
                    <td><b><i>{{$sesion->descripcion}}</i></b></td>
                    <td  class="text-center ">
                        <form method="post" action="{{route ('sesiones.acsesion', $sesion->id)}}" class=" 
                            @if ($sesion->status == 'A')
                                form_scerrar
                            @endif
                            @if ($sesion->status == 'N')
                                form_sactivar
                            @endif ">

                            @method('patch')
                            @csrf
                            <button type="submit" class="btn 
                                @if ($sesion->status == 'A')
                                    btn-reasig
                                @endif
                                @if ($sesion->status == 'N')
                                    btn-off
                                @endif ">
                                <i>
                                    @if ($sesion->status == 'A')
                                        ACTIVA
                                    @endif
                                    @if ($sesion->status == 'N')
                                        CERRADA
                                    @endif
                                </i>
                            </button>
                        </form>
                    </td>
                        <td  class="text-center">
                            <div class="dropdown"> 
                                <button type="button" class="btn btn-option" data-toggle="dropdown">
                                    <i class="fas fa-align-center"></i>
                                </button>
                                <div class="dropdown-menu p-2" role="menu">
                                    <a class="dropdown-item btn-ver mb-1" href="{{ route('sesiones.show', $sesion->id) }}">Ver</a>
                                    @if ($sesion->status == 'A')
                                        <a class="dropdown-item btn-editar mb-1" href="{{ route('sesiones.edit', $sesion->id) }}">Editar</a>
                                    @endif
                                    <form method="post" action="{{ route('sesiones.asistencia', $sesion->id) }}" class="">
                                        @method('post')
                                        @csrf
                                        <button class="dropdown-item btn-report mb-1">Asistencias</button>
                                    </form>
                                    <hr>
                                    @if ($sesion->status == 'A')
                                        <form method="post" action="{{ route('sesiones.destroy', $sesion->id) }}" class="form_cancelar">
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
 
    {{ $sesiones->links() }}
</div>
