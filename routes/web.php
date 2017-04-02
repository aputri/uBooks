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
Route::get('/category', 'ListingController@showCategoryOnly');
Route::post('/listing/report/{id}', 'ListingController@fileReport');

//login
Auth::routes();
Route::get('/home', 'HomeController@index');

//facebook
Route::get('/redirect', 'SocialAuthController@redirect');
Route::get('/callback', 'SocialAuthController@callback');

//admin
Route::get('/administration', 'AdministrationController@showAdmin');
Route::get('/administration/{user}', 'AdministrationController@deleteUser');
Route::get('/administration/deletePost/{id}', 'AdministrationController@deletePost');
Route::get('/administration/ban/{user}', 'AdministrationController@banUser');
Route::post('/administration/changePass/{user}', 'AdministrationController@changePass');


//profile
Route::get('/profile', 'UserController@getInfo');
Route::post('/profile/editInfo', "UserController@changeInfo");
Route::post('/profile/changePass', 'UserController@changePassword');

//messaging

Route::post('/listing/contact/{id}', 'MessageController@fillForm');
Route::get('/messages', 'MessageController@index');
Route::get('/messages/{id}', 'MessageController@message');
Route::post('/messages/{id}/add', 'MessageController@addMessage');