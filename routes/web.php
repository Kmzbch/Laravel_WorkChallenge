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

Route::get('/index', 'HomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// CRUD for LABS
Route::get('/list', 'LabsController@list');

Route::get('/create', 'LabsController@create');

Route::post('/store', 'LabsController@store');


Route::get('/labs/{id}/edit', 'LabsController@edit');
Route::post('/labs/{id}/update', 'LabsController@update');


Route::get('/labs/{id}/delete', 'LabsController@delete');


Route::get('/labs/{id}/show', 'LabsController@show');


// CRUD for LABS
Route::get('/viewMap', 'LabsController@viewMap');


Route::get('/maps', 'HomeController@show');
