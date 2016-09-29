<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Laptop;
use DB;

class LaptopController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
	public function index(Request $request)
    {
        if($request->user()->office == 2){
            return view('notebooks.show');
        }
        else{
            $not = DB::table('laptops')
                        ->where('id', '<>', 0)
                        ->get();
            return view('notebooks.show', ['nots' => $not]);
        }
    }

    public function create(Request $request)
    {
        if($request->user()->office == 2){
            return view('notebooks.show');
        }
        else{
                return view('notebooks.create');
            }
    }

    public function store(Request $request)
    {


    	if($request->user()->office == 2){
            return view('notebooks.show');
        }
        else{
            Laptop::create($request->all());
	        return redirect(route('not.index'));
        }
        
    }

    public function edit(Request $request, $id)
    {
        if($request->user()->office == 2){
            return view('notebooks.show');
        }
        else{
            $not = Laptop::find($id);
            return view('notebooks.edit', ['not' => $not]);
        }
    }

    public function update(Request $request)
    {
    	//dd($request);

        if($request->user()->office == 2){
            return view('notebooks.show');
        }
        else{
            //dd($request->id);
            $not         = Laptop::findOrFail($request->id);

            $not->fill([
                'name'  => $request->name,
                'brand'  => $request->brand,
                'model'  => $request->model,
                'patrimony'  => $request->patrimony,
                'dtaacquisition'  => $request->dtaacquisition,
                'status'  => $request->status,
            ]);

            $not->save();
            return redirect(route('not.index'));
        }
    }

    public function destroy(Request $request, $id)
    {
        if($request->user()->office == 2){
            return view('notebooks.show');
        }
        else{
            $not = Laptop::find($id);
            $not->delete();
            return redirect(route('not.index'));
        }
    }
}
