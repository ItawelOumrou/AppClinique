<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Specialite;
use Illuminate\Support\Facades\Session;

class SpecialitesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $spe = Specialite::all();
        return view('specialite.index',['specialite' =>$spe]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('specialite.create');
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
            'nomSpecialite' => 'unique:specialites'
        ),
        [
            'nomSpecialite.unique' => 'Cette spécialité est dèjà existe'
        ]);
        $spec = new Specialite();
        $spec->nomSpecialite = $request->input('nom');
        $spec->save();
        Session::flash('statuscode','info');
        return redirect('specialite')->with('status','Ajout avec succès');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $var = Specialite::find($id);
        return view('specialite.edit',['specialite' =>$var]);
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
        $var = Specialite::find($id);
        $var->nomSpecialite=$request->input('nomSpecialite');
 
        $var->save();
        Session::flash('statuscode','success');
         return redirect('specialite')->with('status','Modification avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $spe = Specialite::find($id);
        $spe->delete();
        Session::flash('statuscode','error');
        return redirect('specialite')->with('status','Suppression avec succès');
    }
}
