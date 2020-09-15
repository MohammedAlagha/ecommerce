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
        Route::get('logout','LoginController@logout')->name('admin.logout');

        Route::group(['prefix' => 'settings'], function () {
            Route::get('shipping-method/{type}', 'SettingsController@editShipping')->name('admin.edit.shipping-methods');
            Route::put('shipping-method/{id}', 'SettingsController@updateShipping')->name('admin.update.shipping-methods');
        });

        Route::group(['prefix' => 'profile'], function () {
            Route::get('edit', 'ProfileController@editProfile')->name('admin.edit.profile');
            Route::put('update', 'ProfileController@updateProfile')->name('admin.update.profile');
        });

        #############################categories routes#########################################

            Route::resource('categories','CategoriesController',['as'=>'admin']);
            Route::get('categories-data','CategoriesController@data')->name('admin.categories.data');

        #############################end categories############################################


        #############################subCategories routes#########################################

        Route::resource('subCategories','SubCategoriesController',['as'=>'admin']);
        Route::get('subCategories-data','SubCategoriesController@data')->name('admin.subCategories.data');

        #############################end subCategories routes ############################################


        ############################# brands routes#########################################

        Route::resource('brands','BrandsController',['as'=>'admin']);
        Route::get('brands-data','BrandsController@data')->name('admin.brands.data');

        #############################end brands routes############################################
    });


});





/** OTHER PAGES THAT SHOULD NOT BE LOCALIZED **
 */


