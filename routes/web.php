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

//Listing Controls

Route::get('/', 'ListingController@index');
Route::get('listing/{listing}', 'ListingController@showListing');
Route::get('create', 'ListingController@creation');
//Route::get('category/{catId}', 'ListingController@showCategoryOnly');
Route::get('/category', 'ListingController@showCategoryOnly');

////Route::get('/{listing}', 'ListingController@showlisting');

