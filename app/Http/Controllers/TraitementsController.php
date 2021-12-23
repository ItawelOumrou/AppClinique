<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Traitement;
use App\Models\TypeTraitement;
use App\Models\Medecin;
use App\Models\RendezVou;
use App\Models\Patient;
use Illuminate\Support\Facades\Session;
use DB;


class TraitementsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pt = Patient::all();
        $tr = Traitement::all();
        $md = Medecin::all();
        $t = TypeTraitement::all();

        return view('traitement.index',['trai' =>$tr,'medeci' =>$md,'type' =>$t,'pt'=>$pt]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pt = new Traitement();
        $pt ->idPatients=$request->input('idpatient');
        $pt->idMedecins=$request->input('idmed');
        $pt->typeTraitement=$request->input('typetr');
        $pt->description=$request->input('desc');
        $pt->resultats=$request->input('resultat');
        
        $pt->save();

        $idpat = $request->input('idpatient');
        $res = $request->input('resultat');

        if($res <> "rendez-vous"){
            DB::delete('delete from rendez_vous where idPatient = ?',[$idpat]);
        }
        else{

            DB::delete('delete from rendez_vous where idPatient = ?',[$idpat]);
            $list = Medecin::all();
            $pt = Patient::all();
            return view('rendezV.ajout',['list' =>$list,'patient' => $pt]);
        }

        
        Session::flash('statuscode','info');
         return redirect('traitement')->with('status','traitement ajout avec succès');
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
