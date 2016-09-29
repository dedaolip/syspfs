<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\Http\Requests;

class ReserveController extends Controller
{
    

    public function __construct()
    {
        $this->middleware('auth');
    }
    
	public function index(Request $request)
    {
        
	    $reserves = DB::table('v_reservas')->get();
	    //dd($reserves);
	    return view('reservas.show', ['reserves' => $reserves]);
        
    }

    public function create(Request $request)
    {
        //dd($request->date);

        
        			
    	//script funcionando
		/*$projetores =   DB::table('projectors')
				            ->whereExists(function ($query) use ($request) {
				                $query->select(DB::raw(1))
				                      ->from('v_reservas')
				                      
				                      ->whereRaw('v_reservas.id_projetor = projectors.id')
				                      ->where('v_reservas.data', '=', $request->date)
				                      
				                      ->where(function($queryw) use ($request)
								        {
								            $queryw->whereBetween('v_reservas.inicio', [$request->hbegin,$request->hend])
								                  ->orwhereBetween('v_reservas.fim', [$request->hbegin,$request->hend]);
								        })
				                      ->orwhere(function($queryw2) use ($request)
								        {
								            $queryw2->where('v_reservas.inicio', '<=', $request->hbegin)
								                  ->where('v_reservas.fim', '>=', $request->hend);
								        });
				            })
				            ->get();*/


		//selecionando projetores que nao estao sendo utilizados		            
		$querynotin = function ($query) use ($request) {
				                $query->select(DB::raw('v_reservas.id_projetor'))
				                      ->from('v_reservas')
				                      
				                      ->whereRaw('v_reservas.id_projetor = projectors.id')
				                      ->where('v_reservas.data', '=', $request->date)
				                      
				                      ->where(function($queryw) use ($request)
								        {
								            $queryw->whereBetween('v_reservas.inicio', [$request->hbegin,$request->hend])
								                  ->orwhereBetween('v_reservas.fim', [$request->hbegin,$request->hend]);
								        })
				                      ->orwhere(function($queryw2) use ($request)
								        {
								            $queryw2->where('v_reservas.inicio', '<=', $request->hbegin)
								                  ->where('v_reservas.fim', '>=', $request->hend);
								        });
				            };		            

		$projetores =   DB::table('projectors')
				            ->whereNotIn('id', $querynotin)
				            ->get();

		//dd($projetores);

		//selecionando salas que nao estao sendo utilizados		            
		$querynotin = function ($query) use ($request) {
				                $query->select(DB::raw('v_reservas.id_sala'))
				                      ->from('v_reservas')
				                      
				                      ->whereRaw('v_reservas.id_sala = romms.id')
				                      ->where('v_reservas.data', '=', $request->date)
				                      
				                      ->where(function($queryw) use ($request)
								        {
								            $queryw->whereBetween('v_reservas.inicio', [$request->hbegin,$request->hend])
								                  ->orwhereBetween('v_reservas.fim', [$request->hbegin,$request->hend]);
								        })
				                      ->orwhere(function($queryw2) use ($request)
								        {
								            $queryw2->where('v_reservas.inicio', '<=', $request->hbegin)
								                  ->where('v_reservas.fim', '>=', $request->hend);
								        });
				            };		            

		$salas =   DB::table('romms')
				            ->whereNotIn('id', $querynotin)
				            ->get();

		//dd($salas);

		//selecionando notebook que nao estao sendo utilizados		            
		$querynotin = function ($query) use ($request) {
				                $query->select(DB::raw('v_reservas.id_notebook'))
				                      ->from('v_reservas')
				                      
				                      ->whereRaw('v_reservas.id_notebook = laptops.id')
				                      ->where('v_reservas.data', '=', $request->date)
				                      
				                      ->where(function($queryw) use ($request)
								        {
								            $queryw->whereBetween('v_reservas.inicio', [$request->hbegin,$request->hend])
								                  ->orwhereBetween('v_reservas.fim', [$request->hbegin,$request->hend]);
								        })
				                      ->orwhere(function($queryw2) use ($request)
								        {
								            $queryw2->where('v_reservas.inicio', '<=', $request->hbegin)
								                  ->where('v_reservas.fim', '>=', $request->hend);
								        });
				            };		            

		$notebooks =   DB::table('laptops')
				            ->whereNotIn('id', $querynotin)
				            ->get();

		//dd($notebook);	

		//selecionando microfone que nao estao sendo utilizados		            
		$querynotin = function ($query) use ($request) {
				                $query->select(DB::raw('v_reservas.id_microfone'))
				                      ->from('v_reservas')
				                      
				                      ->whereRaw('v_reservas.id_microfone = microphones.id')
				                      ->where('v_reservas.data', '=', $request->date)
				                      
				                      ->where(function($queryw) use ($request)
								        {
								            $queryw->whereBetween('v_reservas.inicio', [$request->hbegin,$request->hend])
								                  ->orwhereBetween('v_reservas.fim', [$request->hbegin,$request->hend]);
								        })
				                      ->orwhere(function($queryw2) use ($request)
								        {
								            $queryw2->where('v_reservas.inicio', '<=', $request->hbegin)
								                  ->where('v_reservas.fim', '>=', $request->hend);
								        });
				            };		            

		$microfones =   DB::table('microphones')
				            ->whereNotIn('id', $querynotin)
				            ->get();

		//dd($microfone);            

		//selecionando som que nao estao sendo utilizados		            
		$querynotin = function ($query) use ($request) {
				                $query->select(DB::raw('v_reservas.id_som'))
				                      ->from('v_reservas')
				                      
				                      ->whereRaw('v_reservas.id_som = sounds.id')
				                      ->where('v_reservas.data', '=', $request->date)
				                      
				                      ->where(function($queryw) use ($request)
								        {
								            $queryw->whereBetween('v_reservas.inicio', [$request->hbegin,$request->hend])
								                  ->orwhereBetween('v_reservas.fim', [$request->hbegin,$request->hend]);
								        })
				                      ->orwhere(function($queryw2) use ($request)
								        {
								            $queryw2->where('v_reservas.inicio', '<=', $request->hbegin)
								                  ->where('v_reservas.fim', '>=', $request->hend);
								        });
				            };		            

		$sons =   DB::table('sounds')
				            ->whereNotIn('id', $querynotin)
				            ->get();

		//dd($som); 		            

        return view('reservas.create', ['dados' => $request,
        								'notebooks' => $notebooks,
        								'microfones' => $microfones, 
        								'projetores' => $projetores, 
        								'salas' => $salas,
        								'sons' => $sons]);
    }
}
