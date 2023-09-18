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
    return view('welcome');
});

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');


Route::middleware('auth')->group(function(){
    Route::get('/dashboard', 'dashboard\DashboardController@index');
    Route::get('/dashboard/users', 'dashboard\userController@index')->name('dashboard.users');
    Route::get('/dashboard/users/{id}', 'dashboard\userController@edit')->name('dashboard.users.edit');
    Route::put('/dashboard/users/{id}', 'dashboard\userController@update')->name('dashboard.users.update');
    Route::delete('/dashboard/users/{id}', 'dashboard\userController@destroy')->name('dashboard.users.delete');
});
