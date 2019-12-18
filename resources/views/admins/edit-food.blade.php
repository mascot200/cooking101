@extends('layouts.admin')

@section('content')
 <div class="container-fluid">
  <div class="row">
    @include('inc.admin-sidebar')


    <div class="col-md-9" style="margin-top: 50px; margin-left: 10px;">
    @include('inc.flash-messages')
            <div class="card" style="width: 70%;">
                <div class="card-header" style="text-align:center; background-color: #fff;">Edit ({{ $foodToEdit->title }})</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('save-edit', $foodToEdit->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <input type="hidden" name="_method" value="PUT">

                        {{-- <div class="form-group row">
                            <div class="col-md-12">
                                <label for="">Image</label>
                                <input type="file" class="form-control" name="image"  required>
                            </div>
                        </div> --}}

                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="">Title</label>
                            <input id="title" value="{{ $foodToEdit->title }}" type="text" class="form-control" name="title"  required>
                            </div>

                            <div class="col-md-6">
                                <label for="">Ingredients</label>
                            <input id="title" value="{{ $foodToEdit->ingredients }}" type="text" class="form-control" name="ingredients"  required>
                            </div>
                        </div>


                        <div class="form-group row">
                            <div class="col-md-12">
                            <label for="">Details</label>
                            <textarea class="form-control" id="summary-ckeditor" cols="30" rows="10" name="details">{{ $foodToEdit->details }}</textarea>
                            
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
<style>
.card {
    background-color: #fff;
    box-shadow: 3px 4px 17px 0px #360a9a;
}
</style>
