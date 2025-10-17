<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Asunto;

class AsuntoTable extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search = '';
    public function render()
    {
        return view('livewire.asunto-table',['asuntos' => Asunto::where('descripcion', 'LIKE', "%{$this->search}%")
        ->orderBy('id', 'desc')
        ->paginate(15)]
        );
    }
}
