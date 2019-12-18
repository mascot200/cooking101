<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Food;
use App\FoodBlog;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $page_title = "jacintaFood | Food blog and Tutorial center";
        return view('home', compact('page_title'));
    }

    public function dashboard() {
        $page_title = "jacintaFood | Dashboard";
        $user_id = auth()->user()->id;
        $foods = Food::where('user_id', '=', $user_id)->get();
        $sn = 1;
        return view('pages.dashboard')->with('foods', $foods)->with('page_title',$page_title)->with('sn',$sn);
    }

 
}
