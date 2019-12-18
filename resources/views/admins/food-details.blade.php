@extends('layouts.admin')

@section('content') 
<div class="container-fluid">
 <div class="row">
  @include('inc.admin-sidebar')

  
  <div class="col-md-7" style="margin-left: 50px; margin-top: 50px;">
  <a class="btn tn-default" style="background-color: #fff; box-shadow: 0px 0px 20px 12px rgba(84, 112, 236, 0.46);" href="{{ route('all-food')}}">Go Back</a>
   <hr>
  @include('inc.flash-messages')
      <div class="card" style="background-color: #fff; box-shadow: 0px 0px 20px 12px rgba(84, 112, 236, 0.46);">
          <div class="card-header" style="background-color: #fff; border:none;"><h4>{{ $foodDetail->title }}</h4></div>
              <div class="card-body">
                    <img src="/storage/food/{{$foodDetail->image}}" alt="" style="width: 100%; height: 500px;">
                <hr>
                <div class="alert alert-default">
                  <h5>Ingredients</h5>
                   <p>{{ $foodDetail->ingredients }}</p>
                </div>  
                 <div class="alert alert-info">
                   <h5>Details</h5>
                   <p>{!! $foodDetail->details !!}</p>
                </div> 
             
              <hr>
             
                </div>
          </div>
      </div>
  
 
   
</div>

 </div>
</div>
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