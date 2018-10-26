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

Route::get('/', 'LandingPageController@index')->name('landing-page');
Route::get('/home', 'LoggedInController@afterLoggin');

Auth::routes(['verify' => true]);

Route::get('/logout', 'Auth\LoginController@logout')->name('logout' );

Route::get('/pages/{slug}', 'PageController@singlePage');

Route::get('profile', function () {
    return view('private.profile');
})->middleware('verified');


Route::group(['prefix' => config('backpack.base.route_prefix', 'admin'), 'middleware' => ['can:isSuperAdmin'], 'namespace' => 'Admin'], function () {
    Route::get('dashboard', '\Backpack\Base\app\Http\Controllers\AdminController@dashboard');
    Route::get('/', '\Backpack\Base\app\Http\Controllers\AdminController@redirect');
    // other routes
});
