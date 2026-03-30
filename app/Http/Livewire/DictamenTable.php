<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\SesionDet;
use App\Models\Asistencias;
use App\Models\Votaciones;
use App\Models\VotoAsunto;
use App\Models\User;
use Illuminate\Support\Facades\DB;


class DictamenTable extends Component
{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search = '';
    public $id_sesion;

    public $id_dictamen = null;
    public $faltantes = [];

    public function verFaltantes($id,$tipo)
    {

        //dd($tipo);
        $this->id_dictamen = $id;
        $this->faltantes;
        if ($tipo == "general") {
            $this->faltantes = Asistencias::where('id_sesion', $this->id_sesion)
            ->whereNotIn('id_user', function ($query) use ($id) {
                $query->select('id_user')
                      ->from('votaciones')
                      ->where('id_dictamen', $id);
            })
            ->get();
        /*}elseif ($tipo == 'asistencia') {
            $this->faltantes = User::where('rol', 'D')
                ->where('status', 'A')
                ->whereDoesntHave('asistencias', function ($query) {
                    $query->where('id_sesion', $this->id_sesion);
                })
                ->get();*/
        } elseif ($tipo == 'asunto') {
            $this->faltantes = Asistencias::where('id_sesion', $this->id_sesion)
            ->whereNotIn('id_user', function ($query) use ($id) {
                $query->select('id_user')
                      ->from('voto_asuntos')
                      ->where('id_sesion_asunto', $id);
            })
            ->get();
        
        }
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
        $sesion_asuntos = DB::table('sesion_asuntos')
            ->join('asuntos','asuntos.id','sesion_asuntos.id_asunto')
            ->select(
                'sesion_asuntos.id',
                'sesion_asuntos.id_sesion',
                DB::raw("'' as no_dictamen"),
                'asuntos.titulo',
                'asuntos.descripcion',
                'sesion_asuntos.status',
                DB::raw('sesion_asuntos.orden as orden_final'),
                DB::raw("'asunto' as tipo_registro")
                )
            ->where('sesion_asuntos.id_sesion','=',$this->id_sesion);
            $sesion_dets = DB::table('sesion_dets')
            ->select(
                'id',
                'id_sesion',
                'no_dictamen',
                'titulo',
                'descripcion',
                'status',
                DB::raw('CAST(no_dictamen AS UNSIGNED) as orden_final'),
                DB::raw("'general' as tipo_registro")
                )
            ->where('id_sesion','=',$this->id_sesion)
            ->union($sesion_asuntos)
            ->orderBy('orden_final','ASC')
            ->get();
            //dd($sesion_dets);
            $idsGeneral = $sesion_dets->where('tipo_registro', 'general')->pluck('id');
            $idsAsuntos = $sesion_dets->where('tipo_registro', 'asunto')->pluck('id');

            // Obtenemos los votos agrupados
            $votosGeneral = Votaciones::whereIn('id_dictamen', $idsGeneral)->get()->groupBy('id_dictamen');
            $votosAsunto = VotoAsunto::whereIn('id_sesion_asunto', $idsAsuntos)->get()->groupBy('id_sesion_asunto');

            $sesion_dets->map(function ($item) use ($votosGeneral, $votosAsunto) {
                if ($item->tipo_registro == 'general') {
                    // Asignamos la colección de votos directamente a una propiedad 'votaciones'
                    $item->votaciones = $votosGeneral->get($item->id, collect());
                } else {
                    // Lo mismo para los asuntos
                    $item->votaciones = $votosAsunto->get($item->id, collect()); 
                }
                return $item;
            });

            
        return view('livewire.dictamen-table',['faltas' =>  $this->faltantes ,'sesion_dets' => $sesion_dets
            
        ]);
        
    }
}
