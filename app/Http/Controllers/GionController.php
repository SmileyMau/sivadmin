<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guion;


class GionController extends Controller
{
    /**
     *
     */
    public function index()
    {
        try {
            $guions = Guion::paginate(10);
            return view('guiones.index', compact('guions'));
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
     * 
     */
    public function store(Request $request)
    {
        try {
            //dd($request);
            $guion = Guion::create([
                'fecha' => $request->fecha,
                'titulo' => $request->titulo,
                'texto' => $request->texto,
            ]);
            return back()->with('success','El guion se guardo correctamente');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     *
     */
    public function show($id)
    {
        try {
            $show = Guion::find($id);
            return view('guiones.show', compact('show'));
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * 
     *
     */
    public function edit($id)
    {
        try {
            $edit = Guion::find($id);
            return view('guiones.edit', compact('edit'));
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * 
     */
    public function update(Request $request, $id)
    {
        try {
            $update = Guion::find($id);
            $update->fecha = $request->fecha;
            $update->titulo = $request->titulo;
            $update->texto = $request->texto;
            $update->save();
            return back()->with('success','El guion se modifico correctamente');
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
            $destroy = Guion::destroy($id);
            return back()->with('success','El Guion se elimino correctamente');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    function texto(){
        try {
            $guion = Guion::first();
            //dd($guion);
            return view('guiones.guion', compact('guion'));
        } catch (\Throwable $th) {
            throw $th;
        }
        
    }
}
