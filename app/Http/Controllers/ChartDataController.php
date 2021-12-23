<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ChartDataController extends Controller
{
	public  function StaticPatient(){
		/* $post = DB::table('patients')->get('*')->toArray();
		 $userData = Patient::select(DB::raw("COUNT(*) as count"))
		   ->whereYear("created_at",date('Y'))
		   ->groupBy(DB::raw("Month(created_at)"))
		   ->pluck('count');
   
		   $userDat = DB::select('SELECT distinct  MONTHNAME(created_at) from patients');
		 foreach($post as $row)
		  {
			 $data[] = array
			  (
			   'label'=>$row->created_at,
			   'y'=>$userData
			  ); 
		  }
		 return view('patient.staticPatient',['data' => $data]);*/
		 //return view('Statistic.statistic');
		 
		 $userData = DB::select(DB::raw("select count(*) as count ,MONTHNAME(created_at) as date from patients 
			 group by MONTHNAME(created_at)"));
 
			 $var = "";
			 foreach($userData as $result){
				 $var .="['".$result->date."',".$result->count."],";
			 }
			 $arr['var']=rtrim($var,",");

			 //Pour les medecins
			 $user= DB::select(DB::raw("select count(*) as count ,MONTHNAME(created_at) as date from medecins
			 group by MONTHNAME(created_at)"));
 
			 $va = "";
			 foreach($user as $resul){
				 $va .="['".$resul->date."',".$resul->count."],";
			 }
			 $ar['vari']=rtrim($va,",");

			 //Pour les rendez-vous
			 $use= DB::select(DB::raw("select count(*) as count ,MONTHNAME(created_at) as date from historiques_renvez_vous
			 group by MONTHNAME(created_at)"));
 
			 $vndv = "";
			 foreach($use as $resu){
				 $vndv .="['".$resu->date."',".$resu->count."],";
			 }
			 $rv['v']=rtrim($vndv,",");
			 
			 return view('Statistic.statistic',$arr,$ar,$rv);
			 
	 }

}