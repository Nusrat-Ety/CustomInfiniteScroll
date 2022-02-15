<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
   public function userlist(Request $request){
       $users= User::paginate(10);
       if($request->ajax()){
           $view=view('data',compact('users'))->render();
           return response()->json(['html'=>$view]);

       }
       return view('welcome',compact('users'));
   }
}
