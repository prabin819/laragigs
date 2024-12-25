<h1>Listings</h1>
<br>
<h1> {{ $heading }}</h1>
<br>
@foreach($listings as $listing)
    <a href="/listings/{{ $listing['id'] }}"><h2>{{ $listing['title'] }}</h2></a>
    <p>{{ $listing['description'] }}</p>
@endforeach