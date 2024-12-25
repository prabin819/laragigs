<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


// Route::get('/posts', function(){    //  /api/posts
//     return response()->json([
//         'posts' => [
//             [
//                 'title' => 'Post One'
//             ]
//         ]
//     ]);
// });