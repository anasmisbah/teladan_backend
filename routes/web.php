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

Auth::routes();

Route::get('/', function () {
    return redirect()->route('home');
});

Route::middleware(['auth'])->group(function (){
    Route::get('/home', 'HomeController@index')->name('home');

    Route::resource('classroom', 'ClassroomController');
    Route::resource('room', 'RoomController');
    Route::resource('subject', 'SubjectController');
    Route::resource('student', 'StudentController');
    Route::resource('lecturer', 'LecturerController');
});
