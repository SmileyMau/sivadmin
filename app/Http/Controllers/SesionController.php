<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sesiones;
use App\Models\SesionDet;
use App\Models\Asistencias;
use App\Models\Tipo;
use App\Models\Votaciones;
use Illuminate\Support\Facades\DB;
use Storage;
use Carbon\Carbon;



class SesionController extends Controller
{
    /**
     * Muesta la pantalla principal de sesiones (sesiones.index)
     */
    public function index()
    {
        try {
            $sesiones = Sesiones::orderBy('id','DESC')->paginate(10);
            $tipos = Tipo::all();
            return view('sesiones.index', compact('sesiones','tipos'));
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     *
     */
    public function create()
    {
        //
    }

    /**
     * Crea una regsitro en la tabla s
     */
    public function store(Request $request)
    {
        try {
            //crea un nuevo regsitro en la tabal de sesiones
            $sesion = Sesiones::create([
                'id_tipo' => $request->id_tipo,
                'no_sesion' => $request->no_sesion,
                'descripcion' => $request->titulo,
                'fecha' => $request->fecha,
                'orden_pdf' => $request->file('orden_pdf')->store('public/Ordenes'),
                'fecha_ini' => null,
                'fecha_fin' => null,
                'asistencia' => 'C',
                'status' => 'A',
            ]);

            //crea un nuevo regsitro en la tabal de sesiones_dets segun la catidad de dictamenes agregados
            for ($i=0; $i <= $request->count ; $i++) {
                $no_dictamen = 'no_dictamen'. $i;
                $no_dictamen = $request->$no_dictamen;

                $descripcion = 'descripcion'. $i;
                $descripcion = $request->$descripcion;

                $titulo = 'titulo'. $i;
                $titulo = $request->$titulo;

                $sesion_det = SesionDet::create([
                    'id_sesion' => $sesion->id,
                    'no_dictamen' => $no_dictamen,
                    'titulo' => $titulo,
                    'descripcion' => $descripcion,
                    'total' => 0,
                    'status' => 'N',
                ]);    
            }
            return back()->with('success','La sesión se agregó exitosamente');

        } catch (\Throwable $th) {
            throw $th;
        }
    }


    public function detstore(Request $request, $id)
    {
        try {

            //crea un nuevo regsitro en la tabal de sesiones_dets segun la catidad de dictamenes agregados
            for ($i=0; $i <= $request->count ; $i++) {
                $no_dictamen = 'no_dictamen'. $i;
                $no_dictamen = $request->$no_dictamen;

                $descripcion = 'descripcion'. $i;
                $descripcion = $request->$descripcion;

                $titulo = 'titulo'. $i;
                $titulo = $request->$titulo;

                $sesion_det = SesionDet::create([
                    'id_sesion' => $id,
                    'no_dictamen' => $no_dictamen,
                    'titulo' => $titulo,
                    'descripcion' => $descripcion,
                    'total' => 0,
                    'status' => 'N',
                ]);    
            }
            return back()->with('success','La sesión se agregó exitosamente');

        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Muestra el contenido de la sesion, junto  con los dictamenes
     */
    public function show($id)
    {
        try {
            $sesion = Sesiones::find($id);
            //dd($sesion);
            $sesion_dets = SesionDet::where('id_sesion','=',$sesion->id)->orderBy('no_dictamen','ASC')->get();
            return view('sesiones.show', compact('sesion','sesion_dets'));
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function showdet($id)
    {
        try {
            $sesion_det = SesionDet::find($id);
            return view('sesiones.show', compact('sesion_det'));
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Abre un formulario con los fdatros de la sesion y los dictamenes
     */
    public function edit($id)
    {
        try {
            $edit = Sesiones::find($id);
            $sesion_dets = SesionDet::where('id_sesion','=',$edit->id)->orderBy('no_dictamen','ASC')->get();
            $tipos = Tipo::all();
            return view('sesiones.edit', compact('edit','sesion_dets','tipos'));
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function editdet($id)
    {
        try {
            $sesion_det = SesionDet::find($id);
            return view('sesiones.edit', compact('sesion_det'));
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
    *Update de la tabal sesiones
     */
    public function update(Request $request, $id)
    {
        try {
            $sesion = Sesiones::find($id);
            $sesion->id_tipo = $request->id_tipo;
            $sesion->no_sesion = $request->no_sesion;
            $sesion->descripcion = $request->titulo;
            $sesion->fecha = $request->fecha;
            $sesion->save();
            return back()->with('success','La sesión se modificó correctamente.');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    
    /**

     */
    public function updatedet(Request $request, $id)
    {
        try {
        $sesion_det = SesionDet::find($id);
        $sesion_det->no_dictamen = $request->no_dictamen;
        $sesion_det->descripcion = $request->descripcion;
        $sesion_det->save();
        return back()->with('success','El dictamen se modificó correctamente.');
    } catch (\Throwable $th) {
        throw $th;
    }
    }

    /**
     * 
     */
    public function destroy($id)
    {
        try {
            $sesion_det = SesionDet::where('id_sesion','=',$id)->where('status','=','A')->get();
            //dd($sesion_det);
            if ($sesion_det == null) {
                $sesion = Sesiones::destroy($id);
            }else{
                return back()->with('error','La sesión tiene dictámenes activos.');
            }
            return back()->with('success','La sesion se elimino correctamente.');
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function detdestroy($id)
    {
        try {
            $sesion_det = SesionDet::find($id);

            if ($sesion_det->status == 'N') {
                $votaciones = Votaciones::where('id_dictamen','=',$id)->first();
                //dd($votaciones);
                if ($votaciones == null) {
                    $sesion = SesionDet::destroy($id);
                    return back()->with('success','El dictamen se elimino corectamente.');
                }else{
                    return back()->with('error','El dictamen cuenta con votos.');   
                }
            }else{
                return back()->with('error','El dictamen se enctentra activo.');
            }
            return back()->with('success','La sesion se elimino correctamente.');
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function asistencia($id)
    {
        try {
            $asistencias = DB::table('asistencias')
            ->join('users','users.id','asistencias.id_user')
            ->select('users.name','users.apmaterno','users.appaterno','asistencias.*')
            ->where('asistencias.id_sesion','=',$id)
            ->get();

            $sesion = Sesiones::find($id);
            return view('sesiones.showasis', compact('asistencias','sesion'));
        } catch (\Throwable $th) {
            throw $th;
        }
    }


    
    public function ac($id)
    {
        try {
            $sesion_det = SesionDet::find($id);
            switch ($sesion_det->status) {
                case 'A':
                    $sesion_det->status = 'N';
                    $sesion_det->save();
                    break;
                case 'N':
                    $sesion_det->status = 'A';
                    $sesion_det->save();
                    break;
                default:
                    return back()->with('error','El estatus del dictamen es desconocido.');
                    break;
            }
            return back()->with('success','El dictamen se modificó correctamente.');
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function acsesion($id)
    {
        try {
            $sesion = Sesiones::find($id);
            $sesion_det = SesionDet::where('id_sesion','=',$id)->where('status','=','A')->first();
            if ($sesion_det == null) {
                switch ($sesion->status) {
                    case 'A':
                        $sesion->status = 'N';
                        $sesion->save();
                        break;
                    case 'N':
                        $sesion->status = 'A';
                        $sesion->save();
                        break;
                    default:
                        return back()->with('error','El estatus de la sesion es desconocido.');
                        break;
                }
            }else{
                return back()->with('error','La sesion cuenta con dictamenes activos.');
            }
            
            return back()->with('success','La sesion se modificó correctamente.');
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function descargar($id)
    {
        try {
            $sesion = Sesiones::find($id);
            $filePath = storage_path("app/".$sesion->orden_pdf);
            ///dd(url('storage/'.substr($sesion->orden_pdf,7)));
            //return Storage::disk('public')->download($filePath);
            return response()->download($filePath);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function on_asist($id)
    {
        try {
            $sesion = Sesiones::find($id);
            $sesion->asistencia = 'A';
            $sesion->hora_ini = Carbon::now()->toTimeString();
            $sesion->save();
            return back()->with('success','Se activó las asistencias para la sesión.');

        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function off_asist($id)
    {
        try {
            $sesion = Sesiones::find($id);
            $sesion->asistencia = 'N';
            $sesion->hora_fin = Carbon::now()->toTimeString();
            $sesion->save();
            return back()->with('success','Se activó el retardo para la sesión.');

        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function close_asist($id)
    {
        try {
            $sesion = Sesiones::find($id);
            $sesion->asistencia = 'C';
            $sesion->hora_fin = Carbon::now()->toTimeString();
            $sesion->save();
            return back()->with('success','Se cerró la asistencia para la sesión.');

        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
