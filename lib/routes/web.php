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
    Route::get('/logout', 'WebController@logout')->name('account.logout');
    Route::get('/register', 'WebController@register')->name('account.page.register');
});


Route::group(['middleware' => ['auth.admin'], 'namespace' => 'Admin', 'prefix' => 'admin'], function () {
    //dashboard
    Route::get('/dashboard', 'AdminController@dashboard')->name('admin.page.dashboard');

    // auction
    Route::group(['namespace' => 'Auction', 'prefix' => 'auction'], function () {
        Route::get('/', 'WebController@index')->name('admin.page.auction');
        Route::get('/create', 'WebController@create')->name('admin.page.auction.create');
        Route::get('/update/{id}', 'WebController@update')->name('admin.page.auction.update');
    });

    // donate
    Route::group(['namespace' => 'Donate', 'prefix' => 'donate'], function () {
        Route::get('/', 'WebController@index')->name('admin.page.donate');
        Route::get('/create', 'WebController@create')->name('admin.page.donate.create');
        Route::get('/update/{id}', 'WebController@update')->name('admin.page.donate.update');
        Route::get('/add-homeless/{id}', 'WebController@addHomeless')->name('admin.page.donate.add.homeless');
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
        Route::get('/donate/{id}', 'WebController@donate')->name('user.page.donate.donate');

        Route::get('/top-donate', 'AjaxController@top_donate')->name('user.page.donate.top');
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

        Route::get('/top-auction/{id}','AjaxController@top_auction')->name('user.page.auction.top');
        Route::post('/binding','AjaxController@binding')->name('user.page.auction.binding');
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
        Route::get('/', 'WebController@index')->name('store.page.home');
    });

    // Account
    Route::group(['namespace' => 'Dashboard', 'prefix' => 'dashboard'], function () {
        Route::get('/', 'WebController@index')->name('store.page.dashboard');
    });

    // Account
    Route::group(['namespace' => 'Account', 'prefix' => 'account'], function () {
        Route::get('/', 'WebController@index')->name('store.page.account');
        Route::get('/withdraw', 'WebController@withdraw')->name('store.page.account.withdraw');
        Route::get('/deposit', 'WebController@deposit')->name('store.page.account.deposit');
    });

    // Setting
    Route::group(['namespace' => 'Setting', 'prefix' => 'setting'], function () {
        Route::get('/', 'WebController@index')->name('store.page.setting');
    });
});

Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('config:clear');
    $exitCode = Artisan::call('config:cache');
    return 'DONE'; //Return anything
});
