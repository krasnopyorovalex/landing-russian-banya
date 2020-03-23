<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::pattern('alias', '[\da-z-]+');

Auth::routes();

Route::post('send-callback', 'FormHandlerController@callback')->name('send.callback');
Route::post('send-consultation', 'FormHandlerController@consultation')->name('send.consultation');

Route::group(['middleware' => ['redirector']], function () {

    Route::get('{alias?}/{page?}', 'PageController@show')->name('page.show')->where('page', '[0-9]+');

    Route::post('action/{id}', 'ActionController@show')->name('action.show')->where('id', '[0-9]+');
    Route::post('service/{id}', 'ServiceController@show')->name('service.show')->where('id', '[0-9]+');
    Route::post('work/{id}', 'WorkController@show')->name('work.show')->where('id', '[0-9]+');

});

Route::group(['prefix' => '_root', 'middleware' => 'auth', 'namespace' => 'Admin', 'as' => 'admin.'], function () {

    Route::get('', 'HomeController@home')->name('home');

    Route::post('upload-ckeditor', 'CkeditorController@upload')->name('upload-ckeditor');

    foreach (glob(app_path('Domain/**/routes.php')) as $item) {
        require $item;
    }
});
