<?php

namespace App\Http\Controllers;
use App\Models\Disponibilite;

use Illuminate\Http\Request;

class DisponibiliteController extends Controller
{
    public function index(Request $request)
    {
    	if($request->ajax())
    	{
    		$data = Disponibilite::whereDate('start', '>=', $request->start)
                                    ->whereDate('end',   '<=', $request->end)
                                    ->get(['id', 'titre', 'debut', 'fin']);
            return response()->json($data);
    	}
        
    	return view('medecin.dispo');
    }

    public function action(Request $request)
    {
    	if($request->ajax())
    	{
    		if($request->type == 'add')
    		{
    			$event = Disponibilite::create([
    				'titre'		=>	$request->titre,
    				'debut'		=>	$request->debut,
    				'fin'		=>	$request->fin
    			]);

    			return response()->json($event);
    		}

    		if($request->type == 'update')
    		{
    			$event = Disponibilite::find($request->id)->update([
    				'titre'		=>	$request->titre,
    				'debut'		=>	$request->debut,
    				'fin'		=>	$request->fin
    			]);

    			return response()->json($event);
    		}

    		if($request->type == 'delete')
    		{
    			$event = Disponibilite::find($request->id)->delete();

    			return response()->json($event);
    		}
    	}
    }
}
