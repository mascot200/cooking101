@extends('layouts.admin')

@section('content')
 <div class="container-fluid">
  <div class="row">
    @include('inc.admin-sidebar')


    <div class="col-md-8" style="margin-top: 50px; margin-left: 10px;">
    @include('inc.flash-messages')
            <div class="card">
                <div class="card-header" style="text-align:center; background-color: #fff;">Add Food</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('save-food') }}" enctype="multipart/form-data">
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
                                    <div class="col-md-6">
                                            <label for="">Ingredients</label>
                                          <input type="text" name="ingredients" class="form-control">
                                    </div>
    
                                    <div class="col-md-6">
                                        <label for="">Video</label>
                                      <input type="file" name="video" class="form-control">
                                </div>
                                </div>
    
    
    
           
    
                                <div class="form-group row">
                                    <div class="col-md-6">
                                            <label for="">Nutritive Values</label>
                                          <input type="text" name="nutritive_values" class="form-control">
                                    </div>
    
                                    <div class="col-md-6">
                                        <label for="">Time</label>
                                      <input type="text" name="time" class="form-control">
                                </div>
                                </div>
    
                                <div class="form-group row">
                                     <div class="col-md-12">
                                         <select name="tribe" class="form-control" id="">
                                             <option value="">Select Tribe</option>
                                             <option value="edo">Edo Recipe</option>
                                             <option value="igbo">Igbo Recipe</option>
                                         </select>
                                     </div>
                                </div>
    
    
                                <div class="form-group row">
                                        <div class="col-md-12">
                                                <label for="">Details</label>
                                               <textarea name="details"  id="details" class="form-control" cols="30" rows="10"></textarea>
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
