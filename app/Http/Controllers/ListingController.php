<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//use Illuminate\Routing\Controller;
use App\Http\Controllers\Controller as Controller;




//use Illuminate\Routing\Controller;
use \Auth;
use App\Listing;
use DB;

class ListingController extends Controller
{
    public function index()
    {
        //checks if user is logged in, then checks if they're banned
        if(Auth::check()){
            if(Auth::user()->banned){
            return view('banned');
            }
        }
        $booklistings = DB::select('select * from listings');
        return view('listing.index')->with('booklistings', $booklistings);
    }

    public function creation()
    {
        return view('listing.addlisting');
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
        return view('listing.index')->with('booklistings', $booklistings);
    }

    public function showlisting(Listing $listing)
    {

        return view('listing.listing')->with('listing', $listing);

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
        $listing->userId = Auth::User()->id;
        $catId = 1;
        $listing->catId = $catId;
        $listing->isbn = $request->isbn;
        $listing->price = $request->price;
        $listing->edition = $request->edition;
        $listing->condition = $request->condition;
        $listing->description = $request->description;
        $listing->imageLink = $request->imageLink;

        $volumeId = $request->volumeId;
        $book = json_decode(file_get_contents('https://www.googleapis.com/books/v1/volumes/'.$volumeId.'?key=AIzaSyA9d3aNH0Nmd7weoAQQ7hOBwNgoYvjh_qQ'), true);

        $priceInfo = $book['saleInfo']['saleability'];
        if($priceInfo == "FOR_SALE"){
            $priceInfo = $book['saleInfo']['listPrice']['amount'];
        } else {
            $priceInfo = -1;
        }
        $listing->retailPrice = $priceInfo;
        //$listing->pubDate = $request->pubDate;//needs to be added to db


        $listing->save();
        $imageName = $listing->id . '.' . $request->file('image')->getClientOriginalExtension();

        $listing->imagePath = $imageName;
        $request->file('image')->move(
            base_path() . '/storage/app/public/', $imageName
        );
        $listing->save();






        //TODO: selct user ids from users table using session vars
        //$booklistings = DB::select('select * from listings');

        //return view('index')->with('booklistings', $booklistings);
        return $this->showlisting($listing);

    }

    public function fileReport($id, Request $request)
    {
        $reason = $request->input('reason');
        DB::insert("INSERT INTO reportedListings(listingId, reason) VALUES (?, ?)", [$id, $reason]);
        DB::table('reportedListings')->increment('reported');

        return redirect()->to('/')->with('reported', 'reported');

    }
}
