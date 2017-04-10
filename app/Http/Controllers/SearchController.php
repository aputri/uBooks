<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
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

        //$search = $_GET['searchReq'];
        //this way allows me to flash the value from the next page for sorting
        if(Input::get('searchReq')){
            $search = Input::get('searchReq');
        } else { 
            $search = $request->get('searchReq');
        }
       

        if ($sortby && $order) {
            $booklistings = Listing::where('name', 'like', '%' . $search . '%')->orWhere('description', 'like', '%' . strtolower($search) . '%')->orWhere('edition', 'like', '%' . strtolower($search) . '%')->orWhere('courseInfo', 'like', '%' . strtolower($search) . '%')->orderBy($sortby, $order)->get();
        } else {
            $booklistings = Listing::where('name', 'like', '%' . $search . '%')->orWhere('description', 'like', '%' . strtolower($search) . '%')->orWhere('edition', 'like', '%' . strtolower($search) . '%')->orWhere('courseInfo', 'like', '%' . strtolower($search) . '%')->get();
        }

        //$booklistings =  DB::select("select * from listings where isbn like '%$search%' or lower(name) like lower('%$search%') or lower(description) like lower('%$search%') or lower(edition) like lower('%$search%') ");
        //$booklistings = Listing::where('name', 'like', '%' . $search . '%')->orWhere('condition', 'like', '%' . strtolower($search) . '%')->orWhere('edition', 'like', '%' . strtolower($search) . '%')->orderBy('price', 'asc')->get();
        //orWhere('name', 'like', '%' . Input::get('name') . '%')->get();

        
       
        $subjects = DB::table('Categories')->pluck('subject');
        return view('listing.index', compact('booklistings', 'sortby', 'order', 'subjects', 'search'));

    }
}
