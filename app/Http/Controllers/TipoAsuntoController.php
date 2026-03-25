<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TipoAsunto;


class TipoAsuntoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $tipos = TipoAsunto::all();
            return view('tipo_asuntos.index', compact('tipos'));
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
            $tipo = TipoAsunto::create([
                'descripcion' => $request->descripcion,
                'status' => 'A',
                'user_modifi' => auth()->user()->id,
            ]);
            return back()->with('success','Se agrego el tipo correctamente');

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
        try {
            $tipo = TipoAsunto::find($id);
            return view('tipo_asuntos.show');
        } catch (\Throwable $th) {
            throw $th;
        }
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
            $tipo = TipoAsunto::find($id);
            return view('tipo_asuntos.edit' ,compact('tipo'));
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
            $tipo = TipoAsunto::find($id);
            $tipo->descripcion = $request->descripcion;
            $tipo->save();
            return back()->with('success','Se modifico el tipo correctamente');
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
            $tipo = TipoAsunto::destroy($id);
            return back()->with('success','Se elimino el tipo correctamente');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
