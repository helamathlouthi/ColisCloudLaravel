<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Client;

class Clients extends Controller
{
    // get clients list
    public function Lists(Request $request){
         $clients = Client::all();
         return array('clients' => $clients);
    }

    // get signle Client
    public function Client(Request $request,$id){
        $clients = Client::findOrFail($id);
        
        return $clients;
   }
}
