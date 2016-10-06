<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\User;
use DB;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //dd($request->user()->name);
        if($request->user()->office == 2){
            return redirect(route('reserve.index'));
        }
        else{
            return view('home');
        }
    }

    public function cadastrovarios(Request $request)
    {
        //dd($request->user()->name);
        if($request->user()->office == 2){
            return redirect(route('reserve.index'));
        }
        else{
            $salas =   DB::table('romms')
                            ->where('id', '<>', 1)
                            ->get();
            //return view('reservas.createvarios');
            return view('reservas.createvarios', ['salas' => $salas]);
        }
    }
}
