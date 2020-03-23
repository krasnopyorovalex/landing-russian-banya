<?php

Route::group(['prefix' => 'text-blocks', 'as' => 'text_blocks.'], function () {
    Route::pattern('id', '[0-9]+');

    Route::get('', 'TextBlockController@index')->name('index');
    Route::get('create', 'TextBlockController@create')->name('create');
    Route::post('', 'TextBlockController@store')->name('store');
    Route::get('{id}/edit', 'TextBlockController@edit')->name('edit');
    Route::put('{id}', 'TextBlockController@update')->name('update');
    Route::delete('{id}', 'TextBlockController@destroy')->name('destroy');

});