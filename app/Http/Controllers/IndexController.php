<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Food;
use App\FoodBlog;
class IndexController extends Controller
{
    public function index() {
        $page_title = "jacintaFood | Edo and Igbo Recipes";

        return view('pages.index', compact('page_title'));
    }
}
