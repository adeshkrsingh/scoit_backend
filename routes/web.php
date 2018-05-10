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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::resource('/eventlist', 'EventlistController');
Route::resource('/gallery', 'GalleryController');
Route::resource('/members', 'MemberController');
Route::resource('/participants', 'ParticipantController');
Route::resource('/winner', 'WinnerController');
Route::get('/winner-shortlisted/{id}', 'WinnerController@declareShortlisted');
Route::get('/winner-completed/{id}', 'WinnerController@declareCompleted');
Route::get('/winner-winner/{id}', 'WinnerController@declareWinner');

