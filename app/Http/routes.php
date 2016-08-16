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

use App\User;
use App\Role;

Route::get('/role/{user}/{role}', function ($user, $role){
    $user = User::where('id', '=', $user)->first();
    $user->roles()->attach($role);
});

Route::get('/permission/{role}/{per}', function ($role, $per){
    $role = Role::where('id', '=', $role)->first();
    $role->attachPermission($per);
});

Route::get('/', function () {

    return view('frontend.welcome');
});

Route::get('/home', 'HomeController@index');

/**
 * Facebook authentication
 */
Route::get('auth/facebook', [ 'as' => 'facebook', 'uses' => 'Auth\AuthController@authFacebook' ]);

Route::auth();

/**
 * APIs
 */
Route::group(['prefix'=>'api', 'as'=>'admin.', 'middleware' => 'auth:api'], function () {
    
    // APIs routes goes here
    // $request->wantsJson();

    Route::get('test/{id}', ['as' => 'dashboard', 'uses' => 'HomeController@test']);

});

/**
 * ADMIN
 */
Route::group(['prefix'=>'admin', 'as'=>'admin.', 'middleware' => ['auth','custom:admin']], function () {
    Route::get('dashboard', ['middleware' => ['permission:create-users'], 'as' => 'dashboard', function () {
        return 'Admin dashboard';
    }]);
});

/**
 * BRANCH
 */
Route::group(['prefix'=>'branch', 'as'=>'branch.', 'middleware' => ['auth','custom:branch']], function () {
    Route::get('dashboard', ['as' => 'dashboard', function () {
        return 'Branch dashboard';
    }]);
});

/**
 * CUSTOMER
 */
Route::group(['as' => 'customer.', 'middleware' => ['auth','custom:customer']], function () {
    Route::get('dashboard', ['as' => 'dashboard', function () {
        return 'Customer dashboard';
    }]);
});
Route::auth();

Route::get('/home', 'HomeController@index');
