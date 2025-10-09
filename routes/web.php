<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


/*Route::get('login', function () {
    return view('login');
})->name('login')->middleware('guest');*/
Route::get('login', 'App\Http\Controllers\UserController@index')->name('login')->middleware('guest');

Route::get('logout', function () {
   Auth::logout();
})->name('logout')->middleware('auth');

Route::post('login', [UserController::class,'login']);

Route::get('/', 'App\Http\Controllers\DashboardController@index')->name('dashboard.index')->middleware('auth');


Route::resource('/sesiones', 'App\Http\Controllers\SesionController')->middleware('auth');
Route::get('/sesiones/editdictamen', 'App\Http\Controllers\SesionController@editdet')->name('sesiones.editdet')->middleware('auth');
Route::get('/sesiones/verdictamen', 'App\Http\Controllers\SesionController@showdet')->name('sesiones.showdet')->middleware('auth');
Route::patch('/sesiones/{id}/updictamen', 'App\Http\Controllers\SesionController@updatedet')->name('sesiones.updatedet')->middleware('auth');
Route::patch('/sesiones/{id}/ac', 'App\Http\Controllers\SesionController@ac')->name('sesiones.ac')->middleware('auth');
Route::patch('/sesiones/{id}/acsesion', 'App\Http\Controllers\SesionController@acsesion')->name('sesiones.acsesion')->middleware('auth');
Route::delete('/sesiones/{id}/detdestroy', 'App\Http\Controllers\SesionController@detdestroy')->name('sesiones.detdestroy')->middleware('auth');
Route::post('/sesiones/{id}/detstore', 'App\Http\Controllers\SesionController@detstore')->name('sesiones.detstore')->middleware('auth');
Route::post('/sesiones/{id}/asistencia', 'App\Http\Controllers\SesionController@asistencia')->name('sesiones.asistencia')->middleware('auth');
Route::get('/sesiones/{id}/descargar', 'App\Http\Controllers\SesionController@descargar')->name('sesiones.descargar')->middleware('auth');
Route::post('/sesiones/{id}/onasist', 'App\Http\Controllers\SesionController@on_asist')->name('sesiones.onasist')->middleware('auth');
Route::post('/sesiones/{id}/offasist', 'App\Http\Controllers\SesionController@off_asist')->name('sesiones.offasist')->middleware('auth');
Route::post('/sesiones/{id}/closeasist', 'App\Http\Controllers\SesionController@close_asist')->name('sesiones.closeasist')->middleware('auth');
Route::post('/sesiones/{id}/report_part', 'App\Http\Controllers\SesionController@report_part')->name('sesiones.report_part')->middleware('auth');


Route::get('Asistencias', 'App\Http\Controllers\AsistenciaController@show_asis')->name('Asistencia.Asistencias');
Route::post('Asistencias2/{id}/asistencias', 'App\Http\Controllers\AsistenciaController@show_asis2')->name('Asistencia.Asistencias2');
Route::resource('AdminVotaciones', 'App\Http\Controllers\VotacionController')->middleware('auth');
Route::patch('AsistenciaOn', 'App\Http\Controllers\AsistenciaController@onasistencia')->name('Asistencia.onasistencia');
Route::patch('AsistenciaOff', 'App\Http\Controllers\AsistenciaController@offasistencia')->name('Asistencia.offasistencia');
Route::get('AsistenciaPDF', 'App\Http\Controllers\AsistenciaController@report')->name('Asistencia.report')->middleware('auth');
Route::get('/totalasistencia', 'App\Http\Controllers\AsistenciaController@total_asis')->name('sesiones.totalasistencia');

Route::resource('Votaciones', 'App\Http\Controllers\VotacionController')->middleware('auth');
Route::post('Votaciones/{id}/votos', 'App\Http\Controllers\VotacionController@show_vota')->name('Votaciones.showvota');
Route::post('Votacion/{id}/economica', 'App\Http\Controllers\VotacionController@show_vota_eco')->name('Votaciones.showvotaeco');
Route::patch('VotacionOn', 'App\Http\Controllers\VotacionController@onvotacion')->name('Votaciones.onvotacion')->middleware('auth');
Route::patch('VotacionOff', 'App\Http\Controllers\VotacionController@offvotacion')->name('Votaciones.offvotacion')->middleware('auth');
Route::get('VotacionPDF', 'App\Http\Controllers\VotacionController@report')->name('Votaciones.report')->middleware('auth');
Route::get('/totalvotos', 'App\Http\Controllers\VotacionController@total_vota')->name('sesiones.total_vota');
Route::get('/autoall', 'App\Http\Controllers\VotacionController@autoall')->name('sesiones.autoall');
Route::get('/faltantes', 'App\Http\Controllers\VotacionController@faltantes')->name('sesiones.faltantes');

Route::resource('Tipo', 'App\Http\Controllers\TipoController')->middleware('auth');

Route::resource('Guion', 'App\Http\Controllers\GionController')->middleware('auth');
Route::get('Guion/texto/guion', 'App\Http\Controllers\GionController@texto')->name('Guion.texto')->middleware('auth');

Route::post('Reporte/{id}/asistencias', 'App\Http\Controllers\AsistenciaController@report')->name('Reporte.asistencias')->middleware('auth');
Route::post('Reporte/{id}/votaciones', 'App\Http\Controllers\VotacionController@report')->name('Reporte.votaciones')->middleware('auth');

