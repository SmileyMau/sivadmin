<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Asunto;
use App\Models\AsuntoDetalle;
use App\Models\Errores;
use App\Models\User;
use App\Models\TipoAsunto;
use Carbon\Carbon;
class AsuntoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $users = User::all();
            $tipo_asuntos = TipoAsunto::all();
            return view('asuntos.index',compact('users','tipo_asuntos'));
        } catch (\Throwable $th) {
            $errorMessage = 'Error en funcion index del controlador AsuntoController';
            $error = Errores::create([
                'codigo'=> $th->getCode(),
                'error'=> $th->getMessage(),
                'fecha'=> Carbon::now(),
                'id_user'=> auth()->user()->id,
                'nombre'=> auth()->user()->name,
                'archivo'=> $th->getFile(),
                'linea'=> $th->getLine(),
                'nota' => $errorMessage,
            ]);
            throw $th;
            return redirect()->route('dashboard.index')->with('error', 'Ocurrio un error, intente de nuevo');
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
            //dd($request->all());
            $asunto = Asunto::create([
                'id_user' => $request->id_user,
                'id_tipo' => $request->id_tipo,
                'fecha' => $request->fecha,
                'descripcion' => $request->descripcion,
                'no_oficio' => $request->no_oficio,
                'observacion' => $request->observacion,
                'status' => 'A',
                'user_modifi' => auth()->user()->id,
            ]);
            foreach ($request->id_users as $id_user) {
                AsuntoDetalle::create([
                    'id_asunto' => $asunto->id,
                    'id_user' => $id_user,
                    'status' => 'A',
                    'user_modifi' => auth()->user()->id,
                ]);
            }
            return back()->with('success', 'Asunto creado con exito');
        } catch (\Throwable $th) {
            $errorMessage = 'Error en funcion store del controlador AsuntoController';
            $error = Errores::create([
                'codigo'=> $th->getCode(),
                'error'=> $th->getMessage(),
                'fecha'=> Carbon::now(),
                'id_user'=> auth()->user()->id,
                'nombre'=> auth()->user()->name,
                'archivo'=> $th->getFile(),
                'linea'=> $th->getLine(),
                'nota' => $errorMessage,
            ]);
            throw $th;
            return redirect()->route('dashboard.index')->with('error', 'Ocurrio un error, intente de nuevo');
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
            $asuntos = Asunto::findOrFail($id);
            return view('asuntos.show', compact('asuntos'));
        } catch (\Throwable $th) {
            $errorMessage = 'Error en funcion show del controlador AsuntoController';
            $error = Errores::create([
                'codigo'=> $th->getCode(),
                'error'=> $th->getMessage(),
                'fecha'=> Carbon::now(),
                'id_user'=> auth()->user()->id,
                'nombre'=> auth()->user()->name,
                'archivo'=> $th->getFile(),
                'linea'=> $th->getLine(),
                'nota' => $errorMessage,
            ]);
            throw $th;
            return redirect()->route('dashboard.index')->with('error', 'Ocurrio un error, intente de nuevo');
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
            $asunto = Asunto::findOrFail($id);
            return view('asuntos.edit', compact('asunto'));
        } catch (\Throwable $th) {
            $errorMessage = 'Error en funcion edit del controlador AsuntoController';
            $error = Errores::create([
                'codigo'=> $th->getCode(),
                'error'=> $th->getMessage(),
                'fecha'=> Carbon::now(),
                'id_user'=> auth()->user()->id,
                'nombre'=> auth()->user()->name,
                'archivo'=> $th->getFile(),
                'linea'=> $th->getLine(),
                'nota' => $errorMessage,
            ]);
            return redirect()->route('dashboard.index')->with('error', 'Ocurrio un error, intente de nuevo');
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
        $asunto = Asunto::findOrFail($id);
        $asunto->update($request->all());
        return redirect()->route('asuntos.index')->with('success', 'Asunto actualizado con exito');
        } catch (\Throwable $th) {
            $errorMessage = 'Error en funcion update del controlador AsuntoController';
            $error = Errores::create([
                'codigo'=> $th->getCode(),
                'error'=> $th->getMessage(),
                'fecha'=> Carbon::now(),
                'id_user'=> auth()->user()->id,
                'nombre'=> auth()->user()->name,
                'archivo'=> $th->getFile(),
                'linea'=> $th->getLine(),
                'nota' => $errorMessage,
            ]);
            return redirect()->route('dashboard.index')->with('error', 'Ocurrio un error, intente de nuevo');

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
            $asunto = Asunto::findOrFail($id);
            $asunto->delete();
            return back()->with('success', 'Asunto eliminado con exito');
        } catch (\Throwable $th) {
            $errorMessage = 'Error en funcion destroy del controlador AsuntoController';
            $error = Errores::create([
                'codigo'=> $th->getCode(),
                'error'=> $th->getMessage(),
                'fecha'=> Carbon::now(),
                'id_user'=> auth()->user()->id,
                'nombre'=> auth()->user()->name,
                'archivo'=> $th->getFile(),
                'linea'=> $th->getLine(),
                'nota' => $errorMessage,
            ]);
            return redirect()->route('dashboard.index')->with('error', 'Ocurrio un error, intente de nuevo');
            throw $th;
        }
    }
}
