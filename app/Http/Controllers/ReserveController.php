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
    	//dd($request->user()->name);
    	//$data = date("Y/m/d");

    	if ($request->data == null){
    		$data = date("Y/m/d");
    		//dd('entrou no if');
    	}
    	else{
    		$data = $request->data;
    		//dd('entrou no else');
    	}
    	//dd('nao entrou no if else');
    	//dd($data);

        if($request->user()->office == 2){
            $reserves = DB::table('v_reservas')
            			->where('id_usuario', $request->user()->id)
            			->where('data', $data)
				        ->get();
		    //dd($reserves);
		    return view('reservas.show', ['reserves' => $reserves, 'data' => $data]);
        }
        else{
            $reserves = DB::table('v_reservas')
            			->where('data', $data)
            			->get();			
		    //dd($reserves);
		    return view('reservas.show', ['reserves' => $reserves, 'data' => $data]);
        }


	    //$reserves = DB::table('v_reservas')->get();
	    //dd($reserves);
	    //return view('reservas.show', ['reserves' => $reserves]);
        
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
							->where('status', '=', 'A')
				            ->whereNotIn('id', $querynotin)
				            ->orwhere('id', '=', 1)
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
							->where('status', '=', 'A')
				            ->whereNotIn('id', $querynotin)
				            ->orwhere('id', '=', 1)
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
							->where('status', '=', 'A')
				            ->whereNotIn('id', $querynotin)
				            ->orwhere('id', '=', 1)
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
							->where('status', '=', 'A')
				            ->whereNotIn('id', $querynotin)
				            ->orwhere('id', '=', 1)
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
							->where('status', '=', 'A')
				            ->whereNotIn('id', $querynotin)
				            ->orwhere('id', '=', 1)
				            ->get();

		//dd($som); 		            
		//dd($request->user()->name);
				            
        return view('reservas.create', ['dados' => $request,
        								'notebooks' => $notebooks,
        								'microfones' => $microfones, 
        								'projetores' => $projetores, 
        								'salas' => $salas,
        								'sons' => $sons]);

    }

    public function store(Request $request)
    {

    	//dd($request->user()->name);

    	DB::table('reserves')->insert(
		    [	'id_user' => $request->user()->id, 
		    	'id_romm' => $request->id_romm,
		    	'id_mic' => $request->id_mic,
		    	'id_proj' => $request->id_proj,
		    	'id_not' => $request->id_not,
		    	'id_sound' => $request->id_sound,
		    	'date' => $request->date,
		    	'hbegin' => $request->hbegin,
		    	'hend' => $request->hend]
		);
               
        return redirect(route('reserve.index'));
        
    }

    public function gravavarios(Request $request)
    {
    		//variavel data recebe $request->dia_inicio mais um dia
    		//$data = date('Y-m-d', strtotime("+1 days",strtotime($request->dia_inicio)));

    		//dd([$request->all(), $data]);
    		//dd($request->all());
    		$user = $request->id_user;
    		$romm = $request->id_romm;
    		$hbegin = $request->hbegin;
    		$hend = $request->h_fim;

			while ($request->dia_inicio <= $request->dia_fim){

				// Varivel que recebe o dia da semana (0 = Domingo, 1 = Segunda ...)
				//$diasemana_numero = date('w', strtotime($data));
				if ($request->dia_semana == date('w', strtotime($request->dia_inicio))){
					//dd([$request->dia_inicio,'entrou no if']);
					//dd([$request->dia_semana,date('w', strtotime($request->dia_inicio)),$request->dia_inicio]);
					//dd([$romm,$request->dia_inicio,$hbegin,$hend]);
					DB::table('reserves')->insert(
												    [	//'id_user' => $request->id_user, 
												    	'id_user' => $user, 
												    	'id_romm' => $romm,
												    	'id_mic' => 1,
												    	'id_proj' => 1,
												    	'id_not' => 1,
												    	'id_sound' => 1,
												    	'date' => $request->dia_inicio,
												    	'hbegin' => $hbegin,
												    	'hend' => $hend]
												);	
				}

				$request->dia_inicio = date('Y-m-d', strtotime("+1 days",strtotime($request->dia_inicio)));
			}
        return redirect(route('reserve.index'));
        
    }
}
