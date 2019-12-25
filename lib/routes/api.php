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
    Route::post('/register', 'AjaxController@admin_register_ajax')->name('admin.api.register');
    Route::get('/account', 'AjaxController@admin_account_ajax')->name('admin.api.account');
    Route::get('/logout', 'AjaxController@admin_logout_ajax')->name('admin.api.logout');
});

// admin
Route::group(['middleware' => ['cors', 'csrf'], 'namespace' => 'Admin', 'prefix' => 'admin'], function () {
    // Auction
    Route::group(['namespace' => 'Auction', 'prefix' => 'auction'], function () {
        Route::get('/', 'AjaxController@list')->name('admin.auction.list');
        Route::get('/detail/{id}', 'AjaxController@detail')->name('admin.auction.detail');
        Route::post('/create', 'AjaxController@create')->name('admin.auction.create');
        Route::post('/update', 'AjaxController@update')->name('admin.auction.update');
        Route::delete('/delete/{id}', 'AjaxController@update')->name('admin.auction.delete');
    });

    // Donate
    Route::group(['namespace' => 'Donate', 'prefix' => 'donate'], function () {
        Route::get('/', 'AjaxController@list')->name('admin.donate.list');
        Route::get('/detail/{id}', 'AjaxController@detail')->name('admin.donate.detail');
        Route::post('/create', 'AjaxController@create')->name('admin.donate.create');
        Route::post('/update', 'AjaxController@update')->name('admin.donate.update');
        Route::delete('/delete/{id}', 'AjaxController@update')->name('admin.donate.delete');
    });

    // History
    Route::group(['namespace' => 'History', 'prefix' => 'history'], function () {
        Route::get('/', 'AjaxController@list')->name('admin.history.list');
        Route::get('/detail/{id}', 'AjaxController@detail')->name('admin.history.detail');
        Route::post('/create', 'AjaxController@create')->name('admin.history.create');
        Route::post('/update', 'AjaxController@update')->name('admin.history.update');
        Route::delete('/delete/{id}', 'AjaxController@update')->name('admin.history.delete');
    });

    // Order
    Route::group(['namespace' => 'Order', 'prefix' => 'order'], function () {
        Route::get('/', 'AjaxController@list')->name('admin.order.list');
        Route::get('/detail/{id}', 'AjaxController@detail')->name('admin.order.detail');
        Route::post('/create', 'AjaxController@create')->name('admin.order.create');
        Route::post('/update', 'AjaxController@update')->name('admin.order.update');
        Route::delete('/delete/{id}', 'AjaxController@update')->name('admin.order.delete');
    });

    // Setting
    Route::group(['namespace' => 'Setting', 'prefix' => 'setting'], function () {
        Route::get('/', 'AjaxController@list')->name('admin.setting.list');
        Route::get('/detail/{id}', 'AjaxController@detail')->name('admin.setting.detail');
        Route::post('/create', 'AjaxController@create')->name('admin.setting.create');
        Route::post('/update', 'AjaxController@update')->name('admin.setting.update');
        Route::delete('/delete/{id}', 'AjaxController@update')->name('admin.setting.delete');
    });

    // Category
    Route::group(['namespace' => 'Category', 'prefix' => 'category'], function () {
        Route::get('/', 'AjaxController@list')->name('admin.category.list');
        Route::get('/detail/{id}', 'AjaxController@detail')->name('admin.category.detail');
        Route::post('/create', 'AjaxController@create')->name('admin.category.create');
        Route::post('/update/{id}', 'AjaxController@update')->name('admin.category.update');
        Route::delete('/delete/{id}', 'AjaxController@delete')->name('admin.category.delete');
    });

    // Activity
    Route::group(['namespace' => 'Activity', 'prefix' => 'activity'], function () {
        Route::get('/', 'AjaxController@list')->name('admin.activity.list');
        Route::get('/detail/{id}', 'AjaxController@detail')->name('admin.activity.detail');
        Route::post('/create', 'AjaxController@create')->name('admin.activity.create');
        Route::post('/update/{id}', 'AjaxController@update')->name('admin.activity.update');
        Route::delete('/delete/{id}', 'AjaxController@delete')->name('admin.activity.delete');
    });

    // Location
    Route::group(['namespace' => 'Location', 'prefix' => 'location'], function () {
        Route::get('/', 'AjaxController@list')->name('admin.location.list');
        Route::get('/detail/{id}', 'AjaxController@detail')->name('admin.location.detail');
        Route::post('/create', 'AjaxController@create')->name('admin.location.create');
        Route::post('/update', 'AjaxController@update')->name('admin.location.update');
        Route::delete('/delete/{id}', 'AjaxController@delete')->name('admin.location.delete');
    });

    // User
    Route::group(['namespace' => 'User', 'prefix' => 'user'], function () {
        Route::get('/', 'AjaxController@list')->name('admin.user.list');
        Route::get('/detail/{id}', 'AjaxController@detail')->name('admin.user.detail');
        Route::post('/create', 'AjaxController@create')->name('admin.user.create');
        Route::post('/update', 'AjaxController@update')->name('admin.user.update');
        Route::delete('/delete/{id}', 'AjaxController@update')->name('admin.user.delete');
    });
});

// user
Route::group(['namespace' => 'User', 'prefix' => 'user'], function () {
    // User
    Route::group(['namespace' => 'Account', 'prefix' => 'account'], function () {
        Route::get('/detail/{id}', 'AjaxController@detail')->name('user.account.detail');
        Route::post('/update', 'AjaxController@update')->name('user.account.update');
    });

    Route::group(['namespace' => 'Account', 'prefix' => 'account'], function () {
        Route::get('/detail/{id}', 'AjaxController@detail')->name('user.account.detail');
        Route::post('/withdraw', 'AjaxController@withdraw')->name('user.account.withdraw');
        Route::post('/get-free-token', 'AjaxController@getFreeToken')->name('user.account.getFreeToken');
    });

    Route::group(['namespace' => 'Transaction', 'prefix' => 'transaction'], function () {
        Route::get('/history', 'AjaxController@history')->name('user.transaction.history');
        Route::get('/withdraw', 'AjaxController@withdraw')->name('user.transaction.withdraw');
        Route::get('/deposit', 'AjaxController@deposit')->name('user.transaction.deposit');
    });
});

// store
Route::group(['namespace' => 'Store', 'prefix' => 'store'], function () {
    Route::group(['namespace' => 'Home', 'prefix' => 'home'], function () {
        Route::get('/', 'AjaxController@list')->name('store.home.list');
        Route::get('/detail/{id}', 'AjaxController@detail')->name('store.home.detail');
        Route::post('/create', 'AjaxController@create')->name('store.home.create');
        Route::post('/update', 'AjaxController@update')->name('store.home.update');
    });
    // User
    Route::group(['namespace' => 'User', 'prefix' => 'user'], function () {
        Route::get('/detail/{id}', 'AjaxController@detail')->name('store.user.detail');
        Route::post('/update', 'AjaxController@update')->name('store.user.update');
    });

    //
    Route::group(['namespace' => 'Product', 'prefix' => 'product'], function () {
        Route::get('/list', 'AjaxController@list')->name('store.product.list');
        Route::get('/search', 'AjaxController@search')->name('store.product.search');
    });
});
