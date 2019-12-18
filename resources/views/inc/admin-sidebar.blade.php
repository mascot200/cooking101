<div class="col-md-2 admin-sidebar">
   <h4 style="text-align:center;"> <a style="text-decoration: none;" href="{{ route('admin-home')}}"> Dashboard</a></h4> <hr>
   <div class="alert alert-success" style="background-color: #fff; box-shadow: 0px 12px 20px 0px #210aa2;" >
       <form action="" method="GET">
        @csrf
        <div class="form-group row">
                            <div class="col-md-12">
                                <input type="text" class="form-control" placeholder="Search for users" name="find_user"> 
                            </div>
                        </div>
       </form>
      </div>
   <ul style="list-style-type: none;">
     <li style="padding-top: 20px;" ><a style="text-decoration: none; color: gray; font-size: 15px;"  href="{{ route('all-food')}}">Food</a></li>
     <li style="padding-top: 20px;" ><a style="text-decoration: none; color: gray; font-size: 15px;"  href="{{ route('admin-users')}}">Users</a></li>
     <hr>
     <li style="padding-top: 20px;" ><a style="text-decoration: none; color: gray; font-size: 15px;"  href="/home">Visit Site</a></li>
      <hr>
     <li>
       <a class="btn btn-info" style="background-color: blue; border: none; color: #fff;" href="{{ route('logout') }}"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
           {{ __('Logout') }}
       </a>

       <form id="logout-form" action="{{ route('logout') }}" method="POST">
           @csrf
       </form>
     </li>

   </ul>
</div>

<style>
.search {
    background-color: #fff;
    box-shadow: 0px 12px 20px 0px #210aa2;
}
</style>
