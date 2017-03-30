<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Listing;
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

    //Deletes listings after 30 days.
    public function expiryListing(Listing $listing){
        DB::delete('DELETE FROM listings WHERE created_at < DATEADD(DAY, -30, GETDATE())'. [$listing->catID]);
    }

    //Changes expiry date listing to today's date when renewed (extends to another 30 days).
    //Will change where clause to only happen when users choose to renew listing (changes expiry date after 29 days for now).
    public function changeExpiryDate(Listing $listing){
        DB::update('UPDATE listings SET created_at = GETDATE() WHERE $listing < DATEADD(DAY, -29, GETDATE()'. [$listing->catID]);
    }

}
