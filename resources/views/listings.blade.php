@extends('layout')

@section('content')

    <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">
        @unless (count($listings) == 0)
        @foreach($listings as $listing)
            <a href="/listings/{{ $listing['id'] }}"><h2>{{ $listing['title'] }}</h2></a>
            <p>{{ $listing['description'] }}</p>
        @endforeach
        @else
        <p>No listings found</p>
        @endunless
    </div>

@endsection