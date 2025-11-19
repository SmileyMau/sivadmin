<div>
    <input wire:model="search" type="text" placeholder="Buscar.." class="form-control">
    <br>
    <table id="" class="table m-0 border  text-muted">
        <thead>
            <tr>
                <th>#</th>
                <th class="w-10" >FECHA</th>
                <th class="">NO. OFICIO</th>
                <th class="">ASUNTO</th>
                <th class="text-right">OPCIONES</th>
            </tr>
        </thead>
            
        <tbody>
            @foreach($asuntos as $asunto) 
                <tr class="fs-5">           
                    <td><b><i>{{$asunto->id}}</i></b></td>
                    <td><b><i>{{$asunto->fecha}}</i></b></td>
                    <td><b><i>{{$asunto->no_oficio}}</i></b></td>
                    <td><b><i>{{$asunto->descripcion}}</i></b></td>
                        <td  class="text-right">
                            <div class="dropdown"> 
                                <button type="button" class="btn btn-option" data-toggle="dropdown">
                                    <i class="fas fa-align-center"></i>
                                </button>
                                <div class="dropdown-menu p-2" role="menu">
                                    <a class="dropdown-item btn-ver mb-1" href="{{ route('Asuntos.show', $asunto->id) }}">Ver</a>
                                    @if ($asunto->status == 'A')
                                        <a class="dropdown-item btn-editar mb-1" href="{{ route('Asuntos.edit', $asunto->id) }}">Editar</a>
                                    @endif
                                    <hr>
                                    @if ($asunto->status == 'A')
                                        <form method="post" action="{{ route('Asuntos.destroy', $asunto->id) }}" class="form_cancelar">
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
