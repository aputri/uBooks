<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ListingController extends Controller
{
    function getListing($id){
                //returns the book info assuming the book id is given in the URL
            $result = DB::select('select * from listings where id=?',[$id]);

                //send $result to the view 'listing' and go there
            return view('listing',['result'=>$result]);


    }
}
