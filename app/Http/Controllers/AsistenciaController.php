<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Asistencia;
use App\Models\Sesiones;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use PDF;

class AsistenciaController extends Controller
{
   

    public function show_asis()
    {
        try {
            $fecha = Carbon::now();
            $fecha = $fecha->format('Y-m-d');
            $asistencias = DB::table('asistencias')
            ->select('users.name','users.last_name','users.id_partido','partidos.partido','partidos.img','asistencias.fecha','asistencias.asistencia')
            ->join('users','users.id','=', 'asistencias.id_user')
            ->join('partidos','partidos.id','=','users.id_partido')
            ->where('asistencias.fecha','=',$fecha)
            ->orderBy('asistencias.id', 'desc')->get();
            //dd($asistencias);

            return view('User.ServiciosLegislativos.Asistencias.showasis', compact('asistencias'));
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function show_asis2($id)
    {
        try {
            Carbon::setLocale('es');
            $sesion = Sesiones::find($id);

            $fecha = Carbon::now()->locale('es');
            $date =  $fecha ;
            $fecha = $fecha->format('Y-m-d');
            $asistencias = DB::table('asistencias')
            ->select('users.name','users.img','users.appaterno','users.apmaterno','users.id_partido','asistencias.fecha','asistencias.asistencia','asistencias.id')
            ->join('users','users.id','=', 'asistencias.id_user')
            ->where('asistencias.id_sesion','=',$id)
            ->orderBy('asistencias.id', 'desc')->get();
            //dd($asistencias);
            $total = $asistencias->count();
            $date =  " " . $date->formatLocalized('%d') . " de " . ucfirst($date->formatLocalized('%B') . " del " . $date->formatLocalized('%Y'));
            //$mes = $date->formatLocalized('%B');
            //$date = ucfirst($date->formatLocalized('%d'));

            return view('asistencias.showasis2', compact('asistencias','total','date','sesion'));
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function report($id)
    {
        try {
            $sesion = Sesiones::find($id);
            $fecha = Carbon::now();
            $fecha = $fecha->format('Y-m-d');
            $asistencias = DB::table('asistencias')
            ->select('users.name','users.appaterno','users.apmaterno','asistencias.fecha','asistencias.asistencia','asistencias.id','asistencias.hora','sesiones.descripcion')
            ->join('users','users.id','=', 'asistencias.id_user')
            ->join('sesiones','sesiones.id','=', 'asistencias.id_sesion')
            ->where('sesiones.id','=',$id)
            ->orderBy('asistencias.id', 'desc')->get();
            //dd($fecha);
            $total = $asistencias->count();
            $pdf = PDF::loadView('reportes.asistencia', compact('asistencias','total','fecha','sesion'));
            return $pdf->stream();
        } catch (\Throwable $th) {
            throw $th;
        }

    }

    function index()
    {
        try {
            $asistencias = Asistencia::paginate(10);
            return view();
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function total_asis()
    {
        try {
            Carbon::setLocale('es');
            $sesion = Sesiones::where('status','=','A')->first();

            $fecha = Carbon::now()->locale('es');
            $date =  $fecha ;
            $fecha = $fecha->format('Y-m-d');
            $asistencias = DB::table('asistencias')
            ->select('users.name','users.img','users.appaterno','users.apmaterno','users.id_partido','asistencias.fecha','asistencias.asistencia','asistencias.id')
            ->join('users','users.id','=', 'asistencias.id_user')
            ->where('asistencias.id_sesion','=',$sesion->id)
            ->orderBy('asistencias.id', 'desc')->get();
            //dd($asistencias);
            $total = $asistencias->count();
            $date =  " " . $date->formatLocalized('%d') . " de " . ucfirst($date->formatLocalized('%B') . " del " . $date->formatLocalized('%Y'));
            //$mes = $date->formatLocalized('%B');
            //$date = ucfirst($date->formatLocalized('%d'));

            return view('asistencias.totalasis', compact('asistencias','total','date','sesion'));
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    
}
