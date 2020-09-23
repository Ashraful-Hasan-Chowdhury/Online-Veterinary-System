<?php

Route::group(['namespace' => 'Doctoradmin'], function() {
    Route::get('/', 'HomeController@index')->name('doctoradmin.dashboard');

    // Login
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('doctoradmin.login');
    Route::post('login', 'Auth\LoginController@login');
    Route::post('logout', 'Auth\LoginController@logout')->name('doctoradmin.logout');

    // Register
    Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('doctoradmin.register');
    Route::post('register', 'Auth\RegisterController@register');

    // Passwords
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('doctoradmin.password.email');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset');
    Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('doctoradmin.password.request');
    Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('doctoradmin.password.reset');

    // Must verify email
    Route::get('email/resend','Auth\VerificationController@resend')->name('doctoradmin.verification.resend');
    Route::get('email/verify','Auth\VerificationController@show')->name('doctoradmin.verification.notice');
    Route::get('email/verify/{id}/{hash}','Auth\VerificationController@verify')->name('doctoradmin.verification.verify');
});