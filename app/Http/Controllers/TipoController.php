<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tipo;

class TipoController extends Controller
{
    /**
     * 
     */
    public function index()
    {
        try {
            $tipos = Tipo::paginate(10);
            return view('tipos.index', compact('tipos'));
        } catch (\Throwable $th) {
            throw $th;
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
     *Hace un create de la tabla tipos 
     */
    public function store(Request $request)
    {
        try {
            //dd($request);
            $tipo = Tipo::create([
                'descripcion' => $request->descripcion,
                'status' => 'A',
                'id_user' => auth()->user()->id,
            ]);
            return back()->with('success','El tipoo se guardo correctamente');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Hace una consulta en la tabla tipos 
     */
    public function show($id)
    {
        try {
            $show = Tipo::find($id);
            return view('tipos.show', compact('show'));
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Hace una consulta en la tabla tipos 
     *
     */
    public function edit($id)
    {
        try {
            $edit = Tipo::find($id);
            return view('tipos.edit', compact('edit'));
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(Request $request, $id)
    {
        try {
            $update = Tipo::find($id);
            $update->descripcion = $request->descripcion;
            $update->save();
            return back()->with('success','El tipo se modifico correctamente');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     *¿
     */
    public function destroy($id)
    {
        try {
            $delete = Tipo::destroy($id);
            return back()->with('success','El tipo se elimino correctamente');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
