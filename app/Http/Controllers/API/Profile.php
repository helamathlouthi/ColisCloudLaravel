<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\user;
class Profile extends Controller
{
// get signle user
public function Profile(Request $request,$id){
    $profile = profile::findOrFail($id);
    return $profile;
}
}