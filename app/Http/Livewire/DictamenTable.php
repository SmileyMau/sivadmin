<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\SesionDet;

class DictamenTable extends Component
{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search = '';
    public $id_sesion;
    public function render()
    {
        return view('livewire.dictamen-table',['sesion_dets' => SesionDet::where('id_sesion','=',$this->id_sesion)->where(function ($query){
            $query->where('no_dictamen', 'LIKE', "%{$this->search}%")
            ->orWhere('descripcion', 'LIKE', "%{$this->search}%");
        })
        ->orderBy('id', 'ASC')
        ->get()
            
        ]);

    }
}
