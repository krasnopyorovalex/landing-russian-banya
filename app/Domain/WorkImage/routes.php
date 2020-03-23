<?php

Route::group(['prefix' => 'work-images', 'as' => 'work_images.'], function () {
    Route::pattern('id', '[0-9]+');
    Route::pattern('work', '[0-9]+');

    Route::get('{work}', 'WorkImageController@index')->name('index');
    Route::post('{work}', 'WorkImageController@store')->name('store');
    Route::get('{id}/edit', 'WorkImageController@edit')->name('edit');
    Route::put('{id}', 'WorkImageController@update')->name('update');
    Route::delete('{id}', 'WorkImageController@destroy')->name('destroy');

    Route::post('update-positions', 'WorkImageController@updatePositions')->name('update_positions');
});
