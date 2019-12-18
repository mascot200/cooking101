<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Food;
use App\FoodBlog;
use App\User;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
class AdminController extends Controller
{
    
    
    public function home() {
        $page_title = "jacintaFood | Admin Home";
        $food = Food::all();
        return view('admins.home')->with('page_title', $page_title)->with('food', $food);
    }

    public function allFood() {
        $allFood = Food::all();
        $page_title = 'jacintaFood | African dishes';
        return view('admins.all-food', compact('page_title','allFood'));
    }

  
    public function addFood() {
        $page_title = "jacintaFood | Add Food";
        return view('admins.add-food')->with('page_title', $page_title);
    }

    public function foodDetails($id) {
        $foodDetail = Food::findOrFail($id);
        $page_title = 'jacintaFood | '. $foodDetail->title;
        return view('admins.food-details', compact('foodDetail', 'page_title'));
    }

    // Save food to the database
    public function saveFood(Request $request) {
        $this->validate($request, [
            'title' => 'required',
            'details'  => 'required',
            'ingredients' => 'required',
            'image' => 'sometimes|file|image|nullable|max:50000'
        ]);

          // Handles files upload
          if($request->hasFile('image')) {
            // Get filename with extension
                 $filenameWithExt = $request->file('image')->getClientOriginalName();
          
           // Get just filename
                 $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
          // Get jus extension
                 $extension = $request->file('image')->getClientOriginalExtension();
          // Filename to store
                 $imageNameToStore = $filename.'_'.time().'.'.$extension;
          // Upload image
                 $path = $request->file('image')->storeAs('public/food', $imageNameToStore);
                }
                 else {
                  $imageNameToStore = "noimage.jpg";
                 }
      

                    // Handles files upload
          if($request->hasFile('image')) {
            // Get filename with extension
                 $filenameWithExt = $request->file('image')->getClientOriginalName();
          
           // Get just filename
                 $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
          // Get jus extension
                 $extension = $request->file('image')->getClientOriginalExtension();
          // Filename to store
                 $imageNameToStore = $filename.'_'.time().'.'.$extension;
          // Upload image
                 $path = $request->file('image')->storeAs('public/food', $imageNameToStore);
                }
                 else {
                  $imageNameToStore = "noimage.jpg";
                 }
      
        $saveFood = new Food();
        $saveFood->title = $request->input('title');
        $saveFood->image = $imageNameToStore;
        $saveFood->ingredients = $request->input('ingredients');
        $saveFood->user_id = Auth()->user()->id;
        $saveFood->details = $request->input('details');
        $saveFood->videos = $videoToSave;
        $saveFood->nutritive_values = $request->input('nutritive_values');
        $saveFood->save();
        return redirect()->back()->with('success', 'Food added successfully');

    }

   public function editFood($id) {
       $foodToEdit = Food::findOrFail($id);
       $page_title = "jacintaFood |" . " ". $foodToEdit->title;
       return view('admins.edit-food')->with('foodToEdit', $foodToEdit)->with('page_title', $page_title);
   }

   public function saveEdit(Request $request, $id) {
    $this->validate($request, [
      'title' => 'required',
      'details'  => 'required',
      'ingredients' => 'required'
    ]);
    
  
    $foodToEdit = Food::findOrFail($id);
    $foodToEdit->title = $request->input('title');
    $foodToEdit->ingredients  = $request->input('ingredients');
    $foodToEdit->details  =  $request->input('details');
    $foodToEdit->update();
    return redirect()->back()->with('success', 'Food updated successfully');
   }

   public function deleteFood($id) {
       $foodToDelete = Food::findOrFail($id);
       $foodToDelete->delete();
       return redirect()->back()->with('success', 'Food deleted succesfully');
   }

   public function foodBlog() {
       $page_title = 'jacintaFood | Food blog';
       $allBlog = foodBlog::all();
       return view('admins.all-blogs', compact('page_title','allBlog'));
   }
   
   public function addBlog() {
       $page_title = 'jacintaFood | Add Food Blog';
       return view('admins.add-blog', compact('page_title'));
   }

   public function saveBlog(Request $request) {

    $this->validate($request, [
        'title' => 'required',
        'details'  => 'required',
      ]);
      

      // Handles files upload
      if($request->hasFile('image')) {
        // Get filename with extension
             $filenameWithExt = $request->file('image')->getClientOriginalName();
      
       // Get just filename
             $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
      // Get jus extension
             $extension = $request->file('image')->getClientOriginalExtension();
      // Filename to store
             $imageNameToStore = $filename.'_'.time().'.'.$extension;
      // Upload image
             $path = $request->file('image')->storeAs('public/blog', $imageNameToStore);
            }
             else {
              $imageNameToStore = "noimage.jpg";
             }
       $foodBlog = new FoodBlog();
       $foodBlog->title = $request->input('title');
       $foodBlog->user_id = auth()->user()->id;
       $foodBlog->image = $imageNameToStore;
       $foodBlog->details = $request->input('details');
       $foodBlog->save();
       return redirect()->back()->with('success', 'Blog saved');
   }

   public function viewBlog($id) {
       $blogToView = FoodBlog::findOrFail($id);
       $page_title = 'jacintaFood | '. $blogToView->title;
       return view('admins.blog-details', compact('page_title', 'blogToView'));
   }

   public function editBlog($id) {
       $blogToEdit = FoodBlog::findOrFail($id);
       $page_title = 'jacintaFood | '.$blogToEdit->title;
       return view('admins.edit-blog', compact('page_title','blogToEdit'));
   }

   public function saveEditedBlog(Request $request, $id) {
       $blogToEdit = FoodBlog::findOrFail($id);
       $blogToEdit->title = $request->input('title');
       $blogToEdit->details = $request->input('details');
       $blogToEdit->update();
       return redirect()->back()->with('success', 'Blog edited');
   }

   public function deleteBlog($id) {
       $blogToDelete = FoodBlog::findOrFail($id);
       $blogToDelete->delete();
       return redirect()->back()->with('success', 'Blog deleted');
   }

   public function adminUsers() {
       $page_title = 'jacintaFood | Users';
       $users = User::all();
       $sn = 1;
       return view('admins.users',compact('page_title', 'users','sn'));
   }

   public function addUser() {
    $page_title = 'jacintaFood | Add new user';
    return view('admins.add-user', compact('page_title'));
   }

   public function saveUser(Request $request) {
       $this->validate($request, [
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'password' => ['required', 'string', 'min:8', 'confirmed'],
       ]);

       $newUser = new User();
       $newUser->name = $request->input('name');
       $newUser->email = $request->input('email');
       $newUser->password = Hash::make($request->input('password'));
       $newUser->user_type = $request->input('user_type');
       $newUser->save();
       return redirect()->back()->with('success', 'New user has been added');
   }

   public function makeUser(Request $request, $id) {
        $adminToMakeUser = User::findOrFail($id);
        $adminToMakeUser->user_type = "User";
        $adminToMakeUser->update();
        return redirect()->back()->with('success', 'Admin changed to user');
   }

   public function makeAdmin(Request $request, $id) {
    $userToMakeAdmin = User::findOrFail($id);
    $userToMakeAdmin->user_type = "Admin";
    $userToMakeAdmin->update();
    return redirect()->back()->with('success', 'User has been made admin');
}

public function deleteUser($id) {
    $userToDelete = User::findOrFail($id);
    $userToDelete->delete();
    return redirect()->back()->with('success', 'User deleted succesfullt');
}

public function approveRecipe($id) {
  $recipeToApprove = Food::findOrFail($id);
  $recipeToApprove->status = "Approved";
  $recipeToApprove->update();
  return redirect()->back()->with('success', 'Recipe Approved');
}

}
