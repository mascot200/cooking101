<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'IndexController@index')->name('index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/food-details/{id}', 'FoodController@foodDetails')->name('food-details');
Route::get('/blog-details/{id}', 'FoodBlogController@blogDetails')->name('blog-details');
Route::get('/food-blogs', 'FoodBlogController@foodBlogs')->name('food-blogs');
Route::get('/food', 'FoodController@allFood')->name('food');
Route::get('/user-add-food', 'FoodController@addFood')->name('user-add-food')->middleware('auth');
Route::post('/save-recipe', 'FoodController@saveRecipe')->name('save-recipe');
Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard');
Route::get('/download/{id}', 'FoodController@downloadVideo')->name('download-video');
Route::get('/edo-recipes', 'FoodController@edoRecipes')->name('edo-recipes');
Route::get('/igbo-recipes', 'FoodController@igboRecipes')->name('igbo-recipes');
Route::get('/search', 'FoodController@search')->name('search');

Route::post('/save-comment/{id}', 'FoodController@saveComment')->name('save-comment');




//Routes for admin
Route::group(['middleware' => ['auth', 'admin']], function() {
    Route::get('/admin', 'AdminController@home')->name('admin-home');
    Route::get('/admin-users', 'AdminController@adminUsers')->name('admin-users');
    Route::put('/make-user/{id}', 'AdminController@makeUser')->name('make-user');
    Route::put('/make-admin/{id}', 'Admincontroller@makeAdmin')->name('make-admin');
    Route::get('/admins', 'AdminController@admins')->name('admins');
    Route::delete('/delete-user/{id}', 'AdminController@deleteUser')->name('delete-user');
    Route::get('/add-user', 'AdminController@addUser')->name('add-user');
    Route::post('/save-user', 'AdminController@saveUser')->name('save-user');
 

    Route::get('/add-food', 'AdminController@addFood')->name('add-food');
    Route::post('/save-food', 'AdminController@saveFood')->name('save-food')->middleware('auth');
    Route::get('/edit-food/{id}', 'AdminController@editFood')->name('edit-food');
    Route::get('/view-food/{id}', 'AdminController@foodDetails')->name('view-food');
    Route::put('/save-edit/{id}', 'AdminController@saveEdit')->name('save-edit');
    Route::get('/all-food', 'AdminController@allFood')->name('all-food');
    Route::delete('/delete-food/{id}', 'AdminController@deleteFood')->name('delete-food');

    Route::get('/food-blog', 'AdminController@foodBlog')->name('food-blog');
    Route::get('/all-blog', 'AdminController@allBlog')->name('all-blog');
    Route::get('/add-blog', 'AdminController@addBlog')->name('add-blog');
    Route::post('/save-blog', 'AdminController@saveBlog')->name('save-blog');
    Route::get('/view-blog/{id}', 'AdminController@viewBlog')->name('view-blog');
    Route::get('/edit-blog/{id}', 'AdminController@editBlog')->name('edit-blog');
    Route::put('/save-edited-blog/{id}', 'AdminController@saveEditedBlog')->name('save-edited-blog');
    Route::delete('/delete-blog/{id}', 'AdminController@deleteBlog')->name('delete-blog');
    Route::put('/approve-recipe/{id}', 'AdminController@approveRecipe')->name('approve-recipe');

  

});
