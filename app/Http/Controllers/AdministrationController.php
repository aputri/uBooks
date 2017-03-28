<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use DB;
use Hash;
use \Auth;

class AdministrationController extends Controller
{
	//returns list of registered accounts from the DB.
    public function showAdmin(){
    	//checks if user is logged in, then checks if they are an admin
    	if (Auth::check()){
    		if(Auth::user()->admin){
    		$users = DB::select('select * from users');
    		return view('admin.administration')->with('users', $users);
    		}
    	} else {
    		return redirect('/');
    	}
    	
    }

    //Deletes user from users DB. Does not perma ban them.
    public function deleteUser(User $user){
        DB::delete('DELETE FROM listings WHERE userId =?', [$user->id]);
    	DB::delete('DELETE FROM users WHERE id =?', [$user->id]);
    	return redirect('/administration');
    }

    //Flags user as banned in the DB.
    public function banUser(User $user){
    	DB::update('UPDATE users SET banned = TRUE WHERE id =?', [$user->id]);
    	return redirect('/administration');
    }
	public function changePass($id){
		$pass = $_POST["password"];
		$user = User::find($id);
		$user->password = Hash::make($pass);
		$user->save();
		return redirect('/administration');
	}

}
