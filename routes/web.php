<?php

use Illuminate\Support\Facades\Route;

// root
Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// CRUD for LABS
Route::get('/list', 'LabsController@list');
Route::get('/create', 'LabsController@create');
Route::post('/store', 'LabsController@store');

Route::get('/labs/{id}/show', 'LabsController@show');

Route::get('/labs/{id}/edit', 'LabsController@edit');
Route::post('/labs/{id}/update', 'LabsController@update');
Route::get('/labs/{id}/delete', 'LabsController@delete');



Route::get('/viewMap', 'LabsController@viewMap');
