<?php

Route::group(['prefix' => 'service-images', 'as' => 'service_images.'], function () {
    Route::pattern('id', '[0-9]+');
    Route::pattern('service', '[0-9]+');

    Route::get('{service}', 'ServiceImageController@index')->name('index');
    Route::post('{service}', 'ServiceImageController@store')->name('store');
    Route::get('{id}/edit', 'ServiceImageController@edit')->name('edit');
    Route::put('{id}', 'ServiceImageController@update')->name('update');
    Route::delete('{id}', 'ServiceImageController@destroy')->name('destroy');

    Route::post('update-positions', 'ServiceImageController@updatePositions')->name('update_positions');
});
