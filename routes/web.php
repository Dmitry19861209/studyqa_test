<?php

Route::get('/', 'IndexController@dashboard')->name('dashboard');
Route::post('/set-title', 'IndexController@setTitle')->name('set.title.post');
