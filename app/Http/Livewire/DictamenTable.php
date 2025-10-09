<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\SesionDet;
use App\Models\Asistencias;

class DictamenTable extends Component
{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search = '';
    public $id_sesion;

    public $id_dictamen = null;
    public $faltantes = [];

    public function verFaltantes($id)
    {
        $this->id_dictamen = $id;
        $this->faltantes;
        $this->faltantes = Asistencias::where('id_sesion', $this->id_sesion)
            ->whereNotIn('id_user', function ($query) use ($id) {
                $query->select('id_user')
                      ->from('votaciones')
                      ->where('id_dictamen', $id);
            })
            //->with('usuario') // trae relación con usuario
            ->get();
            //dd($this->faltantes);
        // Emitir evento JS para abrir el modal
        //$this->dispatchBrowserEvent('abrir-modal-faltantes');
    }

    public function refrescarFaltantes()
    {
        if ($this->id_dictamen) {
            $this->faltantes = Asistencias::where('id_sesion', $this->id_sesion)
                ->whereNotIn('id_user', function ($query) {
                    $query->select('id_user')
                        ->from('votaciones')
                        ->where('id_dictamen', $this->id_dictamen);
                })
                //->with('usuario')
                ->get();
        }
    }

    public function render()
    {
        return view('livewire.dictamen-table',['faltas' =>  $this->faltantes ,'sesion_dets' => SesionDet::where('id_sesion','=',$this->id_sesion)->where(function ($query){
            $query->where('no_dictamen', 'LIKE', "%{$this->search}%")
            ->orWhere('descripcion', 'LIKE', "%{$this->search}%");
        })
        ->withCount('votaciones as votos')
        ->orderBy('id', 'ASC')
        ->get()
            
        ]);
        
    }
}
