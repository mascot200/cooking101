@extends('layouts.admin')

@section('content') 
<div class="container-fluid">
 <div class="row">
  @include('inc.admin-sidebar')
  
  <div class="col-md-9 main" style=" margin-top: 50px; margin-left: 10px; background-color: #fff; box-shadow: 0px 0px 20px 12px rgba(84, 112, 236, 0.46);">
   @include('inc.flash-messages')
    <h4 style="padding-top: 20px;">All Users ({{ count($users)}})</h4>
  <p> <a class="btn btn-primary" href="{{ route('add-user') }}">Add User</a> </p>
  
      @if(count($users) >0)
  <table class="table table-white">
        <thead>
        <tr>
          <th>SN</th>
          <th>Fullname</th>
          <th>Email</th>
          <th>Joined On</th>
          <th>User Type</th>
          <th>Role</th>
          <th>Actions</th>
        
        </tr>
        </thead>
        <tbody>
          @foreach ($users as $user)
          <tr>
          <td>{{ $sn++ }}</td>
          <td>{{ $user->name }}</td>
          <td>{{ $user->email }}</td>
          <td>{{ $user->created_at->toFormattedDateString() }}</td>
          <td>{{ $user->user_type }}</td>
          <td>{{ $user->role_id }}</td>
          @if($user->user_type == "Admin")
          <td> 
                <form action="{{ route('make-user', $user->id) }}" method="POST">
                  @csrf 
                  @method('PUT')
                  <input type="hidden" name="_method" value="PUT">
                  <input type="submit" class=" btn btn-primary" value="Make User">
                </form>
              </td>
            @else 
            <td> 
                <form action="{{ route('make-admin', $user->id) }}" method="POST">
                  @csrf 
                  @method('PUT')
                  <input type="hidden" name="_method" value="PUT">
                  <input type="submit" class=" btn btn-primary" value="Make Admin">
                </form>
              </td>
          @endif
          <td> 
            <form action="{{ route('delete-user', $user->id) }}" method="POST">
              @csrf 
              @method('DELETE')
              <input type="hidden" name="_method" value="DELETE">
              <input type="submit" class=" btn btn-danger" value="Del">
            </form>
          </td>
          </tr> 
          @endforeach
         
        </tbody>
  </table>
    @else 
    <p>No news published</p>
    @endif
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