<?php

use App\Http\Controllers\AcademicController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\EnquiryController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\InfrastructureController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\Web\AcademicController as WebAcademicController;
use App\Http\Controllers\Web\BlogController as WebBlogController;
use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\Web\InfrastructureController as WebInfrastructureController;
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
            'infrastructure'    => InfrastructureController::class,
            'gallery'    => GalleryController::class,
            'news'    => NewsController::class,
            'course'    => CourseController::class,
            'academic'    => AcademicController::class,
            'document'    => DocumentController::class,
        ]);
    });
});

// Web Routes
// Route::get('/', function () {
//     return view('errors.construction');
// });

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::resource('blog', WebBlogController::class)->only(['show']);
Route::resource('infrastructure', WebInfrastructureController::class)->only(['show']);
Route::resource('academic', WebAcademicController::class)->only(['index', 'show']);
Route::post('/enquiry-submit', [EnquiryController::class, 'store'])->name('enquiry.submit');

Route::get('/members/governing-council-members', [TeamController::class, 'governingCouncil'])->name('members.governing-council');
Route::get('/members/teaching-staff', [TeamController::class, 'teachingStaff'])->name('members.teaching-staff');
Route::get('/{page}', [WebPageController::class, 'show'])->name('page.show');
