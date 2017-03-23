<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use DB;

use \Auth;

class AdministrationController extends Controller
{
    public function showAdmin(){
    	if(Auth::user()->admin){
    		$users = DB::select('select * from users');
    		return view('administration')->with('users', $users);
    	}
    	return redirect('/');
    }

    //Deletes user from users DB. Does not perma ban them.
    public function deleteUser(User $user){
    	DB::delete('DELETE FROM users WHERE id =?', [$user->id]);
    	return redirect('administration');
    }

    public function banUser(User $user){
    	DB::update('UPDATE users SET banned = TRUE WHERE id =?', [$user->id]);
    	return redirect('administration');
    }

}
