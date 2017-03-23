<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\User;

class UserController extends Controller
{
    public function getInfo($id){
        $info = User::find($id);
        return view('editAccount')->with('user', $info);
    }

}
