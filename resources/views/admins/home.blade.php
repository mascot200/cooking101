@extends('layouts.admin')

@section('content') 
<div class="container-fluid">
 <div class="row">
  @include('inc.admin-sidebar')
  
  <div class="col-md-9 main" style=" margin-top: 50px; margin-left: 10px; background-color: #fff; box-shadow: 0px 0px 20px 12px rgba(84, 112, 236, 0.46);">
  <h4 style="padding-top: 20px;">All Food ({{ count($food)}} )</h4>
  <p> <a class="btn btn-primary" href="{{ route('add-food') }}">Add Food</a> </p>

  <table class="table table-white">
        <thead>
        <tr>
          <th>SN</th>
          <th>Image</th>
          <th>Title</th>
          <th>Published On</th>
          <th>Actions</th>
        
        </tr>
        </thead>
        <tbody>
        @foreach ($food as $meal)
          <tr>
          <td></td>
          <td><img src="/storage/food/{{ $meal->image }}" alt="" style="height: 50px; weight: 50px;"> </td>
          <td>{{ $meal->title }}</td>
          <td>{{ $meal->created_at->toFormattedDateString() }}</td>
          <td> <a  href="{{ route('view-food', $meal->id)}}"><i class="far fa-eye"></i>View </a> </td>
          <td> <a  href="{{ route('edit-food', $meal->id)}}"><i class="fas fa-pen"></i>Edit </a></td>
          <td> 
          <form action="{{ route('delete-food', $meal->id )}}" method="POST">
              @csrf 
              @method('DELETE')
              <input type="hidden" name="_method" value="DELETE">
              <input type="submit" class=" btn btn-danger" value="Del">
              
             
            </form>
          </tr> 
         @endforeach
       
         
        </tbody>
  </table>
  
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
</style>