<?php

Route::group(['prefix' => 'actions', 'as' => 'actions.'], function () {
    Route::pattern('id', '[0-9]+');

    Route::get('', 'ActionController@index')->name('index');
    Route::get('create', 'ActionController@create')->name('create');
    Route::post('', 'ActionController@store')->name('store');
    Route::get('{id}/edit', 'ActionController@edit')->name('edit');
    Route::put('{id}', 'ActionController@update')->name('update');
    Route::delete('{id}', 'ActionController@destroy')->name('destroy');

});
