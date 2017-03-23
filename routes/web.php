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
Route::get('done', 'ListingController@store');
//Route::get('category/{catId}', 'ListingController@showCategoryOnly');
Route::get('/category', 'ListingController@showCategoryOnly');

//login
Auth::routes();
Route::get('/home', 'HomeController@index');

//facebook
Route::get('/redirect', 'SocialAuthController@redirect');
Route::get('/callback', 'SocialAuthController@callback');

//admin

Route::get('/administration', 'AdministrationController@showAdmin');
Route::get('/administration/{user}', 'AdministrationController@deleteUser');