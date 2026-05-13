<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Tipo;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;



class SyncLocalData extends Command
{
    


    protected $signature = 'sync:local-to-cloud';
    protected $description = 'Sincroniza asuntos y sesiones del servidor local a la nube';
    public function __construct()
    {
        parent::__construct();
    }

  
    public function handle()
    {

        $this->info('Iniciando sincronización...');

        $partidos = DB::table('partidos')->get();
        $users = DB::table('users')->get();
        $tipo_asuntos = DB::table('tipo_asuntos')->get();
        $tipos = DB::table('tipos')->get();
        $asuntos = DB::table('asuntos')->get();
        $asunto_detalles = DB::table('asunto_detalles')->get();
        $sesiones = DB::table('sesiones')->get();
        $sesion_dets = DB::table('sesion_dets')->get();
        $sesion_asuntos = DB::table('sesion_asuntos')->get();
        $asistencias = DB::table('asistencias')->get();
        $votaciones = DB::table('votaciones')->get();
        $voto_asuntos = DB::table('voto_asuntos')->get();


        foreach ($partidos as $partido) {
            DB::connection('mysql_secondary')->table('partidos')->updateOrInsert(
                ['id' => $partido->id], // Condición para buscar
                (array)$partido        // Datos a actualizar
            );
        }

        foreach ($users as $user) {
            DB::connection('mysql_secondary')->table('users')->updateOrInsert(
                ['id' => $user->id], // Condición para buscar
                (array)$user        // Datos a actualizar
            );
        }

        foreach ($tipo_asuntos as $tipo_asunto) {
            DB::connection('mysql_secondary')->table('tipo_asuntos')->updateOrInsert(
                ['id' => $tipo_asunto->id], // Condición para buscar
                (array)$tipo_asunto        // Datos a actualizar
            );
        }

        foreach ($tipos as $tipo) {
            DB::connection('mysql_secondary')->table('tipos')->updateOrInsert(
                ['id' => $tipo->id], // Condición para buscar
                (array)$tipo        // Datos a actualizar
            );
        }

        foreach ($asuntos as $asunto) {
            DB::connection('mysql_secondary')->table('asuntos')->updateOrInsert(
                ['id' => $asunto->id], // Condición para buscar
                (array)$asunto        // Datos a actualizar
            );
        }

        foreach ($asunto_detalles as $asunto_detalle) {
            DB::connection('mysql_secondary')->table('asunto_detalles')->updateOrInsert(
                ['id' => $asunto_detalle->id], // Condición para buscar
                (array)$asunto_detalle        // Datos a actualizar
            );
        }

        foreach ($sesiones as $sesion) {
            DB::connection('mysql_secondary')->table('sesiones')->updateOrInsert(
                ['id' => $sesion->id], // Condición para buscar
                (array)$sesion        // Datos a actualizar
            );
        }

        foreach ($sesion_dets as $sesion_det) {
            DB::connection('mysql_secondary')->table('sesion_dets')->updateOrInsert(
                ['id' => $sesion_det->id], // Condición para buscar
                (array)$sesion_det        // Datos a actualizar
            );
        }

        foreach ($sesion_asuntos as $sesion_asunto) {
            DB::connection('mysql_secondary')->table('sesion_asuntos')->updateOrInsert(
                ['id' => $sesion_asunto->id], // Condición para buscar
                (array)$sesion_asunto        // Datos a actualizar
            );
        }

        foreach ($asistencias as $asistencia) {
            DB::connection('mysql_secondary')->table('asistencias')->updateOrInsert(
                ['id' => $asistencia->id], // Condición para buscar
                (array)$asistencia        // Datos a actualizar
            );
        }

        foreach ($votaciones as $votacion) {
            DB::connection('mysql_secondary')->table('votaciones')->updateOrInsert(
                ['id' => $votacion->id], // Condición para buscar
                (array)$votacion        // Datos a actualizar
            );
        }

        foreach ($voto_asuntos as $voto_asunto) {
            DB::connection('mysql_secondary')->table('voto_asuntos')->updateOrInsert(
                ['id' => $voto_asunto->id], // Condición para buscar
                (array)$voto_asunto        // Datos a actualizar
            );
        }
        $this->info('Sincronización completada con éxito.');

        $this->info('Iniciando transferencia de documentos legislativos...');

        $discoLocal = Storage::disk('public');
        $discoNube = Storage::disk('nube_ftp'); 

        // Lista de carpetas que queremos sincronizar
        $directorios = [
            'actas',
            'Acuerdos',
            'asuntos',
            'comunicaciones',
            'Dictamenes', // Corregí el nombre que pusiste para que coincida con el sistema
            'Ordenes',
            'users',
            'diarios'
        ];

        foreach ($directorios as $directorio) {
            $this->info("--- Procesando carpeta: $directorio ---");
            
            // Obtenemos todos los archivos dentro de esa categoría
            $archivos = $discoLocal->allFiles($directorio);

            foreach ($archivos as $archivo) {
                // Si el archivo no existe en el cPanel, lo subimos
                if (!$discoNube->exists($archivo)) {
                    try {
                        $this->line("Copiando: $archivo");
                        $contenido = $discoLocal->get($archivo);
                        $discoNube->put($archivo, $contenido);
                    } catch (\Exception $e) {
                        $this->error("Error al subir $archivo: " . $e->getMessage());
                    }
                }
            }
        }

        $this->info('¡Sincronización de archivos finalizada!');

    }
}
