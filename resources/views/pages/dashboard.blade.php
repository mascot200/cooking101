@extends('layouts.nav')

@section('content')
<div class="container" style="margin-top:30px;">
   
    <div class="row">
        <div class="col-md-6" style="margin:auto;">
                <h4>Manage your dashboard</h4> <br>
            @include('inc.flash-messages')
            @if(count($foods) > 0)
                <table class="table">
                        <thead>
                                <tr>
                                        <th>Sn</th>
                                        <th>Image</th>
                                        <th>Title</th>
                                        <th>Created On</th>
                                        <th>Options</th>
                                    </tr>
                        </thead>
                        @foreach ($foods as $food)
                        <tbody>
                                <tr>
                                <td>{{$sn++}}</td>
                                <td><img src="/storage/food/{{$food->image}}" alt="" style="width:50px; height:50px;"></td>
                                <td>{{ $food->title }}</td>
                                <td>{{ $food->created_at->toFormattedDateString()}}</td>
                                <td><a href="{{ route('food-details', $food->id)}}">View</a></td>
                                <td><a href="">Edit</a></td>
                            </tr>
                            </tbody>
                        @endforeach
                    </table>
 
            @else 
            <div class="alert alert-info">
                <p>You have not added any meal yet
                <a style="color: #fff;" class="nav-link" data-toggle="modal" data-target="#addModal"><button style="border-radius: 5px; background-color: #227DC7; border: none; color: #fff;">Upload Recipe</button></a>
                </p>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection