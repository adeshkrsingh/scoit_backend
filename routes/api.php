<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/college-events', 'EventlistController@apiCollegeEvents');
Route::get('/college-events/{id}', 'EventlistController@apiCollegeEventsDetails');
Route::get('/hostel-events', 'EventlistController@apiHostelEvents');
Route::get('/hostel-events/{id}', 'EventlistController@apiHostelEventsDetails');

Route::get('/event-list', 'EventlistController@apiEventsDetailsList');



Route::get('/gallery', 'GalleryController@apiGallery');
Route::get('/members', 'MemberController@apiMembers');
Route::get('/participants', 'ParticipantController@apiParticipants');
Route::get('/shortlisted', 'WinnerController@apiShortlisted');
Route::get('/winner', 'WinnerController@apiWinner');

Route::post('/register', 'ParticipantController@apiParticipantsRegister');

Route::any('{_missing}', function(){ return ['response' => 'page you are looking might not exists']; });