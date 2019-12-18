<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Food;
use App\FoodComments;
use Illuminate\Support\Facades\Storage;
class FoodController extends Controller
{
    public function foodDetails($id) {
        $foodDetails = Food::findOrFail($id);
        $page_title = 'jacintaFood |'.$foodDetails->title;
        $comments = FoodComments::where('food_id', '=', $id)->get();
        return view('pages.food-details', compact('page_title', 'foodDetails','comments'));
    }

    public function allFood() {
        $page_title = 'jacintaFood | Learn how to cook here';
        $allFood = Food::orderBy('id', 'desc')->paginate(8);
        return view('pages.all-food', compact('page_title', 'allFood'));
    }

    public function addFood(){
        $page_title = "jacintaFood | Add Recipe";
        return view('pages.add-recipe', compact('page_title'));
    }

    public function saveComment(Request $request, $id) {
           $newComment = new FoodComments();
           $newComment->user_id = auth()->user()->id;
           $newComment->user_name = auth()->user()->name;
           $newComment->profile_image = auth()->user()->profile_image;
           $newComment->body = $request->input('comment');
           $newComment->food_id = $id;
           $newComment->save();
           return redirect()->back()->with('success','Comment posted');
    }

    public function saveRecipe(Request $request) {
        $this->validate($request, [
            'video' => 'max:98999999'
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
      if($request->hasFile('video')) {
        // Get filename with extension
             $filenameWithExt = $request->file('video')->getClientOriginalName();
      
       // Get just filename
             $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
      // Get jus extension
             $extension = $request->file('video')->getClientOriginalExtension();
      // Filename to store
             $videoToStore = $filename.'_'.time().'.'.$extension;
      // Upload image
             $path = $request->file('video')->storeAs('public/videos', $videoToStore);
            }
             else {
              $videoToStore = "noimage.mp4";
             }


        $newRecipe = new Food();
        $newRecipe->title = $request->input('title');
        $newRecipe->image = $imageNameToStore;
        $newRecipe->ingredients = $request->input('ingredients');
        $newRecipe->user_id = Auth()->user()->id;
        $newRecipe->details = $request->input('details');
        $newRecipe->status = "Pending";
        $newRecipe->videos =  $videoToStore;
        $newRecipe->nutritive_values = $request->input('nutritive_values');
        $newRecipe->time = $request->input('time');
        $newRecipe->place = $request->input('tribe');
        $newRecipe->save();
        return redirect()->back()->with('success', 'Recipe added succesfully');
    }

    public function downloadVideo($id) {
      $foodVideo = Food::findOrFail($id);
      $path = "public/videos/".$foodVideo->videos;
      return Storage::download($path);
    }

    public function edoRecipes() {
    $edoRecipes = Food::where('place', '=', 'edo')->paginate(10);
    $page_title = "Edo Recipes";
    return view('pages.edo-recipes', compact('edoRecipes', 'page_title'));
    }

    public function igboRecipes() {
       $igboRecipes = Food::where('place', '=', 'igbo')->paginate(10);
       $page_title = "Igbo Recipes";
       return view('pages.igbo-recipes', compact('igboRecipes', 'page_title'));
    }

    public function search(Request $request) {
      $searchWord = $request->input('search');
      $searchResults = Food::where('title', 'LIKE', "%$searchWord%")
      ->orWhere('place', 'LIKE', "%$searchWord%")->get();
      $countResults = count($searchResults); 
      $page_title = "Search Result";
  
    return view('pages.search-results', compact('page_title','searchWord','searchResults','countResults'));
    }
}
