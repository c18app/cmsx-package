<?php
Route::group(['middleware' => ['web']], function () {
    Route::get('storage/{folder}/{filename}', function ($folder, $filename) {
        $path = storage_path() . '/app/public/' . $folder . '/' . $filename;

        if (!File::exists($path)) {
            abort(404);
        }

        $file = File::get($path);
        $type = File::mimeType($path);

        $response = Response::make($file, 200);
        $response->header("Content-Type", $type);
        return $response;
    })->name('storage');

    Route::get('login', 'Cms18\CmsX\Controllers\Auth\LoginController@showLoginForm')->name('login');
    Route::post('login', 'Cms18\CmsX\Controllers\Auth\LoginController@login');
    Route::get('logout', 'Cms18\CmsX\Controllers\Auth\LoginController@logout')->name('logout');

    Route::get('register', 'Cms18\CmsX\Controllers\Auth\RegisterController@showRegistrationForm')->name('register');
    Route::post('register', 'Cms18\CmsX\Controllers\Auth\RegisterController@register');

    Route::get('password/reset', 'Cms18\CmsX\Controllers\Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('password/email', 'Cms18\CmsX\Controllers\Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('password/reset/{token}', 'Cms18\CmsX\Controllers\Auth\ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('password/reset', 'Cms18\CmsX\Controllers\Auth\ResetPasswordController@reset');

    Route::prefix('admin')->group(function() {
        Route::redirect('/', 'admin/dashboard');
        Route::get('dashboard', 'Cms18\CmsX\Controllers\Admin\AdminController@dashboard')->name('admin.dashboard');

        Route::resources([
            'pages' => 'Cms18\CmsX\Controllers\Admin\PageController',
            'tags' => 'Cms18\CmsX\Controllers\Admin\TagController'
        ]);

        Route::post('{type}/sort', 'Cms18\CmsX\Controllers\Admin\AdminController@sort')->name('admin.sort');

        Route::view('article', 'cmsx::admin.nocontent')->name('admin.article');
        Route::view('content', 'cmsx::admin.nocontent')->name('admin.content');
        Route::view('comment', 'cmsx::admin.nocontent')->name('admin.comment');
        Route::view('file', 'cmsx::admin.nocontent')->name('admin.file');
        Route::view('gallery', 'cmsx::admin.nocontent')->name('admin.gallery');
        Route::view('category', 'cmsx::admin.nocontent')->name('admin.category');
        Route::view('menu', 'cmsx::admin.nocontent')->name('admin.menu');
        Route::view('user', 'cmsx::admin.nocontent')->name('admin.user');
        Route::view('maillist', 'cmsx::admin.nocontent')->name('admin.maillist');
        Route::view('setting', 'cmsx::admin.nocontent')->name('admin.setting');
        Route::view('translate', 'cmsx::admin.nocontent')->name('admin.translate');
    });

    Route::get('page/{id}-{slug}', 'Cms18\CmsX\Controllers\CmsController@page')->name('cms.page');

    Route::get('/', 'Cms18\CmsX\Controllers\CmsController@index')->name('homepage');
});