<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['namespace' => 'Account', 'prefix' => 'utils'], function () {
    Route::post('/login', 'AjaxController@admin_login_ajax')->name('admin.api.login');
    Route::get('/logout', 'AjaxController@admin_logout_ajax')->name('admin.api.logout');
});

// admin
Route::group(['middleware' => ['cors', 'csrf'], 'namespace' => 'Admin', 'prefix' => 'admin'], function () {
    // Auction
    Route::group(['namespace' => 'Auction', 'prefix' => 'auction'], function () {
        Route::get('/', 'AjaxController@list')->name('admin.auction.list');
        Route::get('/detail/{id}', 'AjaxController@detail')->name('admin.auction.detail');
        Route::post('/create', 'AjaxController@create')->name('admin.auction.create');
        Route::put('/update/{id}', 'AjaxController@update')->name('admin.auction.update');
        Route::delete('/delete/{id}', 'AjaxController@update')->name('admin.auction.delete');
    });

    // Donate
    Route::group(['namespace' => 'Donate', 'prefix' => 'donate'], function () {
        Route::get('/', 'AjaxController@list')->name('admin.donate.list');
        Route::get('/detail/{id}', 'AjaxController@detail')->name('admin.donate.detail');
        Route::post('/create', 'AjaxController@create')->name('admin.donate.create');
        Route::put('/update/{id}', 'AjaxController@update')->name('admin.donate.update');
        Route::delete('/delete/{id}', 'AjaxController@update')->name('admin.donate.delete');
    });

    // History
    Route::group(['namespace' => 'History', 'prefix' => 'history'], function () {
        Route::get('/', 'AjaxController@list')->name('admin.history.list');
        Route::get('/detail/{id}', 'AjaxController@detail')->name('admin.history.detail');
        Route::post('/create', 'AjaxController@create')->name('admin.history.create');
        Route::put('/update/{id}', 'AjaxController@update')->name('admin.history.update');
        Route::delete('/delete/{id}', 'AjaxController@update')->name('admin.history.delete');
    });

    // Order
    Route::group(['namespace' => 'Order', 'prefix' => 'order'], function () {
        Route::get('/', 'AjaxController@list')->name('admin.order.list');
        Route::get('/detail/{id}', 'AjaxController@detail')->name('admin.order.detail');
        Route::post('/create', 'AjaxController@create')->name('admin.order.create');
        Route::put('/update/{id}', 'AjaxController@update')->name('admin.order.update');
        Route::delete('/delete/{id}', 'AjaxController@update')->name('admin.order.delete');
    });

    // Setting
    Route::group(['namespace' => 'Setting', 'prefix' => 'setting'], function () {
        Route::get('/', 'AjaxController@list')->name('admin.setting.list');
        Route::get('/detail/{id}', 'AjaxController@detail')->name('admin.setting.detail');
        Route::post('/create', 'AjaxController@create')->name('admin.setting.create');
        Route::put('/update/{id}', 'AjaxController@update')->name('admin.setting.update');
        Route::delete('/delete/{id}', 'AjaxController@update')->name('admin.setting.delete');
    });

    // User
    Route::group(['namespace' => 'User', 'prefix' => 'user'], function () {
        Route::get('/', 'AjaxController@list')->name('admin.user.list');
        Route::get('/detail/{id}', 'AjaxController@detail')->name('admin.user.detail');
        Route::post('/create', 'AjaxController@create')->name('admin.user.create');
        Route::post('/update', 'AjaxController@update')->name('admin.user.update');
        Route::delete('/delete/{id}', 'AjaxController@update')->name('admin.user.delete');
        Route::post('/upload', 'AjaxController@upload')->name('admin.user.upload');
    });
});

// store
Route::group(['namespace' => 'Store', 'prefix' => 'store'], function () {
    // Product
    Route::group(['namespace' => 'Home', 'prefix' => 'home'], function () {
        Route::get('/', 'AjaxController@list')->name('store.home.list');
        // Route::get('/detail/{id}', 'AjaxController@detail')->name('admin.user.detail');
        // Route::post('/create', 'AjaxController@create')->name('admin.user.create');
        // Route::put('/update/{id}', 'AjaxController@update')->name('admin.user.update');
        // Route::delete('/delete/{id}', 'AjaxController@update')->name('admin.user.delete');
    });
});
