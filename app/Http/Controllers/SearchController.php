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
    public function search()
    {
        $search = $_GET['searchReq'];
        $booklistings =  DB::select("select * from listings where isbn like '%$search%' or lower(name) like lower('%$search%') or lower(description) like lower('%$search%') or lower(edition) like lower('%$search%') ");
        $subjects = DB::table('Categorys')->pluck('subject');
        return view('listing.index',[
            'booklistings'=>$booklistings,
            'subjects' => $subjects
            ]);

    }
}
