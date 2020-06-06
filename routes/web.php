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

Auth::routes(['register' => false, 'confirm' => false, 'reset' => false]);


Route::middleware('auth')->prefix('/dashboard')->group(function () {
    Route::get('/', 'DashboardController@index');
    Route::get('/ui', 'DashboardController@ui');

    Route::post('/users', 'UserController@store');
    Route::put('/users/{user}', 'UserController@update');
    Route::delete('/users/{user}', 'UserController@destroy');
});
