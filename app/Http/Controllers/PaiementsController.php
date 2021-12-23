<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paiement;
use App\Models\RendezVou;
use App\Models\Patient;
use App\Models\Traitement;
use App\Models\TypeTraitement;
use App\Models\Medecin;

class PaiementsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rv = RendezVou::all();
        $pt = Patient::all();

        return view('paiement.ajout',['pat' => $pt,'ren'=>$rv]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $idpt = $request->input('idpt');
        
        $pt = new Paiement();
        $pt->idPatients=$request->input('idpt');
        $pt->datePaiement=$request->input('datepaiement');
        $pt->montant=$request->input('montant');
        $pt->save();

        
        $md =  Medecin::all();
        $tp = TypeTraitement::all();

        return view('traitement.ajout',['med'=>$md ,'type' =>$tp,'idpat'=>$idpt]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
