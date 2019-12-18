@extends('layouts.nav')

@section('content') 
<div class="container" style="margin-top: 30px;">
 <div class="row">
  <div class="col-md-8">
  <a class="btn tn-default" style="background-color: #fff; box-shadow: rgba(84, 112, 236, 0.46) 0px 0px 6px 0px;" href="{{ route('index')}}">Go Back</a>
   <hr>
      <div class="card" style="background-color: #fff; box-shadow: rgba(84, 112, 236, 0.46) 0px 0px 6px 0px;">
          <div class="card-header" style="background-color: #fff; border:none;"><h4>{{ $foodDetails->title }}</h4></div>
              <div class="card-body">
                    <img src="/storage/food/{{$foodDetails->image}}" alt="" style="width: 100%; height: 500px;">
                <hr>
                <div class="alert alert-default">
                  <h5>Ingredients</h5>
                   <p>{{ $foodDetails->ingredients }}</p>
                </div>  
                <div class="alert alert-default">
                    <h5>Nutritive Value</h5>
                <p>{{ $foodDetails->nutritive_values}}</p>
                </div>
                 <div class="alert alert-info">
                   <h3>Directions</h3> <hr>
                   <p>{!! $foodDetails->details !!}</p>
                </div> 
                <div class="alert alert-default">
                  @if ($foodDetails->videos)
                  <video width="100%" controls>
                    <source src="storage/videos/{{ $foodDetails->videos }}" type="video/mp4">
                  </video>
                  @else
                      
                  @endif
                </div>
                <div class="alert alert-default">
                  @if ($foodDetails->videos)
                <a href="{{ route('download-video', $foodDetails->id)}}" class="btn btn-success">Download</a>
              @else
                  
              @endif
                </div>
               <div class="alert alert-sucess">
                 @include('inc.flash-messages')
               <span>Comments({{ count($comments)}})</span>
            
               <form action="{{ route('save-comment', $foodDetails->id)}}" method="POST">
                    @csrf
                      <div class="input-group">
                        <input type="text" name="comment" class="form-control" placeholder="drop your comment or question">
                      </div>
                  </form>
               </div>

               @foreach ($comments as $comment)
                    <div class="alert alert-default">
                      <div>
                      <img src="/storage/profiles/{{$comment->profile_image }}" alt="" style="border-radius:100px; width:50px; height:50px;">
                      <span> By {{ $comment->user_name }}</span> <span style="float:right;">on {{ $comment->created_at->toFormattedDateString()}}</span>
                    </div>
                    <p>
                      {{ $comment->body }}
                    </p>
                    </div>
               @endforeach
              <hr>
             
                </div>
          </div>
      </div>

          
  

   
</div>

 </div>
</div> <br> <br>

@include('inc.footer')
@endsection
<style>
 .table {
    margin-top: 30px;
    background-color: #fff;
    margin-left: 20px;
 }
 .card {
     margin: auto;
     background-color: #fff;
 }

</style>