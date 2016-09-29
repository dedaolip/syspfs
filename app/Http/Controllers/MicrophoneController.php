<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Microphone;
use DB;

class MicrophoneController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
	public function index(Request $request)
    {
        if($request->user()->office == 2){
            return view('microfones.show');
        }
        else{
            $mic = DB::table('microphones')
                        ->where('id', '<>', 0)
                        ->get();
            return view('microfones.show', ['mics' => $mic]);
        }
    }

    public function create(Request $request)
    {
        if($request->user()->office == 2){
            return view('microfones.show');
        }
        else{
                return view('microfones.create');
            }
    }

    public function store(Request $request)
    {


    	if($request->user()->office == 2){
            return view('microfones.show');
        }
        else{
            Microphone::create($request->all());
	        return redirect(route('mic.index'));
        }
        
    }

    public function edit(Request $request, $id)
    {
        if($request->user()->office == 2){
            return view('microfones.show');
        }
        else{
            $mic = Microphone::find($id);
            return view('microfones.edit', ['mic' => $mic]);
        }
    }

    public function update(Request $request)
    {
    	//dd($request);

        if($request->user()->office == 2){
            return view('microfones.show');
        }
        else{
            //dd($request->id);
            $mic         = Microphone::findOrFail($request->id);

            $mic->fill([
                'name'  => $request->name,
                'brand'  => $request->brand,
                'model'  => $request->model,
                'patrimony'  => $request->patrimony,
                'dtaacquisition'  => $request->dtaacquisition,
                'status'  => $request->status,
            ]);

            $mic->save();
            return redirect(route('mic.index'));
        }
    }

    public function destroy(Request $request, $id)
    {
        if($request->user()->office == 2){
            return view('microfones.show');
        }
        else{
            $mic = Microphone::find($id);
            $mic->delete();
            return redirect(route('mic.index'));
        }
    }
}
