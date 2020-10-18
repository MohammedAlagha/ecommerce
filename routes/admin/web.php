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

        ############################# brands routes#########################################

        Route::resource('brands','BrandsController',['as'=>'admin']);
        Route::get('brands-data','BrandsController@data')->name('admin.brands.data');

        #############################end brands routes############################################

        ############################# tags routes#########################################

        Route::resource('tags','TagsController',['as'=>'admin']);
        Route::get('tags-data','TagsController@data')->name('admin.tags.data');

        #############################end tags routes############################################

        ############################# Products routes#########################################

        Route::resource('products','ProductsController',['as'=>'admin']);
        Route::get('products-data','ProductsController@data')->name('admin.products.data');


            //images Routes
        Route::get('images/{id}','ProductsController@addImages')->name('admin.products.images');
        Route::post('images/store','ProductsController@storeImages')->name('admin.products.images.store'); //store in folder only
        Route::post('image/delete','ProductsController@deleteImageFromFolder')->name('admin.products.image.delete');  //delete from folder only
//        Route::post('images/store_in_db','ProductsController@storeImagesInDB')->name('admin.products.images.store.db');
        #############################end Products routes############################################
    });


});





/** OTHER PAGES THAT SHOULD NOT BE LOCALIZED **
 */


