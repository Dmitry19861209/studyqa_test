<?php

//Главная
Route::get('/', 'IndexController@dashboard')->name('dashboard');
Route::post('/set-title', 'IndexController@setTitle')->name('set.title.post');

//Новости
Route::resource('news', 'NewsController');

//Галерея
Route::prefix('images')->group(function () {
    Route::get('/', 'ImageController@index')->name('images.index');
    Route::get('/create', 'ImageController@create')->name('images.create');
    Route::post('/store', 'ImageController@store')->name('images.store');
});