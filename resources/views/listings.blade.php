<h1>Listings</h1>
<br>
<h1> {{ $heading }}</h1>
<br>
@foreach($listings as $listing)
    <h2>{{ $listing['title'] }}</h2>
    <p>{{ $listing['description'] }}</p>
@endforeach