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

Route::get('/', function () {
    return view('auth/login');
});

Auth::routes();
// tweet
Route::get('/home', 'HomeController@index')->name('home');
Route::post('/home', 'HomeController@store');
Route::get('/home', 'HomeController@index');
// profile
Route::post('/add', 'HomeController@insert_post')->name('add');
Route::get('/profile', 'HomeController@p_tweet');
Route::get('/edit/{id}','HomeController@edit');
Route::put('/update/{id}','HomeController@update');
Route::get('/delete/{id}','HomeController@delete');