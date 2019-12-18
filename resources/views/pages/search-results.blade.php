@extends('layouts.nav')

@section('content')
    
<div class="container" style="margin-top:20px;">
<h3>Search Result for {{ $searchWord }} ({{ $countResults}})</h3>
  <div class="row">
      @if (count($searchResults) > 0 )
      @foreach ($searchResults as $recipe)
      <div class="col-md-3" style="margin-top: 10px;">
      <img src="/storage/food/{{ $recipe->image }}" alt="{{ $recipe->title }}" style="width:100%; height: 220px;">
      <div class="alert alert-default">
      <h5>{{ $recipe->title }}</h5> <br>

      <p><a class="btn btn-primary btn" href="{{ route('food-details', $recipe->id)}}" role="button">Read More</a></p>
      </div>
     </div>
   @endforeach
      @else
          <div class="alert alert-info">
          <p>No result found for {{ $searchWord }}</p>
          </div>
      @endif
     
  </div>

</div>


  @include('inc.footer')
@endsection