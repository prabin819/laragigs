<?php

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListingController;

/*
// Route::get('/hello', function () {
    //     return 'Hello world';
// });

// Route::get('/hello', function () {
    //     return response('<h1>Hello word</h1>');
    // });
    
    // Route::get('/hello', function () {
        //     return response('<h1>Hello wordddddddddd</h1>',404);
        // });
        
        // Route::get('/hello', function () {
//     return response('<h1>Hello worrrrrd</h1>')
//         ->header('Content-Type','text/plain')//dosent render <h1> since text/plain
//         ->header('foo','bar'); // custom header values
// });

// Route::get('/posts/{id}', function ($id) {
    //     return response('Post ' . $id);
    // });
    
    // Route::get('/posts/{id}', function ($id) {  //adding constraints to id
    //     return response('Post ' . $id);
    // })->where('id','[0-9]+');       //second part is just a regular expression
    
    // //helper methods
    // //1. dd (die and dump)
    // //2. ddd (die dump and debug)
    
    
    // //getting query parameters
    // Route::get('/search', function (Request $request) {
//     //dd($request);
//     return $request->name . ' ' . $request->city;  //  /search?name=Prabin&city=Kathmandu
// });
*/

//All listings
Route::get('/', [ListingController::class, 'index']);


/*
// //single listing->gives error if id which is not present is given
// Route::get('/listings/{id}', function ($id) {
//     return view('listing', [
//         'listing' => Listing::find($id)
//     ]);
// });


// //remedy
// Route::get('/listings/{id}', function ($id) {

//     $listing = Listing::find($id);

//     if($listing){
//         return view('listing', [
//             'listing' => $listing
//         ]);
//     }else{
//         abort('404');
//     }

// });
*/

//remedy->instead we can do this
//called ROUTE MODEL BINDING

/*
common resource routes:
index - show all listings
show - show single listing
create - show form to create new listing
store - store new listing
edit - show form to edit listing
update - update listing
destroy - delete listing
*/

//show create form
Route::get('/listings/create', [ListingController::class, 'create']);

//store listing data
Route::post('/listings', [ListingController::class, 'store']);

//show edit form
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit']);//route model binding

//update listing
Route::put('/listings/{listing}', [ListingController::class, 'update']);

//delete listing
Route::delete('/listings/{listing}', [ListingController::class, 'destroy']);

//single listing
Route::get('/listings/{listing}', [ListingController::class, 'show']);

//show register create-form
Route::get('/register', [UserController::class, 'create']);

//Create new user
Route::post('/users', [UserController::class, 'store']);

//log user out
Route::post('/logout', [UserController::class, 'logout']);