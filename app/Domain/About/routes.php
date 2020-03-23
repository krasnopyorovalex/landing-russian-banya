<?php

Route::group(['prefix' => 'abouts', 'as' => 'abouts.'], function () {
    Route::pattern('id', '[0-9]+');

    Route::get('', 'AboutController@index')->name('index');
    Route::get('create', 'AboutController@create')->name('create');
    Route::post('', 'AboutController@store')->name('store');
    Route::get('{id}/edit', 'AboutController@edit')->name('edit');
    Route::put('{id}', 'AboutController@update')->name('update');
    Route::delete('{id}', 'AboutController@destroy')->name('destroy');
});
