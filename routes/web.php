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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'MoviesController@allMovies')->name('movies_list');
Route::get('/movies/{id}', 'MoviesController@showMovies');

Route::get('/movie/{name}', 'MoviesController@showOneMovie')->name('una_peli');

Route::get('/find-movie', 'MoviesController@findMovieForm');
Route::post('/find-movie', 'MoviesController@findMovieResult');

Route::get('/create-movie', 'MoviesController@createMovieForm')->middleware('auth');
Route::post('/create-movie', 'MoviesController@createMovie');

Route::get('/edit-movie/{id}', 'MoviesController@editMovieForm')->middleware('auth');
Route::put('/edit-movie/{id}', 'MoviesController@editMovie');

Route::put('/edit-movie/{id}', 'MoviesController@editMovie');

Route::delete('movies/{id}', 'MoviesController@delete')->name('delete_movie');

Route::get('/test', function(){
	$actors = App\Actor::all();

	return view('actor.actors_movies', compact('actors'));

});

Route::get('/test2', function(){
	$products = App\Product::first();

	return $products->name . ' / ' . $products->categories->name;

});

// Auth::routes();

// Profile Home
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/login', 'Auth\LoginController@login');
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('/registro', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('/registro', 'Auth\RegisterController@register');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');
