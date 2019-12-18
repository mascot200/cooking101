@extends('layouts.admin')

@section('content')
 <div class="container-fluid">
  <div class="row">
    @include('inc.admin-sidebar')


    <div class="col-md-8" style="margin-top: 50px; margin-left: 10px;">
    @include('inc.flash-messages')
            <div class="card">
                <div class="card-header" style="text-align:center; background-color: #fff;">Add New User</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('save-user') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="">Fullname</label>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                               
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                               @enderror
                            </div>

                            <div class="col-md-6">
                                    <label for="">Email</label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6">
                            <label for="">Password</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>

                            <div class="col-md-6">
                                    <label for="">Password</label>
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                    </div>
                        </div>

                        <div class="form-group row">
                                <div class="col-md-12">
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
    
                            </div>

 

                        
                       
                        <div class="form-group">
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-primary">
                                   Save
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
