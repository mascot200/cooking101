@extends('layouts.admin')

@section('content')
 <div class="container-fluid">
  <div class="row">
    @include('inc.admin-sidebar')


    <div class="col-md-8" style="margin-top: 50px; margin-left: 10px;">
    @include('inc.flash-messages')
            <div class="card">
            <div class="card-header" style="text-align:center; background-color: #fff;">Edit ({{ $userToEdit->name }})</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('save-edit-user', $userToEdit->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="_method" value="PUT">
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="">Fullname</label>
                            <input id="name" type="text" value="{{ $userToEdit->name }}" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"  autocomplete="name" autofocus disabled>
                            </div>

                            <div class="col-md-6">
                                    <label for="">User Type</label>
                            <input id="name" type="text" value="{{ $userToEdit->user_type }}"  class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"  autocomplete="name" autofocus disabled>
                                </div>
                        </div>

                        <div class="form-group row">
                                <div class="col-md-6">
                                    <label for="">User Type</label>
                                    <select name="user_type" id="user_type" class="form-control">
                                        <option>User</option>
                                        <option>Admin</option>
                                    </select>
                                   
                                    @error('user_type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                   @enderror
                                </div>
    
                                <div class="col-md-6">
                                        <label for="">User Role</label>
                                       <select name="user_role" id="user_role" class="form-control">
                                        @foreach ($user_roles as $role)
                                       <option value="{{ $role->id}}">{{ $role->role_name }}</option>
                                        @endforeach
                                       </select>
    
                                    @error('user_role')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    </div>
                            </div>

 

                        
                       
                        <div class="form-group">
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-primary">
                                   Make Admin
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
  </div>
 </div>
@endsection
<script>
    CKEDITOR.replace( 'summary-ckeditor' );
</script>
<style>
.card {
    background-color: #fff;
    box-shadow: 3px 4px 17px 0px #360a9a;
}
</style>
