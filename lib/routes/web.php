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

Route::get('/', function () {
    return view('web.page.dashboard.index');
});

//
Route::group(['namespace' => 'Account'], function () {
    Route::get('/login', 'WebController@login')->name('admin.page.login');
    Route::get('/register', 'WebController@register')->name('admin.page.register');
});


Route::group(['middleware' => ['auth.admin']], function () {
    Route::group(['namespace' => 'Admin'], function () {
        Route::get('/dashboard', 'AdminController@dashboard')->name('admin.page.dashboard');
    });
});

Route::group(['namespace' => 'User'], function () {
    // home
    Route::get('/', 'HomeController@home')->name('admin.page.home');
    Route::get('/home', 'HomeController@home');

    // donate
    Route::get('/donate', 'DonateController@list')->name('admin.page.donate.list');
    Route::get('/donate/detail/{id}', 'DonateController@detail')->name('admin.page.donate.detail');

    // question
    Route::get('/faq', 'QuestionController@index')->name('admin.page.faq');

    // contact
    Route::get('/contact', 'ContactController@index')->name('admin.page.contact');;

    // about
    Route::get('/about', 'AboutController@index')->name('admin.page.about');

    // auction
    Route::get('/auction', 'AuctionController@list')->name('admin.page.auction.list');
    Route::get('/auction/detail/{id}', 'AuctionController@detail')->name('admin.page.auction.detail');

    // account
    Route::get('/account', 'AccountController@index')->name('admin.page.account');
    Route::get('/account/deposit', 'AccountController@deposit')->name('admin.page.deposit');
    Route::get('/account/withdraw', 'AccountController@withdraw')->name('admin.page.withdraw');
    Route::get('/account/setting', 'AccountController@setting')->name('admin.page.setting');
});

Route::group(['namespace' => 'Store'], function () {
    Route::get('/store', 'StoreController@home')->name('admin.page.store.home');
});
