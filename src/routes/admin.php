<?php

//Auth::routes();
use Illuminate\Support\Facades\App;

Route::group(['middleware' => ['web']], function () {

    Route::get('lang/{locale}', 'OhhInk\Rrm\Admin\IndexController@setLang');
    Route::get('error', 'OhhInk\Rrm\Admin\IndexController@error')->name('error');

    Route::namespace('OhhInk\Rrm\Auth')->group(function () {
        Route::get('login/{lang?}', 'LoginController@showLoginForm')->name('login');
        Route::post('login', 'LoginController@login');
        Route::post('logout', 'LoginController@logout')->name('logout');
        //        Route::get('register', 'RegisterController@showRegistrationForm')->name('register');
        //        Route::post('register', 'RegisterController@register');
        //        Route::get('password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.request');
        //        Route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');
        //        Route::get('password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset');
        //        Route::post('password/reset', 'ResetPasswordController@reset')->name('password.update');
        //        Route::get('email/verify', 'VerificationController@show')->name('verification.notice');
        //        Route::get('email/verify/{id}/{hash}', 'VerificationController@verify')->name('verification.verify');
        //        Route::post('email/resend', 'VerificationController@resend')->name('verification.resend');

    });

    // 抛开权限认证
    Route::prefix(config('admin.prefix'))->middleware([
        'auth',
    ])->namespace('OhhInk\Rrm\Admin')->name('admin.')->group(function () {
        Route::any('/bind', 'IndexController@bind')->name('bind');
    });

    Route::prefix(config('admin.prefix'))->middleware([
        'auth',
        'admin'
    ])->namespace('OhhInk\Rrm\Admin')->name('admin.')->group(function () {
        Route::get('/', 'IndexController@index')->name('index');
        //        用户管理
        Route::prefix('user')->name('user.')->group(function () {
            Route::get('/', 'UserController@index')->name('');
            Route::get('/index', 'UserController@index')->name('index');
            Route::any('/create', 'UserController@create')->name('create');
            Route::post('/delete', 'UserController@delete')->name('delete');
            Route::any('/update/{id}', 'UserController@update')->name('update');
            Route::any('/assignment/{id}', 'UserController@assignment')->name('assignment');
        });

        Route::prefix('role')->name('role.')->group(function () {
            Route::get('/', 'RoleController@index')->name('');
            Route::get('/index', 'RoleController@index')->name('index');
            Route::post('/delete', 'RoleController@delete')->name('delete');
            Route::any('/create', 'RoleController@create')->name('create');
            Route::any('/update/{id}', 'RoleController@update')->name('update');
            Route::any('/assignment/{id}', 'RoleController@assignment')->name('assignment');
        });
        Route::prefix('permission')->name('permission.')->group(function () {
            Route::get('/', 'PermissionController@index')->name('');
            Route::get('/index', 'PermissionController@index')->name('index');
            Route::post('/delete', 'PermissionController@delete')->name('delete');
            Route::get('/reload', 'PermissionController@reload')->name('reload');
        });
        Route::prefix('menu')->name('menu.')->group(function () {
            Route::get('/', 'MenuController@index')->name('');
            Route::get('/index', 'MenuController@index')->name('index');
            Route::any('/create', 'MenuController@create')->name('create');
            Route::post('/delete', 'MenuController@delete')->name('delete');
            Route::any('/update/{id}', 'MenuController@update')->name('update');
            Route::any('/make', 'MenuController@make')->name('make');
            Route::any('/clear', 'MenuController@clear')->name('clear');
        });
        Route::prefix('op-log')->name('op-log.')->group(function () {
            Route::get('/', 'OpLogsController@index')->name('');
            Route::get('/index', 'OpLogsController@index')->name('index');
            Route::get('/view/{id}', 'OpLogsController@view')->name('view');
            Route::any('/clear', 'OpLogsController@clear')->name('clear');
        });
    });
});


Route::fallback(function () {
    return view('rrm::404');
});
