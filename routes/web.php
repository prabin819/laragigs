<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Listing;


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


//All listings
Route::get('/', function () {
    return view('listings', [
        'heading' => 'Latest Listings',
        'listings' => Listing::all()
    ]);
});

//single listing
Route::get('/listings/{id}', function ($id) {
    return view('listing', [
        'listing' => Listing::find($id)
    ]);
});
