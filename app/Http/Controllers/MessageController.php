<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Listing;
use App\User;
use Mail;
use \Auth;
use DB;

class MessageController extends Controller
{
    public function index() {
        $books = DB::select("SELECT * FROM sales JOIN listings ON sales.listingId = listings.id WHERE buyerId = ? OR listings.userId = ?",[Auth::user()->id, Auth::user()->id]);
        return view('mail.messages')->with('books', $books);
    }

    public function message($id) {
        $message = DB::select("SELECT * FROM messages JOIN users ON messages.userId = users.id WHERE listingId = ?", [$id]);
        return view('mail.showMessage')->with('messages', $message);
    }

    public function addMessage($id, Request $request) {
        DB::insert("INSERT INTO messages(userId, listingId, message) VALUES (?, ?, ?)", [Auth::user()->id, $id, $request->input('msg')]);
        return redirect()->to('/messages/' . $id);
    }

    public function fillForm($id, Request $request) {
        //Find seller of listing
        $listing = Listing::find($id);
        $findSeller = $listing->userId;
        $user = User::find($findSeller);
        
        //Get form data
        $time = $request->input('meet');
        $dat = $request->input('date');
        $msg = $request->input('msg');
        $tel = $request->input('tel');
        $loc = $request->input('loc');


        $data = [
            'book' => $listing->name,
            'buyerName' => Auth::user()->name,
            'time' => $time,
            'dat' => $dat,
            'msg' => $msg,
            'tel' => $tel,
            'loc' => $loc
        ];

        DB::insert("INSERT INTO sales (buyerId, listingId) VALUES (?, ?)", [Auth::user()->id, $id]);

        Mail::send('mail.template', ['user' => $user, 'listing' => $listing, 'data' => $data], function ($m) use ($user, $listing, $data) {
            $m->to($user->email, $user->name)->subject('[Buyer Found] ' . $listing->name);
        });

        return redirect()->to('/')->with('success', 'success');
    }
}
