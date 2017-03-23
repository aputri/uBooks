<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\User;
use \Auth;
use Hash;
class UserController extends Controller
{
    public function getInfo(){
        if(Auth::User()){
            $info = User::find(Auth::User()->id);
            return view('auth.editAccount')->with('user', $info);
        }

    }

    public function changeInfo(Request $request){
        $name = $request->input('name');
        $email = $request->input('email');

        $user = User::find(Auth::User()->id);
        $user->name = $name;
        $user->email = $email;
        $user->save();

        return redirect()->to('/profile')->with('saveInfo', 'changed user info');
    }

    public function changePassword(Request $request) {
        $p = $request->input('password');
        $p2 = $request->input('confirmpass');

        $user = User::find(Auth::User()->id);
        $userPass = $user->password;

        if(Hash::check($p, $userPass)) {
            $user->password =  Hash::make($p2);
            $user->save();
            return redirect()->to('/profile')->with('changePass', 'success');
        } else {
            return redirect()->to('/profile')->with('failPass', 'error');
        }
    }
}
