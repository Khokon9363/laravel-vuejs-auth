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
    return view('application.index');
});
Route::get('/{any}', function () {
    return view('application.index');
})->where( 'any', '.*' );

Route::post('/api/register','Auth\AuthController@register');
Route::post('/api/login','Auth\AuthController@login');
Route::post('/api/logout','Auth\AuthController@logout');