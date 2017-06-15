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


/**
 * Auth routes
 */
Route::group(['namespace' => 'Auth'], function () {

    // Authentication Routes...
    Route::get('login', 'LoginController@showLoginForm')->name('login');
    Route::post('login', 'LoginController@login');
    Route::get('logout', 'LoginController@logout')->name('logout');

    // Registration Routes...
    if (config('auth.users.registration')) {
        Route::get('register', 'RegisterController@showRegistrationForm')->name('register');
        Route::post('register', 'RegisterController@register');
    }

    // Password Reset Routes...
    Route::get('password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('password/reset', 'ResetPasswordController@reset');

    // Confirmation Routes...
    if (config('auth.users.confirm_email')) {
        Route::get('confirm/{user_by_code}', 'ConfirmController@confirm')->name('confirm');
        Route::get('confirm/resend/{user_by_email}', 'ConfirmController@sendEmail')->name('confirm.send');
    }

    // Social Authentication Routes...
    Route::get('social/redirect/{provider}', 'SocialLoginController@redirect')->name('social.redirect');
    Route::get('social/login/{provider}', 'SocialLoginController@login')->name('social.login');
});

/**
 * Backend routes
 */
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {

    // Dashboard
    Route::get('/', 'Admin\DashboardController@index')->name('dashboard');

    //Users
    Route::get('users', 'Admin\UserController@index')->name('users');
    Route::get('users/{user}', 'Admin\UserController@show')->name('users.show');
    Route::get('users/{user}/edit', 'Admin\UserController@edit')->name('users.edit');
    Route::put('users/{user}', 'Admin\UserController@update')->name('users.update');
    Route::delete('users/{user}', 'Admin\UserController@destroy')->name('users.destroy');
    Route::get('license', 'NetLicensing\LicenseController@index')->name('license');
});


Route::get('/', 'HomeController@index');

/**
 * NetLicensing
 */

Route::group(['namespace' => 'NetLicensing', 'prefix' => 'netlisensing', 'as' => 'netlisensing.'], function () {

    //Route::get('demo', 'DemoController@index')->name('demo')->middleware('netlicensing:lb_product_module,netlisensing.demo.shop');
    Route::get('demo', 'DemoController@index')->name('demo');
    Route::get('demo/shop/{licensee}', 'DemoController@shop')->name('demo.shop');
});
