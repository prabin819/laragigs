<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    // show all listings
    public function index(){

        //dd(request('tag'));

        return view('listings.index', [
            //'listings' => Listing::show()
            //'listings' => Listing::latest()->get()  //sorted by the latest
            'listings' => Listing::latest()->filter(request(['tag','search']))->get()
        ]);
    }

    // show single listing
    public function show(Listing $listing){
        return view('listings.show', [
            'listing' => $listing
        ]);
    }
}

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