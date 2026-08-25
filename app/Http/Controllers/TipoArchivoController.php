<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TipoArchivoTransparencia;

class TipoArchivoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $tipos = TipoArchivoTransparencia::all();
            return view('tipo_archivo.index', compact('tipos'));
        }catch(\Exception $e){
            return redirect()->route('dashboard.index')->with('error', 'Error al cargar la vista de tipos de archivos: ' . $e->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'descripcion' => 'nullable|string|max:255',
            ]);

            $tipoArchivo = new TipoArchivoTransparencia();
            $tipoArchivo->descripcion = $request->input('descripcion');
            $tipoArchivo->status = 'A';
            $tipoArchivo->user_modifi = auth()->user()->id;
            $tipoArchivo->save();

            return redirect()->route('TipoArchivo.index')->with('success', 'Tipo de archivo creado exitosamente.');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $tipoArchivo = TipoArchivoTransparencia::findOrFail($id);
            return view('tipo_archivo.edit', compact('tipoArchivo'));
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'descripcion' => 'nullable|string|max:255',
            ]);

            $tipoArchivo = TipoArchivoTransparencia::findOrFail($id);
            $tipoArchivo->descripcion = $request->input('descripcion');
            $tipoArchivo->user_modifi = auth()->user()->id;
            $tipoArchivo->save();

            return redirect()->route('TipoArchivo.index')->with('success', 'Tipo de archivo actualizado exitosamente.');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $tipoArchivo = TipoArchivoTransparencia::findOrFail($id);
            $tipoArchivo->delete();

            return redirect()->route('TipoArchivo.index')->with('success', 'Tipo de archivo eliminado exitosamente.');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
