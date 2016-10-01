<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Sound;
use DB;

class SoundController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
	public function index(Request $request)
    {
        if($request->user()->office == 2){
            return view('sons.show');
        }
        else{
            $sound = DB::table('sounds')
                        ->where('id', '<>', 1)
                        ->get();
            return view('sons.show', ['sounds' => $sound]);
        }
    }

    public function create(Request $request)
    {
        if($request->user()->office == 2){
            return view('sons.show');
        }
        else{
                return view('sons.create');
            }
    }

    public function store(Request $request)
    {


    	if($request->user()->office == 2){
            return view('sons.show');
        }
        else{
            Sound::create($request->all());
	        return redirect(route('sound.index'));
        }
        
    }

    public function edit(Request $request, $id)
    {
        if($request->user()->office == 2){
            return view('sons.show');
        }
        else{
            $sound = Sound::find($id);
            return view('sons.edit', ['sound' => $sound]);
        }
    }

    public function update(Request $request)
    {
    	//dd($request);

        if($request->user()->office == 2){
            return view('sons.show');
        }
        else{
            //dd($request->id);
            $sound         = Sound::findOrFail($request->id);

            $sound->fill([
                'name'  => $request->name,
                'brand'  => $request->brand,
                'model'  => $request->model,
                'patrimony'  => $request->patrimony,
                'dtaacquisition'  => $request->dtaacquisition,
                'status'  => $request->status,
            ]);

            $sound->save();
            return redirect(route('sound.index'));
        }
    }

    public function destroy(Request $request, $id)
    {
        if($request->user()->office == 2){
            return view('sons.show');
        }
        else{
            $sound = Sound::find($id);
            $sound->delete();
            return redirect(route('sound.index'));
        }
    }
}
