@extends('layouts.nav')

@section('content')
    
<div class="container" style="margin-top:20px;">
  <h3>Edo Recipes</h3>
  <div class="row">
      @foreach ($edoRecipes as $recipe)
      <div class="col-md-3" style="margin-top: 10px;">
      <img src="/storage/food/{{ $recipe->image }}" alt="{{ $recipe->title }}" style="width:100%; height: 220px;">
      <div class="alert alert-default">
      <h5>{{ $recipe->title }}</h5> <br>
   
      <p><a class="btn btn-primary btn" href="{{ route('food-details', $recipe->id)}}" role="button">Read More</a></p>
      </div>
     </div>
   @endforeach
  </div>


  {{ $edoRecipes->links() }}
</div>


  @include('inc.footer')
@endsection