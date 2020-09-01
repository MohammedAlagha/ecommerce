<?php




//note that the prefix is admin for all file routes

Route::group(['prefix' => LaravelLocalization::setLocale()], function () {
    /** ADD ALL LOCALIZED ROUTES INSIDE THIS GROUP **/

    Route::get('/', function () {
        return 's';
    });

//    Route::get('test', function () {
//        return View::make('test');
//    });
});

/** OTHER PAGES THAT SHOULD NOT BE LOCALIZED **

*/


Route::group(['namespace' => 'Admin','middleware'=>'guest:admin'],function (){

    Route::get('login', 'LoginController@login')->name('admin.login');
    Route::post('login', 'LoginController@postLogin')->name('admin.post.login');

});



Route::group(['namespace' => 'Admin','middleware'=>'auth:admin'],function (){

    Route::get('/index' ,'HomeController@index')->name('admin.index');
});
