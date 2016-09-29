<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Romm;
use DB;


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
            $romms = DB::table('romms')
                        ->where('id', '<>', 0)
                        ->get();
            return view('salas.show', ['romms' => $romms]);
        }
    }

    public function create(Request $request)
    {
        if($request->user()->office == 2){
            return view('reservas.show');
        }
        else{
                return view('salas.create');
            }
    }

    public function store(Request $request)
    {


    	if($request->user()->office == 2){
            return view('reservas.show');
        }
        else{
            Romm::create($request->all());
	        return redirect(route('romm.index'));
        }
        
    }

    public function edit(Request $request, $id)
    {
        if($request->user()->office == 2){
            return view('reservas.show');
        }
        else{
            $romm = Romm::find($id);
            return view('salas.edit', ['romm' => $romm]);
        }
    }

    public function update(Request $request)
    {
    	//dd($request);

        if($request->user()->office == 2){
            return view('reservas.show');
        }
        else{
            //dd($request->id);
            $romm         = Romm::findOrFail($request->id);

            $romm->fill([
                'name'  => $request->name,
                'status'  => $request->status,
            ]);

            $romm->save();
            return redirect(route('romm.index'));
        }
    }

    public function destroy(Request $request, $id)
    {
        if($request->user()->office == 2){
            return view('reservas.show');
        }
        else{
            $romm = Romm::find($id);
            $romm->delete();
            return redirect(route('romm.index'));
        }
    }
}
