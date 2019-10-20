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
})->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/database', 'UserController@showDB');

Route::get('/credentials', function () {
    return abort(404);
});

Route::post('/credentials', 'CredentialsController@checkCredentials');

Route::get('/details/{id}', 'DetailsController@showDetails')->name('details');

Route::post('/friends', 'FriendsController@handleFriend');

Route::post('/birthdays', 'BirthdaysController@show');

//Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');