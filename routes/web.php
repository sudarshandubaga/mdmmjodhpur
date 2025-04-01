<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EnquiryController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\Web\PageController as WebPageController;
use Illuminate\Support\Facades\Route;

// Admin Routes
Route::group([
    'prefix' => 'school-panel',
], function () {
    Route::get('/login', [LoginController::class, 'showLogin'])->name('login');
    Route::post('/login', [LoginController::class, 'doLogin']);


    Route::group([
        'middleware' => 'auth',
        'as' => 'admin.'
    ], function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
        Route::get('/site-setting', [SiteController::class, 'create'])->name('site.edit');
        Route::put('/site-setting', [SiteController::class, 'update'])->name('site.update');

        Route::resources([
            'slider'            => SliderController::class,
            'faq'               => FaqController::class,
            'enquiry'           => EnquiryController::class,
            'blog'              => BlogController::class,
            'page'              => PageController::class,
            'team'              => TeamController::class,
        ]);
    });
});

// Web Routes
Route::get('/', function () {
    return view('errors.construction');
});

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/{page}', [WebPageController::class, 'show'])->name('page.show');
