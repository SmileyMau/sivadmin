<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Votaciones;
use App\Models\Asistencias;
use App\Models\Sesiones;
use App\Models\SesionDet;
class DashboardController extends Controller
{
    function index() {
        try {
            $votos = Votaciones::count();
            $asistencias = Asistencias::count();
            $sesiones = Sesiones::count();
            $sesiones_det = SesionDet::count();
            return view('dashboard', compact('votos', 'sesiones', 'sesiones_det','asistencias'));
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
