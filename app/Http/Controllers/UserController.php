<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class UserController extends Controller
{

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'user' =>['required', 'string'],
            'password' =>['required', 'string']
        ]);
       
        if(Auth::attempt($credentials)){
            //dd('pes');
            $request->session()->regenerate();
            return redirect('/');
        }else {
            return back()->with('error','El usuario y contraseña sin incorrectos');
        }
    }


    /**
     *
     */
    public function index()
    {
        try {
            $date = Carbon::now();
            $year = $date->year;
            $date = $date->format('Y-m-d');
            
            if ($date >= $year.'-10-5' && $date <= $year.'-11-10' ) {
                $style_card = 'card-dmuertos';
                $color_card = 'color-dmuertos';
                $style_input = 'input-dmuertos';
                $style_btn = 'btn-dmuertos';
                $style_a = 'a-dmuertos';
                $img = '/img/login_dia_muertos.jpg';
            }/*else{
                $style_card = 'card-celsh';
                $color_card = '';
                $style_input = '';
                $style_btn = '';
                $style_a = '';
                $img = "";

            }*/

                      $style_card = 'card-dmuertos';
                $color_card = 'color-dmuertos';
                $style_input = 'input-dmuertos';
                $style_btn = 'btn-dmuertos';
                $style_a = 'a-dmuertos';
                $img = '/img/login_dia_muertos.jpg';
            //dd( $date,$year,$year.'-10-5');
            return view('login', compact('style_card','color_card','style_input','style_btn','style_a','img'));
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
