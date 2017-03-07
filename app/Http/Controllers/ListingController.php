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

    public function showlisting(Listing $listing){

    	return view('listing')->with('listing', $listing);

    }
}
