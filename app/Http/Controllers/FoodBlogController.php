<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FoodBlog;
class FoodBlogController extends Controller
{
   public function blogDetails($id) {
       $blogDetails = FoodBlog::findOrFail($id);
       $page_title = 'jacintaFood | '.$blogDetails->title;
       return view('pages.blog-details', compact('page_title', 'blogDetails'));
   } 

   public function foodBlogs() {
       $page_title = 'jacintaFood | Get latest tips on healthy diet';
       $foodBlogs = FoodBlog::orderBy('id', 'desc')->paginate(8);
       return view('pages.all-blogs', compact('page_title','foodBlogs'));
   }
}
