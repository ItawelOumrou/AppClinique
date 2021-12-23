<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medecin;
use App\Models\Specialite;
use App\Models\rendezVou;
use Illuminate\Support\Facades\Session;

class MedecinsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = Medecin::orderBy('id')->get();
        return view('medecin.index',['list' =>$list]);
    }

    



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $list= Specialite::all();
        return view('medecin.create',['list' =>$list]);
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
            'nni'=>'size:10|unique:medecins|unique:patients|required',
            'numTelephone'=>'size:8|unique:patients|unique:medecins|required',
        ),
        [
            'nni.size'=> 'Ce champ doit comporter exactement 10 chiffres',
            'nni.unique'=> "Ce numéro nationale d'identité est déjà existe",
            'nni.required'=> "nni est obligatoire",

            'numTelephone.size'=> 'Ce champ doit comporter exactement 8 chiffres',
            'numTelephone.unique'=> "Ce numéro du téléphone est déjà existe",
            'numTelephone.required'=> "le numéro du téléphone est obligatoire",
        ]);

        $pt = new Medecin();
        $pt->nom=$request->input('nom');
        $pt->prenom=$request->input('prenom');
        $pt->nni=$request->input('nni');
        $pt->numTelephone=$request->input('numTelephone');
        $pt->specialite=$request->input('specialite');
 
        $pt->save();
        Session::reflash('statuscode','success');
         return redirect('medecin')->with('status',' Médecin ajouté avec succès');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pt = Medecin::find($id);
        
        return view('medecin.show',['list' =>$pt]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $medecin = Medecin::find($id);
        $list= Specialite::all();
        
        return view('medecin.edit',['medecin' =>$medecin],['specialit' =>$list]);
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
            'nni'=>'size:10|required|unique:patients|unique:medecins,nni,'.$id,
            'numTelephone'=>'size:8|required|unique:patients|unique:medecins,numTelephone,'.$id,
        ),
        [
            'nni.size'=> 'Ce champ doit comporter exactement 10 chiffres',
            'nni.unique'=> "Ce numéro nationale d'identité est déjà existe",
            'nni.required'=> "nni est obligatoire",

            'numTelephone.size'=> 'Ce champ doit comporter exactement 8 chiffres',
            'numTelephone.unique'=> "Ce numéro du téléphone est déjà existe",
        ]);
        
        $pt = Medecin::find($id);
        $pt->nom=$request->input('nom');
        $pt->prenom=$request->input('prenom');
        $pt->nni=$request->input('nni');
        $pt->numTelephone=$request->input('numTelephone');
        $pt->specialite=$request->input('specialite');
 
        $pt->save();
        Session::reflash('statuscode','info');
        return redirect('medecin')->with('status',' Médecin modifié avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rv = RendezVou::where('idMedecin','=', $id)->get();
        foreach($rv as $rendv){
            $rendv->delete();
            
        }
        $pt = Medecin::find($id);
        $pt->delete();
        Session::reflash('statuscode','error');
        return redirect('medecin')->with('status',' Médecin supprimer avec succès');
    }

    
}
