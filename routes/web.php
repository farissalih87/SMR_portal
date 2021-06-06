<?php

use Illuminate\Support\Facades\Route;
use \Illuminate\Support\Facades\App;

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

Route::get('/set-locale/{locale}', function ($locale) {
    App::setLocale($locale);

    session()->put('locale', $locale);
    return redirect()->back();
})->name('locale.setting');

Route::get('/', function () {

    return view('site_home');
});

Route::get('/site_login', function () {

    return view('site_login');
});

Route::get('category/{id}','Admin\CategoriesController@companies_list')->name('cat.companies');
Route::get('brand/{id}','Admin\BrandsController@companies_list')->name('brand.companies');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');



require __DIR__.'/auth.php';

require __DIR__.'/admin.php';

