<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//use Illuminate\Routing\Controller;
use App\Http\Controllers\Controller as Controller;




//use Illuminate\Routing\Controller;
use \Auth;
use App\Listing;
use DB;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $sortby = $request->get('sortby');
        $order = $request->get('order');

        $search = $_GET['searchReq'];

        //$booklistings =  DB::select("select * from listings where isbn like '%$search%' or lower(name) like lower('%$search%') or lower(description) like lower('%$search%') or lower(edition) like lower('%$search%') ");
        $booklistings = Listing::where('name', 'like', '%' . $search . '%')->orWhere('condition', 'like', '%' . strtolower($search) . '%')->orWhere('edition', 'like', '%' . strtolower($search) . '%')->get();
        //orWhere('name', 'like', '%' . Input::get('name') . '%')->get();

        
       
        $subjects = DB::table('Categorys')->pluck('subject');
        return view('listing.index', compact('booklistings', 'sortby', 'order', 'subjects'));

    }
}
