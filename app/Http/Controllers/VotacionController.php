<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Votaciones;
use App\Models\SesionDet;
use App\Models\Sesiones;
use App\Models\Asistencias;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use PDF;

class VotacionController extends Controller
{
    
    public function onvotacion()
    {
        try {
            $edit = Votaciones::where('tipo','=','VOTACION')->first();
            $edit->status = 'A';
            $edit->save();
            return back();
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function offvotacion()
    {
        try {
            $edit = Votaciones::where('tipo','=','VOTACION')->first();
            $edit->status = 'N';
            $edit->save();
            return back();
        } catch (\Throwable $th) {
            throw $th;
        }
    }
   
    public function destroy($id)
    {
        DB::table('votaciones')->delete();
        return back();
    }

    public function show_vota($id)
    {
        try {
            Carbon::setLocale('es');
            $date = Carbon::now()->locale('es');
            $dictamen = SesionDet::find($id);
            $afavor = Votaciones::where('votacion','=','A')->where('id_dictamen','=',$id)->count();
            $encontra = Votaciones::where('votacion','=','N')->where('id_dictamen','=',$id)->count();
            $abstencion = Votaciones::where('votacion','=','S')->where('id_dictamen','=',$id)->count();
            $total = $afavor + $encontra + $abstencion;
            //dd($afavor,$encontra,$abstencion,$total);
            $date = " " . $date->formatLocalized('%d') . " de " . ucfirst($date->formatLocalized('%B') . " del " . $date->formatLocalized('%Y'));

            return view('votaciones.showvota', compact('afavor','encontra','abstencion','total','dictamen','date'));
        } catch (\Throwable $th) {
            throw $th;

        }
    }
    public function total_vota()
    {
        try {
            Carbon::setLocale('es');
            $date = Carbon::now()->locale('es');

            $dictamen = SesionDet::where('status','=','A')->first();
            if ($dictamen != null) {
                $afavor = Votaciones::where('votacion','=','A')->where('id_dictamen','=',$dictamen->id)->count();
                $encontra = Votaciones::where('votacion','=','N')->where('id_dictamen','=',$dictamen->id)->count();
                $abstencion = Votaciones::where('votacion','=','S')->where('id_dictamen','=',$dictamen->id)->count();
                $total = $afavor + $encontra + $abstencion;
            }else{
                $afavor = null;
                $encontra = null;
                $abstencion = null;
                $total = null;
            }
            
            //dd($afavor,$encontra,$abstencion,$total);
            $date = " " . $date->formatLocalized('%d') . " de " . ucfirst($date->formatLocalized('%B') . " del " . $date->formatLocalized('%Y'));


            $sesion = Sesiones::where('status','=','A')->first();
            //dd($sesion);
            if ($sesion != null) {
                //dd('entro');

                $asistencias = DB::table('asistencias')
                ->select('users.name','users.img','users.appaterno','users.apmaterno','users.id_partido','asistencias.fecha','asistencias.asistencia','asistencias.id')
                ->join('users','users.id','=', 'asistencias.id_user')
                ->where('asistencias.id_sesion','=',$sesion->id)
                ->orderBy('asistencias.id', 'desc')->get();
               
                $total_asis = $asistencias->count();
                //dd($total_asis);
            }else {
                $asistencias = null;
                $total_asis = null;
            }
            
            return view('votaciones.totalvotos', compact('afavor','encontra','abstencion','total','dictamen','date','total_asis','sesion'));
        } catch (\Throwable $th) {
            throw $th;

        }
    }

    function faltantes(){
        try {
            $sesion = Sesiones::where('status','=','A')->first();
            $dictamen = SesionDet::where('status','=','A')->first();
            $id_sesion = $sesion->id;
            //dd($dictamen->id);
            if ($dictamen !== null) {
                $faltantes = Asistencias::where('id_sesion', $sesion->id)
                ->whereNotIn('id_user', function ($query) use($dictamen){

                    $query->select('id_user')
                        ->from('votaciones')
                        ->where('id_dictamen', $dictamen->id);
                })
                //->with('usuario')
                ->get();
            }

            if ($sesion->asistencia == 'A' ) {
                $faltantes = User::where('status', 'A')
                ->whereNotIn('id', function ($query) use ($id_sesion) {
                    $query->select('id_user')
                        ->from('asistencias')
                        ->where('id_sesion', $id_sesion);
                })
                //->with('usuario')
                ->get();
            }
            //dd($faltantes);
            return view('faltantes', compact('faltantes'));
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function autoall()
    {
        try {
            Carbon::setLocale('es');
            $date = Carbon::now()->locale('es');

            $dictamen = SesionDet::where('status','=','A')->first();
            if ($dictamen != null) {
                //$sesion = Sesiones::find($dictamen->id_sesion);
                Carbon::setLocale('es');
                $date = Carbon::now()->locale('es');
                $votaciones = DB::table('users')
                ->select('users.name','users.appaterno','users.apmaterno','users.id','partidos.partido','users.img','votaciones.votacion')
                ->join('votaciones','votaciones.id_user','=', 'users.id')
                ->join('partidos','partidos.id','=','users.id_partido')
                ->orderBy('votaciones.id', 'asc')
                ->where('votaciones.id_dictamen','=',$dictamen->id)
                ->get();
                //dd($afavor,$encontra,$abstencion,$total);

                $total = $votaciones->count();
                $afavor = Votaciones::where('votacion','=','A')->where('id_dictamen','=',$dictamen->id)->count();
                $encontra = Votaciones::where('votacion','=','N')->where('id_dictamen','=',$dictamen->id)->count();
                $abstencion = Votaciones::where('votacion','=','S')->where('id_dictamen','=',$dictamen->id)->count();
                //$date = " " . $date->formatLocalized('%d') . " de " . ucfirst($date->formatLocalized('%B') . " del " . $date->formatLocalized('%Y'));

            }else{
                $votaciones  = null;
                $afavor = null;
                $encontra = null;
                $abstencion = null;
                $total = null;
            }
            
            //dd($afavor,$encontra,$abstencion,$total);
            $date = " " . $date->formatLocalized('%d') . " de " . ucfirst($date->formatLocalized('%B') . " de " . $date->formatLocalized('%Y'));


            $sesion = Sesiones::where('status','=','A')->first();
            //dd($sesion);
            if ($sesion != null) {
                if ($sesion->asistencia == 'A' ) {
                    //dd('entro');
    
                    $asistencias = DB::table('asistencias')
                    ->select('users.name','users.img','users.appaterno','users.apmaterno','users.id_partido','asistencias.fecha','asistencias.asistencia','asistencias.id')
                    ->join('users','users.id','=', 'asistencias.id_user')
                    ->where('asistencias.id_sesion','=',$sesion->id)
                    ->orderBy('asistencias.id', 'desc')->get();
                   
                    $total_asis = $asistencias->count();
                    //dd($total_asis);
                }else {
                    $asistencias = null;
                    $total_asis = null;
                }
                
            }else {
                $asistencias = null;
                $total_asis = null;
            }
           
            if ($sesion->id_tipo == 3) {
                return view('autoall2', compact('asistencias','afavor','encontra','abstencion','total','dictamen','date','total_asis','sesion','votaciones'));
            }else {
                return view('autoall', compact('asistencias','afavor','encontra','abstencion','total','dictamen','date','total_asis','sesion','votaciones'));
            }
            //return view('autoall', compact('asistencias','afavor','encontra','abstencion','total','dictamen','date','total_asis','sesion','votaciones'));
        } catch (\Throwable $th) {
            throw $th;

        }
    }

    public function show_vota_eco($id)
    {
        try {
            $dictamen = SesionDet::find($id);
            $sesion = Sesiones::find($dictamen->id_sesion);
            Carbon::setLocale('es');
            $date = Carbon::now()->locale('es');
            $votaciones = DB::table('users')
            ->select('users.name','users.appaterno','users.apmaterno','users.id','partidos.partido','users.img','votaciones.votacion')
            ->join('votaciones','votaciones.id_user','=', 'users.id')
            ->join('partidos','partidos.id','=','users.id_partido')
            ->orderBy('votaciones.id', 'desc')
            ->where('votaciones.id_dictamen','=',$id)
            ->get();
            //dd($afavor,$encontra,$abstencion,$total);

            $total = $votaciones->count();
            $afavor = Votaciones::where('votacion','=','A')->where('id_dictamen','=',$id)->count();
            $encontra = Votaciones::where('votacion','=','N')->where('id_dictamen','=',$id)->count();
            $abstencion = Votaciones::where('votacion','=','S')->where('id_dictamen','=',$id)->count();
            $date = " " . $date->formatLocalized('%d') . " de " . ucfirst($date->formatLocalized('%B') . " del " . $date->formatLocalized('%Y'));

            //dd($total);
            return view('votaciones.showvotaeco', compact('votaciones','total','afavor','encontra','abstencion','date','sesion'));
        } catch (\Throwable $th) {
            throw $th;

        }
    }

    public function report($id)
    {
        try {
            $dictamen = SesionDet::find($id);
            $sesion = Sesiones::find($dictamen->id_sesion);
            $votaciones = DB::table('users')
            ->select('users.name','users.appaterno','users.apmaterno','users.id','votaciones.votacion')
            ->join('votaciones','votaciones.id_user','=', 'users.id')
            ->join('sesion_dets','sesion_dets.id','=','votaciones.id_dictamen')
            ->where('votaciones.id_dictamen','=',$id)
            ->orderBy('votaciones.id', 'desc')->get();
            //dd($afavor,$encontra,$abstencion,$total);
            $total = $votaciones->count();
            //dd($total);
            $pdf = PDF::loadView('reportes.votacion', compact('votaciones','total','dictamen','sesion'));
            return $pdf->stream();
            //return view('reportes.votacion', compact('votaciones','total','dictamen'));
        } catch (\Throwable $th) {
            throw $th;

        }
    }

}
