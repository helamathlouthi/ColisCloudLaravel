<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
class Users extends Controller
{
    // get users list
    public function Lists(Request $request){
        $users = User::all();
        return array('users' => $users);
   }

   // get signle user
   public function User(Request $request,$id){
       $users = User::findOrFail($id);
       return $users;
}
}