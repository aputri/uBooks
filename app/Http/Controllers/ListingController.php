<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

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

    public function addListing()
    {
        $title = $_GET['title'];
        $isbn = $_GET['isbn'];
        $price = $_GET['price'];
        $pubDate = $_GET['pubDate'];

        DB::insert('insert into listings(userId, name, isbn, price) values(?, ?, ?, ?, ?)',
            [1, $title,$isbn, ]);
        //todo selct user ids from users table using session vars
        $booklistings = DB::select('select * from listings');

        return view('index')->with('booklistings', $booklistings);

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
}
