<?php

Route::group(['prefix' => 'works', 'as' => 'works.'], function () {
    Route::pattern('id', '[0-9]+');

    Route::get('', 'WorkController@index')->name('index');
    Route::get('create', 'WorkController@create')->name('create');
    Route::post('', 'WorkController@store')->name('store');
    Route::get('{id}/edit', 'WorkController@edit')->name('edit');
    Route::put('{id}', 'WorkController@update')->name('update');
    Route::delete('{id}', 'WorkController@destroy')->name('destroy');
});
