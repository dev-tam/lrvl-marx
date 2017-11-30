<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'BookmarksController@index')->name('home');
Route::post('store',['as'=>'bookmarks.store','uses'=>'BookmarksController@store']);
Route::delete('/bookmarks/{id}','BookmarksController@destroy');
