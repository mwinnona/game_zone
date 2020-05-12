<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
   /* public function __construct()
    {
        $this->middleware('auth');
    }*/

    public function show()
    {   
              
        //$users = Auth::user()->first();
         return view('users.user');
               
    }
}
