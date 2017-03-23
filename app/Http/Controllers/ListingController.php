<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Illuminate\Routing\Controller;
use App\Http\Controllers\Controller as Controller;
use Validator;


use App\Listing;
use DB;

class ListingController extends Controller
{
    public function index()
    {
        $booklistings = DB::select('select * from listings');

        return view('index')->with('booklistings', $booklistings);
    }

    public function creation()
    {
        return view('addlisting');
    }



    public function showCategoryOnly()
    {
        $cat_id = 0;
        try {
            $cat_id = $_GET['categories'];
        } catch (\Exception $e) {

        }
        if ($cat_id == 0) {
            $booklistings = DB::select('select * from listings');
        } else {
            $booklistings = DB::select('select * from listings where catId =?', [$cat_id]);
        }
        return view('index')->with('booklistings', $booklistings);
    }

    public function showlisting(Listing $listing)
    {

        return view('listing')->with('listing', $listing);

    }
    public function store(Request $request)
    {
        $listing = new Listing;

        $this->validate($request, [
            'title' => 'required',
            'isbn' => 'required',
            'price' => 'required',
            'edition' => 'required',
            'condition' => 'required',
            'description' => 'required',
        ]);
        $listing->name = $request->title;
        $listing->userId = 1;
        $catId = 1;
        $listing->catId = $catId;
        $listing->isbn = $request->isbn;
        $listing->price = $request->price;
        $listing->edition = $request->edition;
        $listing->condition = $request->condition;
        $listing->description = $request->description;

        //$listing->pubDate = $request->pubDate;//needs to be added to db
        $listing->save();


        //TODO: selct user ids from users table using session vars
        //$booklistings = DB::select('select * from listings');

        //return view('index')->with('booklistings', $booklistings);
        return $this->index();

    }
}
