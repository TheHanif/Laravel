<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', 'HomeController@index');

/**
 * Facebook authentication
 */
Route::get('auth/facebook', [ 'as' => 'facebook', 'uses' => 'Auth\AuthController@authFacebook' ]);

Route::auth();

/**
 * ADMIN
 */
Route::group(['prefix'=>'admin', 'as'=>'admin.', 'middleware' => 'custom:admin'], function () {
    Route::get('dashboard', ['as' => 'dashboard', function () {
        return 'Admin dashboard';
    }]);
});

/**
 * BRANCH
 */
Route::group(['prefix'=>'branch', 'as'=>'branch.', 'middleware' => 'custom:branch'], function () {
    Route::get('dashboard', ['as' => 'dashboard', function () {
        return 'Branch dashboard';
    }]);
});

/**
 * CUSTOMER
 */
Route::group(['as' => 'customer.', 'middleware' => 'custom:customer'], function () {
    Route::get('dashboard', ['as' => 'dashboard', function () {
        return 'Customer dashboard';
    }]);
});