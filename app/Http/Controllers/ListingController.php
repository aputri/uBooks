<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Listing;
use DB;

class ListingController extends Controller
{
    public function index(){
    	$booklistings = DB::select('select * from listings');

    	return view('index')->with('booklistings', $booklistings);
    }

//    public function showlisting(Listing $listing){
//
//    	return view('listing')->with('listing', $listing);
//
//    }

    public function getListing($id){
        //returns the book info assuming the book id is given in the URL
        $result = DB::select('select * from listings where id=?',[$id]);
        //send $result to the view 'listing' and go there
        return view('listing',['result'=>$result]);
    }
}
