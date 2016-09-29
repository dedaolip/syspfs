<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Projector;
use DB;

class ProjectorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
	public function index(Request $request)
    {
        if($request->user()->office == 2){
            return view('projetores.show');
        }
        else{
            $project = DB::table('projectors')
                        ->where('id', '<>', 0)
                        ->get();
            return view('projetores.show', ['projects' => $project]);
        }
    }

    public function create(Request $request)
    {
        if($request->user()->office == 2){
            return view('projetores.show');
        }
        else{
                return view('projetores.create');
            }
    }

    public function store(Request $request)
    {


    	if($request->user()->office == 2){
            return view('projetores.show');
        }
        else{
            Projector::create($request->all());
	        return redirect(route('project.index'));
        }
        
    }

    public function edit(Request $request, $id)
    {
        if($request->user()->office == 2){
            return view('projetores.show');
        }
        else{
            $project = Projector::find($id);
            return view('projetores.edit', ['project' => $project]);
        }
    }

    public function update(Request $request)
    {
    	//dd($request);

        if($request->user()->office == 2){
            return view('projetores.show');
        }
        else{
            //dd($request->id);
            $project         = Projector::findOrFail($request->id);

            $project->fill([
                'name'  => $request->name,
                'brand'  => $request->brand,
                'model'  => $request->model,
                'patrimony'  => $request->patrimony,
                'dtaacquisition'  => $request->dtaacquisition,
                'status'  => $request->status,
            ]);

            $project->save();
            return redirect(route('project.index'));
        }
    }

    public function destroy(Request $request, $id)
    {
        if($request->user()->office == 2){
            return view('projetores.show');
        }
        else{
            $project = Projector::find($id);
            $project->delete();
            return redirect(route('project.index'));
        }
    }
}
