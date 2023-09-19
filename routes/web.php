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

// Route::get('/home', 'HomeController@index')->name('home');


Route::middleware('auth')->group(function(){
    Route::get('/dashboard', 'dashboard\DashboardController@index')->name('dashboard');
    Route::get('/dashboard/theaters', 'dashboard\TheatersController@index')->name('dashboard.theaters');
    Route::get('/dashboard/ticket', 'dashboard\TicketController@index')->name('dashboard.ticket');

    //user
    Route::get('/dashboard/users', 'dashboard\userController@index')->name('dashboard.users');
    Route::get('/dashboard/users/{id}', 'dashboard\userController@edit')->name('dashboard.users.edit');
    Route::put('/dashboard/users/{id}', 'dashboard\userController@update')->name('dashboard.users.update');
    Route::delete('/dashboard/users/{id}', 'dashboard\userController@destroy')->name('dashboard.users.delete');

    //movie
    Route::get('/dashboard/movies', 'dashboard\MovieController@index')->name('dashboard.movies');
    Route::get('/dashboard/movies/create', 'dashboard\MovieController@create')->name('dashboard.movies.create');
    Route::post('/dashboard/movies', 'dashboard\MovieController@store')->name('dashboard.movies.store');
    Route::get('/dashboard/movies/{id}', 'dashboard\MovieController@edit')->name('dashboard.movies.edit');
    Route::put('/dashboard/movies/', 'dashboard\MovieController@update')->name('dashboard.movies.update');
    Route::delete('/dashboard/movies/', 'dashboard\MovieController@destroy')->name('dashboard.movies.delete');
});
