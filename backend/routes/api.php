<?php
Route::group([
    'middleware' => 'api',
], function () {

    Route::post('login', 'AuthController@login');
    Route::post('signup', 'AuthController@signup');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
    Route::post('sendPasswordResetLink', 'ResetPasswordController@sendEmail');
    Route::post('resetPassword', 'ChangePasswordController@process');
    Route::get('getMenu','MenuController@getAllMenus');
    Route::post('createMenu','MenuController@createMenu');
    Route::post('createMenuDetail/{id}','Menu_detailController@createDetailMenu');
    Route::post('editMenu/{id}','MenuController@editMenu');
    Route::post('editDetailMenu/{id}','Menu_detailController@editDetailMenu');
    Route::get('deleteMenu/{id}','MenuController@deleteMenu');
    Route::get('deleteDetailMenu/{id}','Menu_detailController@deleteDetailMenu');
    // Route::get('getMenu_detail','Menu_detailController@getAllMenu_details');
});