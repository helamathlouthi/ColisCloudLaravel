<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reclamation;
class ReclamationsController extends Controller
{
    // Store reclamation

    public function Store(Request $request){
        $user = $user = auth()->user();
        $reclamation = new Reclamation;
        $reclamation->sujet= $request->get('sujet');
        $reclamation->description= $request->get('description');
        $reclamation->user_id = $user->id;
        $reclamation->save();

        return "Ok";
    }
}
