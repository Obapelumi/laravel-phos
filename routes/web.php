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


Route::get('/', function () {
    return view('welcome');

});


// Route::get('/', 'PagesController@index');

Route::get('/about', 'PagesController@about');

Route::get('/services', 'PagesController@services');

// Route::post('/posts',[
// 	'uses'=>'PostsController@store',
// 	'as'=> 'store'
// 	]);
Route::resource('/posts', 'PostsController');

Route::post('/comment/{id}', 'PostsController@queryFacebook')->name('post-comment');

Route::get('/facebook-callback', 'PostsController@commentStore');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


/*

Route::get('/hello', function () {
     return view('welcome');
	 return "Hello world";

});

Route::get('/about', function () {
    return view('pages.about');
	// return "This your name ". $name . "This is your id is " . $id;

});

*/



