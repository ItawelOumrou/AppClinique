<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RendezVou;
use App\Models\Medecin;
use App\Models\Patient;
use App\Models\HistoriquesRenvezVou;
use Illuminate\Support\Facades\Session;
use DB;
use DateTime;

class RendezVousController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $date  = new DateTime('NOW');
        $p = DB::delete('delete from rendez_vous where dateRendezVous <= ?',[$date]);

        $list = RendezVou::all();
        $medecine = Medecin::all();
        $ptien = Patient::all();
        return view('rendezV.index',['list' =>$list,'patien' =>$ptien,'medeci' => $medecine]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     
        $list = Medecin::all();
        $pt = Patient::all();
        return view('rendezV.ajout',['list' =>$list,'patient' => $pt]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $idpat = $request->input('idpt');
        $idmedec=$request->input('idmed');

        $rdv = RendezVou::where([['idPatient','=',$idpat],['idMedecin','=',$idmedec]])->get();

        if(count($rdv)==0){
                $pt = new RendezVou();

            $pt->idPatient=$request->input('idpt');
            $pt->idMedecin=$request->input('idmed');
            $pt->datePrendreRV=$request->input('datep');
            $pt->dateRendezVous=$request->input('dateRen');

            $ht = new HistoriquesRenvezVou();

            $ht->idPatient=$request->input('idpt');
            $ht->idMedecin=$request->input('idmed');
            $ht->datePrendreRV=$request->input('datep');
            $ht->dateRendezVous=$request->input('dateRen');


            $pt->save();
            $ht->save();
                Session::flash('statuscode','info');
                return redirect('rendezV')->with('status','Ajout avec succès');
        }
        else{
                Session::flash('statuscode','error');
                return back()->with('status','Vous avez déjà un rendez-vous');
        }
            

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $vari = RendezVou::find($id);
        $pt = Patient::all();
        $md = Medecin::all();
        return view('rendezV.vue',['var'=> $vari,'pat' => $pt, 'med' =>$md]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $RV = RendezVou::find($id);
        $mdi = Medecin::all();
        $pti = Patient::all();
        return view('rendezV.editer',['rendez' =>$RV,'med' =>$mdi,'patient' =>$pti]);
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
        $pt = RendezVou::find($id);
        $pt->idPatient=$request->input('idpt');
        $pt->IdMedecin=$request->input('idmed');
        $pt->datePrendreRV=$request->input('datep');
        $pt->dateRendezVous=$request->input('dater');

        $ht = HistoriquesRenvezVou::find($id);
        $ht->idPatient=$request->input('idpt');
        $ht->IdMedecin=$request->input('idmed');
        $ht->datePrendreRV=$request->input('datep');
        $ht->dateRendezVous=$request->input('dater');
 
        $pt->save();
        $ht ->save();

        Session::flash('statuscode','success');
         return redirect('rendezV')->with('status','Modification avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::delete('delete from rendez_vous where id = ?',[$id]);
        Session::flash('statuscode','error');
        return redirect('rendezV')->with('status','Suppression avec succès');
    }
    //public $verifieRV =NULL;
    public function verifier(){

        $rv = RendezVou::all();
        $pt = Patient::all();
        $md = Medecin::all();

        return view('rendezV.verifie',['verif' => $rv,'pat'=>$pt,'medec' => $md]);
    }

    public function verifierRV(Request $request){

        $select = $request->input('verifieRV');
        $rv = RendezVou::all();

    }
}
