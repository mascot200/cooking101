
          @if(count($errors)> 0)
            @foreach($errors->all() as $error)
            <div class="container" style="margin-top:2rem;">
            <div class="row">
              <div class="col-md-12" style="margin-auto;">
                <div class="alert alert-danger alert-dismissable fade show" role="alert" style="background-color: #F14C74; color: #fff;">
                   {{$error}}
                   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                   </button>
                </div>
            </div>
            </div>
            </div>
              @endforeach
          @endif

    @if(session('success'))
    <div class="container" style="margin-top:2rem;">
            <div class="row">
            <div class="col-md-12" style="margin-auto;">
        <div class="alert alert-success alert-dismissable fade show" role="alert" style="background-color: #989adc; color: #fff; border:none;">
         {{session('success')}}
         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
        </button>
        </div>
        </div>
        </div>
        </div>
    @endif

    @if(session('error'))
    <div class="container" style="margin-top:2rem;">
            <div class="row">
            <div class="col-md-12" style="margin-auto;">
        <div class="alert alert-danger alert-dismissable fade show" role="alert">
         {{session('error')}}
         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
         </button>
        </div>
        </div>
        </div>
        </div>
    @endif
