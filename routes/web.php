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

// BACK END ROUTES
Auth::routes();

Route::middleware('is_admin')->group(function() {
    

Route::resource('/admin','Back\AdminController');
Route::resource('/posts','Back\PostController');
Route::resource('/categories','Back\CategoryController');
Route::post('/categoryfetch','Back\CategoryController@categoryfetch')->name('admin.categoryfetch');
});


// FRONT END ROUTES
Route::get('/', 'Front\HomeController@index')->name('home');

Route::get('/contact', 'Front\ContactController@contact')->name('contact');



Route::post('/contactus', 'Front\ContactController@contactus')->name('contactus');
Route::post('/comment', 'Front\CommentController@commentPost')->name('comment');

Route::get('/{category}', 'Front\CategoryController@category')->name('category');
Route::get('/{category}/{single}', 'Front\SingleController@single')->name('single');




