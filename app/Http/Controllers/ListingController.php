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

    public function showCategoryOnly(){
        $cat_id = 0;
        try {
            $cat_id = $_GET['categories'];
        }catch(\Exception $e){

        }
        if($cat_id == 0){
            $booklistings = DB::select('select * from listings');
        }else {
            $booklistings = DB::select('select * from listings where catId =?', [$cat_id]);
        }
        return view('index')->with('booklistings', $booklistings);
    }

    public function showlisting(Listing $listing){

    	return view('listing')->with('listing', $listing);

    }
}
