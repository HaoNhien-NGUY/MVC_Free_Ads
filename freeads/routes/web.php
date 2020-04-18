<?php

use App\Http\Controllers\AnnonceController;
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

Route::get('/', 'IndexController@showIndex');

Auth::routes(['verify' => true]);

Route::get('/user/{user}', 'UserController@show')->name('user.show');

Route::get('/user/{user}/annonces', 'UserController@annonce');
Route::get('/annonce/create', 'AnnonceController@create')->name('annonce.create');
Route::get('/annonce', 'AnnonceController@index')->name('annonce.index');
Route::get('/annonce/{annonce}', 'AnnonceController@show')->name('annonce.show');
Route::post('/annonce', 'AnnonceController@store')->name('annonce.store');


Route::get('/user/{user}/edit', 'UserController@edit')->name('user.edit');
Route::patch('/user/{user}', 'UserController@update')->name('user.update');
Route::delete('user/{user}', 'UserController@destroy')->name('user.destroy');


Route::get('/home', 'HomeController@index')->name('home');
