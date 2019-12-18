@extends('layouts.app')

@section('content')
<div class="container">
          <div class="row">
            <div class="col-md-6">
                    <h5><strong>{{ $newsDetails->title }}</strong></h5>
                    <img src="/storage/newsImage/{{ $newsDetails->image }}" alt="{{ $newsDetails->title }}" style="width: 100%; height: 400px;">
                    <span></span>
                    <hr>
                    <p>{!! $newsDetails->body !!}</p>
            </div>
        <div class="col-md-5 nested">
           <div class="related"><h4>Related News</h4></div>
           @if (count($relatedNews) > 0)
           @foreach ($relatedNews as $news)
           <div class="image">
           <img src="/storage/newsImage/{{ $news->image }}" alt="" style="width: 100%; height: 100%;">
           </div>
           <div class="content">
               <p>
                    <h6 style="padding-left:5px;"><strong>{{ $news->title }}</strong></h6>
                    {!! str_Limit($news->body, 60) !!} <br>
                    <a href="{{ $news->path()}}">Read More</a>
               </p>
           </div>
           @endforeach
           @else 
           <p>No related News</p>
           @endif
        </div>
    </div>
 </div>
@endsection

<style>
        .grid-container {
            display: grid;
            grid-template-columns: 1fr 1fr;
            grid-column-gap: 20px;
           
            /* grid-auto-rows: minmax(100px, auto); */
        }
      .nested {
          display: grid;
          grid-template-columns: 1fr 2fr;
          height:70px;
          grid-gap: 20px;
     
      }
      .image {
          height: 100px;
      }

      .related {
          grid-column: 1/3;
          grid-row: 1/1;
        
      }
   
    </style>