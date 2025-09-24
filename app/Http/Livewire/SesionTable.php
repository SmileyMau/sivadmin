<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Sesiones;

class SesionTable extends Component
{


    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search = '';
    public function render()
    {
        //$bienes = bien::where('id_partida', '=', )->paginate(10);
        return view('livewire.sesion-table',['sesiones' => Sesiones::where('descripcion', 'LIKE', "%{$this->search}%")
        ->orWhere('no_sesion', 'LIKE', "%{$this->search}%")
        ->orderBy('id', 'desc')
        ->paginate(15)]
        );

        
    }
        
}
