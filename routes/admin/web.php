<?php


//note that the prefix is admin for all file routes

Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
], function () {
    /** ADD ALL LOCALIZED ROUTES INSIDE THIS GROUP **/

    Route::group(['namespace' => 'Admin', 'middleware' => 'guest:admin','prefix'=>'admin'], function () {

        Route::get('login', 'LoginController@login')->name('admin.login');
        Route::post('login', 'LoginController@postLogin')->name('admin.post.login');

    });


    Route::group(['namespace' => 'Admin', 'middleware' => 'auth:admin','prefix'=>'admin'], function () {

        Route::get('/index', 'HomeController@index')->name('admin.index');

        Route::group(['prefix' => 'settings'], function () {

            Route::get('shipping-method/{type}', 'SettingsController@editShipping')->name('edit.shipping-methods');
            Route::put('shipping-method/{id}', 'SettingsController@updateShipping')->name('update.shipping-methods');

        });
    });


});





/** OTHER PAGES THAT SHOULD NOT BE LOCALIZED **
 */


