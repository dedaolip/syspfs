<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Romm;


class RommController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
	public function index(Request $request)
    {
        if($request->user()->office == 2){
            return view('reservas.show');
        }
        else{
            $romms = Romm::paginate(10);
            return view('salas.show', ['romms' => $romms]);
        }
    }
}
