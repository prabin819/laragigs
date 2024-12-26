<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

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

    //show create form
    public function create(){
        return view('listings.create');
    }


    //store listing data
    public function store(Request $request){//dependency injection
        //dd($request->all());
        $fromFields = $request->validate([
            'title' => 'required',
            'company' => ['required', Rule::unique('listings','company')],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required'
        ], [
            'title.required' => 'The title field is required.',
            'company.required' => 'Please provide a company name.',
            'company.unique' => 'This company already exists.',
            'email.email' => 'Please enter a valid email address.',
            'description.required' => 'The description is required.'
        ]);

        Listing::create($fromFields);

        return redirect('/')->with('message','Listing Created successfully.');
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

