<div class="jumbotron">
    <div class="container">
      <h1 class="display-3 text-center">j!</h1>
    <form action="{{ route('search')}}" method="GET">
        @csrf
         <div class="input-group">
              <input type="text" name="search" placeholder="Search for recipes here" class="form-control">
               <input type="submit" class="btn btn-primary" value="Search" >
        
         </div>
      </form>
      <p class="text-center">Learn how to cook african dishes here and read food blogs to stay and eat healthy</p>
      <p class="text-center"><a class="btn btn-primary btn-lg" href="#" role="button">Learn more &raquo;</a></p>
    </div>
  </div>

