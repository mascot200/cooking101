@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-5" style="margin:auto; margin-top:20px;">
                <div class="card">
                    <div class="card-header">Add Recipe</div>
                        <div class="card-body">
                                <form method="POST" action="{{ route('save-recipe') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group row">
                                        <div class="col-md-6">
                                                <label for="">Title</label>
                                                <input type="text" name="title" class="form-control">
                                        </div>
                
                                        <div class="col-md-6">
                                                <label for="">Image</label>
                                                <input type="file" name="image" class="form-control">
                                        </div>
                                    </div>
                
                                    <div class="form-group row">
                                            <div class="col-md-12">
                                                    <label for="">Ingredients</label>
                                                   <textarea name="ingredients" class="form-control" cols="30" rows="10"></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                    <div class="col-md-8">
                                                            <button type="submit" class="btn btn-primary">
                                                               Save
                                                            </button>
                                                    </div>
                                            </div>
                                        </div>
                                </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection