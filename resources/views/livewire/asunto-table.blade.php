<div>
    <input wire:model="search" type="text" placeholder="Buscar.." class="form-control">
    <br>
    <table id="" class="table m-0 border  text-muted">
        <thead>
            <tr>
                <th>#</th>
                <th class="w-10" >FECHA</th>
                <th>ASUNTO</th>
                <th class="text-center ">DESCRIPCION</th>
                <th class="text-center">OPCIONES</th>
            </tr>
        </thead>
            
        <tbody>
            @foreach($asuntos as $asunto) 
                <tr class="fs-5">           
                    <td><b><i>{{$asunto->id}}</i></b></td>
                    <td><b><i>{{$asunto->no_sesion}}</i></b></td>
                    <td><b><i>{{$asunto->descripcion}}</i></b></td>
                        <td  class="text-center">
                            <div class="dropdown"> 
                                <button type="button" class="btn btn-option" data-toggle="dropdown">
                                    <i class="fas fa-align-center"></i>
                                </button>
                                <div class="dropdown-menu p-2" role="menu">
                                    <a class="dropdown-item btn-ver mb-1" href="{{ route('asuntos.show', $asunto->id) }}">Ver</a>
                                    @if ($asunto->status == 'A')
                                        <a class="dropdown-item btn-editar mb-1" href="{{ route('asuntos.edit', $asunto->id) }}">Editar</a>
                                    @endif
                                    <form method="post" action="{{ route('asuntos.asistencia', $asunto->id) }}" class="">
                                        @method('post')
                                        @csrf
                                        <button class="dropdown-item btn-report mb-1">Asistencias</button>
                                    </form>
                                    <hr>
                                    @if ($asunto->status == 'A')
                                        <form method="post" action="{{ route('asuntos.destroy', $asunto->id) }}" class="form_cancelar">
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
 
    {{ $asuntos->links() }}
</div>
