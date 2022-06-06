<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Coli;
use App\Client;
class Colis extends Controller
{
    // get colis list
    public function Lists(Request $request){
        $colis = Coli::all();
        return array('colis' => $colis);
   }

   // get signle Coli
   public function Coli(Request $request,$id){
       $colis = Coli::findOrFail($id);
       $client = Client::findOrfail($colis->client_id);
       $client->map_url = 'https://maps.google.com/maps?q='.$client->adresse.'&t=&z=13&ie=UTF8&iwloc=&output=embed';
       $colis->client = $client;
       return $colis;
  }

  public function SetColisStatut(Request $request,$id){
    $colis = Coli::findOrFail($id);
    $colis->statut=$request->get('statut');
    $colis->save();
    return json_encode(array('msg'=> "Colis a jour"));
  }

  public function searchColis(Request $request,$statut,$name=false){

    if($statut=='tout'){
        $colis = Coli::where('nom', 'like' ,'%'.$name.'%')->get();
    }else{
        if($name != ''){
            $colis = Coli::where('nom', 'like' ,'%'.$name.'%')->where('statut','like',$statut)->get();
        }else{
            $colis = Coli::where('statut','like',$statut)->get();
        }
    }
    
    return array('colis' => $colis);
  }

  
}