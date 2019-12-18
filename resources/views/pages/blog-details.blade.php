@extends('layouts.app')

@section('content') 
<div class="container" style="margin-top: 30px;">
 <div class="row">

  <div class="col-md-8" style="margin: auto;">
  <a class="btn tn-default" style="background-color: #fff; box-shadow: 0px 0px 20px 12px rgba(84, 112, 236, 0.46);" href="{{ route('index')}}">Go Back</a>
   <hr>
      <div class="card" style="background-color: #fff; box-shadow: 0px 0px 20px 12px rgba(84, 112, 236, 0.46);">
          <div class="card-header" style="background-color: #fff; border:none;"><h4>{{ $blogDetails->title }}</h4></div>
              <div class="card-body">
                    <img src="/storage/blog/{{$blogDetails->image}}" alt="" style="width: 100%; height: 500px;">
                <hr>
                <div class="alert alert-default">
                <span>Created On</span> <span style="float: right;">{{ $blogDetails->created_at->toFormattedDateString() }}</span>
                </div>  
                 <div class="alert alert-info">
                   <h3>Details</h3> <hr>
                   <p>{!! $blogDetails->details !!}</p>
                </div> 
             
              <hr>
             
                </div>
          </div>
      </div>
  
 
   
</div>

 </div>
</div> <br><br>

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