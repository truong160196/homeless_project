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


//
Route::group(['namespace' => 'Account'], function () {
    Route::get('/login', 'WebController@login')->name('account.page.login');
    Route::get('/register', 'WebController@register')->name('account.page.register');
});


Route::group(['middleware' => ['auth.admin'], 'namespace' => 'Admin', 'prefix' => 'admin'], function () {
    //dashboard
    Route::get('/dashboard', 'AdminController@dashboard')->name('admin.page.dashboard');

    // auction
    Route::group(['namespace' => 'Auction', 'prefix' => 'auction'], function () {
        Route::get('/', 'WebController@index')->name('admin.page.auction');
    });

    // donate
    Route::group(['namespace' => 'Donate', 'prefix' => 'donate'], function () {
        Route::get('/', 'WebController@index')->name('admin.page.donate');
    });

    // history
    Route::group(['namespace' => 'History', 'prefix' => 'history'], function () {
        Route::get('/', 'WebController@index')->name('admin.page.history');
    });

    // Order
    Route::group(['namespace' => 'Order', 'prefix' => 'order'], function () {
        Route::get('/', 'WebController@index')->name('admin.page.order');
    });

    // Setting
    Route::group(['namespace' => 'Setting', 'prefix' => 'setting'], function () {
        Route::get('/', 'WebController@index')->name('admin.page.setting');
    });

    // User
    Route::group(['namespace' => 'User', 'prefix' => 'user'], function () {
        Route::get('/', 'WebController@index')->name('admin.page.user');
    });

});

// User role
Route::group(['namespace' => 'User'], function () {
    // home
    Route::get('/', 'HomeController@home')->name('user.page.home');
    Route::get('/home', 'HomeController@home');

    // donate
    Route::group(['namespace' => 'Donate', 'prefix' => 'donate'], function () {
        Route::get('/', 'WebController@list')->name('user.page.donate.list');
        Route::get('/detail/{id}', 'WebController@detail')->name('user.page.donate.detail');
    });

    // question
    Route::get('/faq', 'QuestionController@index')->name('user.page.faq');

    // contact
    Route::get('/contact', 'ContactController@index')->name('user.page.contact');;

    // about
    Route::get('/about', 'AboutController@index')->name('user.page.about');

    // auction
    Route::group(['namespace' => 'Auction', 'prefix' => 'auction'], function () {
        Route::get('/', 'WebController@list')->name('user.page.auction.list');
        Route::get('/detail/{id}', 'WebController@detail')->name('user.page.auction.detail');
    });

    // account
    Route::group(['namespace' => 'Account', 'prefix' => 'account'], function () {
        Route::get('/', 'WebController@index')->name('user.page.account');
        Route::get('/deposit', 'WebController@deposit')->name('user.page.deposit');
        Route::get('/withdraw', 'WebController@withdraw')->name('user.page.withdraw');
        Route::get('/setting', 'WebController@setting')->name('user.page.setting');
    });
});

Route::group(['namespace' => 'Store', 'prefix' => 'store'], function () {

    // home
    Route::group(['namespace' => 'Home'], function () {
        Route::get('/', 'WebController@index')->name('store.page.store.home');
    });

    // Account
    Route::group(['namespace' => 'Account', 'prefix' => 'account'], function () {
        Route::get('/', 'WebController@index')->name('store.page.store.account');
    });

    // Setting
    Route::group(['namespace' => 'Setting', 'prefix' => 'setting'], function () {
        Route::get('/', 'WebController@index')->name('store.page.store.setting');
    });
});
