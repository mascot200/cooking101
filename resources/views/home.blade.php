@extends('layouts.nav')


@section('content')
@include('inc.jumbotron')

<div class="container">
    @include('inc.flash-messages')
  <div class="row">
    <div class="col-md-6">
        <h4 class="text-center">Edo Recipes</h4>
        <p>
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Id vitae maxime nihil odit fuga temporibus porro similique amet tempora odio. Aliquam voluptatum delectus expedita tenetur temporibus deleniti sed illo rem.
        </p>
      <p class="text-center"><a class="btn btn-primary btn-lg" href="{{ route('edo-recipes')}}" role="button">View Recipes</a></p>
    </div>

    <div class="col-md-6">
      <h4 class="text-center">Igbo Recipes</h4>
      <p>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur quisquam laboriosam, ducimus, iure aut tempore doloremque veniam fuga, harum inventore delectus praesentium commodi consectetur dignissimos numquam doloribus eos quia magni!
      </p>
    <p class="text-center"><a class="btn btn-primary btn-lg" href="{{ route('igbo-recipes')}}" role="button">View Recipes</a></p>
    </div>
  </div>
</div>



  @include('inc.footer')
@endsection