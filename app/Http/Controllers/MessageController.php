<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Listing;
use App\User;
use Mail;
use \Auth;

class MessageController extends Controller
{
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

        Mail::send('mail.template', ['user' => $user, 'listing' => $listing, 'data' => $data], function ($m) use ($user, $listing, $data) {
            $m->to($user->email, $user->name)->subject('[Buyer Found] ' . $listing->name);
        });

        return redirect()->to('/')->with('success', 'success');
    }
}
