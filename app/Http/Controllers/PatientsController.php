<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\LienNaissance;
use App\Models\RendezVou;
use App\Models\HistoriquesRenvezVou;
use App\Models\Medecin;
use Illuminate\Support\Facades\Session;
use DB;
use DateTime;



class PatientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $list = Patient::all();
        return view('patient.index',['list' =>$list]);
        //or return view('patient.index',compact('list') );

    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $wilay = LienNaissance::all();
        return view('patient.create',['wilaya' => $wilay]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, array(
            'nni'=>'size:10|unique:patients|unique:medecins|required',
            'numTelephone'=>'size:8|unique:medecins|unique:patients|required',
            /*'dateN' => 'regex:/^ (0?[1-9]|[12][0-9]|3[01]) [\/] (0?[1-9] | 1[012]) [\/] \d{4} $/i'*/
            'dateN' => 'required|date|date_format:Y-m-d',
        ),
        [
            'nni.size'=> 'Ce champ doit comporter exactement 10 chiffres',
            'nni.unique'=> "Ce numéro nationale d'identité est déjà existe",
            'nni.required'=> "nni est obligatoire",

            'numTelephone.size'=> 'Ce champ doit comporter exactement 8 chiffres',
            'numTelephone.unique'=> "Ce numéro du téléphone est déjà existe",
            'numTelephone.required'=> "le numéro du téléphone est obligatoire",
            'numTelephone.regex' => 'le numéro du téléphone doit commencer par 2 , 3 ou 4',

            'dateN.date' => 'le  format du date est invalid',
            'dateN.date_format' => 'le  format du date est invalid',
        ]);

        $dt = $request->input('dateN');
         $aj = date('Y-m-d');
        $dif = date_diff(date_create($dt), date_create($aj));
    

        $pt = new Patient();
       $pt->nom=$request->input('nom');
       $pt->prenom=$request->input('prenom');
       $pt->genre=$request->input('genre');
       $pt->age=$dif->format('%y');
       $pt->nni=$request->input('nni');
       $pt->numTelephone=$request->input('numTelephone');
       $pt->dateNaiss=$request->input('dateN');
       $pt->lieuNaiss=$request->input('lieuN');
       $pt->dateStat=$request->input('dateSta');

       $pt->save();
       Session::flash('statuscode','info');
        return redirect('patient')->with('status','patient ajouté avec succès');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
    {
        $pt = Patient::find($id);
        $ht = RendezVou::all();
        $md = Medecin::all();
        
            return view('patient.show',['list' =>$pt,'rv'=>$ht,'med'=>$md]);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $patient = Patient::find($id);
        $wilay = LienNaissance::all();
        
        return view('patient.edit',['patient' =>$patient,'wilaya' => $wilay]);
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
        $this->validate($request, array(
            'nni'=>'size:10|required|unique:medecins|unique:patients,nni,'.$id,
            'numTelephone'=>'size:8|required|unique:medecins|unique:patients,numTelephone,'.$id,
            /*'dateN' => 'regex:/^ (0?[1-9]|[12][0-9]|3[01]) [\/] (0?[1-9] | 1[012]) [\/] \d{4} $/i'*/
            'dateN' => 'required|date|date_format:Y-m-d',
        ),
        [
            'nni.size'=> 'Ce champ doit comporter exactement 10 chiffres',
            'nni.unique'=> "Ce numéro nationale d'identité est déjà existe",
            'nni.required'=> "nni est obligatoire",

            'numTelephone.size'=> 'Ce champ doit comporter exactement 8 chiffres',
            'numTelephone.unique'=> "Ce numéro du téléphone est déjà existe",
            'numTelephone.required'=> "le numéro du téléphone est obligatoire",

            'dateN.date' => 'le  format du date est invalid',
            'dateN.date_format' => 'le  format du date est invalid',
        ]);

        $dt = $request->input('dateN');
         $aj = date('Y-m-d');
        $dif = date_diff(date_create($dt), date_create($aj));

        $pt = Patient::find($id);
        $pt->nom=$request->input('nom');
        $pt->prenom=$request->input('prenom');
        $pt->genre=$request->input('genre');
        $pt->age= $dif->format('%y');
        $pt->nni=$request->input('nni');
        $pt->numTelephone=$request->input('numTelephone');
        $pt->dateNaiss=$request->input('dateN');
        $pt->lieuNaiss=$request->input('lieuN');
 
        $pt->save();
        Session::flash('statuscode','info');
         return redirect('patient')->with('status','patient modifié avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        #supprssion du rendez-vous

        $rv = $rv = RendezVou::where('idPatient','=', $id)->get();
        foreach($rv as $rendv){
            $rendv->delete();
            
        }
            #Suppression de l'historique du rendez-vous

        $rv = $rv = HistoriquesRenvezVou::where('idPatient','=', $id)->get();
        foreach($rv as $rendv){
            $rendv->delete();
            
        }

            #Suppression du patientt
        DB::table('patients')->where('id', $id)->delete();

        
        

        Session::flash('statuscode','error');
        return redirect('patient')->with('status','patient supprimer avec succès');
    }
    

}
