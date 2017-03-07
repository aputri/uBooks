<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
// 	$people = ['Duncan', 'Kanye West', 'Jesus'];
// 	return view('welcome')->with('people', $people);
// });

Route::get('/', 'ListingController@index');


//in this case /listing is where the book is going to be shown
// Route::get('/listing/{id}',function($id){

//     //returns the book info assuming:
//     //book id is given in the URL
//     //id uniquely identifies the book
//     $result = DB::select('select * from books where id=?',[$id]);
//     //send $result to the view 'listing' and go there
//     return view('listing',['result'=>$result]);

Route::get('/{listing}', 'ListingController@showlisting');

