<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::prefix('admin')->group(function () {

    Route::get('login','AdminController@getLogin');
    Route::post('login','AdminController@Login')->name('admin.login');
    Route::get('logout','AdminController@Logout')->name('admin.logout');

    Route::middleware(['auth:admin'])->group(function () {
        Route::view('/', 'admin.home')->name('admin.home');
    });
});





?>
