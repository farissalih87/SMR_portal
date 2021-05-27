<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;



Route::prefix('admin')->group(function () {

    Route::get('login','AdminController@getLogin');
    Route::post('login','AdminController@Login')->name('admin.login');
    Route::get('logout','AdminController@Logout')->name('admin.logout');

    Route::middleware(['auth:admin'])->group(function () {
        Route::view('/', 'admin.home')->name('admin.home');

        /////////////////// Languages Routes
        Route::group(['prefix'=>'languages'],function (){
            Route::get('/','Admin\LanguagesController@index')->name('admin.languages');
            Route::get('/create','Admin\LanguagesController@create')->name('admin.new_language');
            Route::post('/store','Admin\LanguagesController@store')->name('admin.store_language');
            Route::get('/edit/{id}','Admin\LanguagesController@edit')->name('admin.edit_language');
            Route::post('/update/{id}','Admin\LanguagesController@update')->name('admin.update_language');
            Route::get('/delete/{id}','Admin\LanguagesController@destroy')->name('admin.delete_language');
        });
        /////////////////// End Languages Routes


        /////////////////// Categories Routes
        Route::group(['prefix'=>'categories'],function (){
            Route::get('/','Admin\CategoriesController@index')->name('admin.categories');
            Route::get('/create','Admin\CategoriesController@create')->name('admin.new_category');
            Route::post('/store','Admin\CategoriesController@store')->name('admin.store_category');
            Route::get('/edit/{id}','Admin\CategoriesController@edit')->name('admin.edit_category');
            Route::post('/update/{id}','Admin\CategoriesController@update')->name('admin.update_category');
            Route::get('/delete/{id}','Admin\CategoriesController@destroy')->name('admin.delete_category');
        });
        /////////////////// Categories Routes

    });
});





?>
