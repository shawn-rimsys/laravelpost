<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/home', 'HomeController@index') -> name('home') ->middleware('auth');
Route::get('/', 'HomeController@index');

Route::get('users', 'UserController@index')->name('users');

Route::resource('blogs', 'BlogController')->middleware('auth');

Route::get('posts/addpost', 'PostController@addpost');
Route::get('posts/main', 'PostController@welcome')->middleware('auth');
Route::resource('posts', 'PostController')->middleware('auth');




// Route::get('/',function() {
// 	$participant = DB::table('participants') -> get();
// 	return view('listparticipant', ['participant' => $participant]);
// });
Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
