@extends('layouts.app')

@section('content')
    
<div class="container" style="margin-top:20px;">
  <h3>Blog post on healthy diets</h3>
  <div class="row">
      @foreach ($foodBlogs as $blog)
      <div class="col-md-3" style="margin-top: 10px;">
      <img src="/storage/blog/{{ $blog->image }}" alt="{{ $blog->title }}" style="width:100%; height: 220px;">
      <div class="alert alert-default">
      <h5>{{ $blog->title }}</h5> <br>
      <span>Created On</span> <span>{{ $blog->created_at->toFormattedDateString() }}</span>
      <p><a class="btn btn-primary btn" href="{{ route('blog-details', $blog->id)}}" role="button">Read More</a></p>
      </div>
     </div>
   @endforeach
  </div>

  {{ $foodBlogs->links() }}
</div>


  @include('inc.footer')
@endsection