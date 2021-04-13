<?php

use App\Models\Subscripe;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

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




Auth::routes();
//email
Route::post('/send-mail', [App\Http\Controllers\MailController::class, 'sendemail'])->name('sendemail');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin');

//index languages
Route::get('/admin/languages', [App\Http\Controllers\LanguageController::class, 'index'])->name('languages.index');

//create languages
Route::get('/admin/languages/create', [App\Http\Controllers\LanguageController::class, 'create'])->name('languages.create');
Route::post('/admin/languages/store', [App\Http\Controllers\LanguageController::class, 'store'])->name('languages.store');

//edit languages
Route::get('/admin/languages/{id}/edit', [App\Http\Controllers\LanguageController::class, 'edit'])->name('languages.edit');
Route::post('/admin/languages/{id}/update', [App\Http\Controllers\LanguageController::class, 'update'])->name('languages.update');

//delete languages
Route::post('/admin/languages/destroy/{id}', [App\Http\Controllers\LanguageController::class, 'destroy'])->name('languages.destroy');

//index page
Route::get('/admin/pages', [App\Http\Controllers\PageController::class, 'index'])->name('pages.index');

//create page
Route::get('/admin/pages/create', [App\Http\Controllers\PageController::class, 'create'])->name('pages.create');
Route::post('/admin/pages/store', [App\Http\Controllers\PageController::class, 'store'])->name('pages.store');

//edit language
Route::get('/admin/pages/{page}/edit', [App\Http\Controllers\PageController::class, 'edit'])->name('pages.edit');
Route::post('/admin/pages/{id}/update', [App\Http\Controllers\PageController::class, 'update'])->name('pages.update');

//delete page
Route::post('/admin/pages/destroy/{id}', [App\Http\Controllers\PageController::class, 'destroy'])->name('pages.destroy');

//index posts
Route::get('/admin/posts', [App\Http\Controllers\PostController::class, 'index'])->name('posts.index');

//create posts
Route::get('/admin/posts/create', [App\Http\Controllers\PostController::class, 'create'])->name('posts.create');
Route::post('/admin/posts/store', [App\Http\Controllers\PostController::class, 'store'])->name('posts.store');

//edit posts
Route::get('/admin/posts/{id}/edit', [App\Http\Controllers\PostController::class, 'edit'])->name('posts.edit');
Route::post('/admin/posts/{id}/update', [App\Http\Controllers\PostController::class, 'update'])->name('posts.update');

//delete posts
Route::post('/admin/posts/destroy/{id}', [App\Http\Controllers\PostController::class, 'destroy'])->name('posts.destroy');


//index users
Route::get('/admin/users', [App\Http\Controllers\UserController::class, 'index'])->name('users.index');

//create users
Route::get('/admin/users/create', [App\Http\Controllers\UserController::class, 'create'])->name('users.create');
Route::post('/admin/users/store', [App\Http\Controllers\UserController::class, 'store'])->name('users.store');

//edit users
Route::get('/admin/users/{id}/edit', [App\Http\Controllers\UserController::class, 'edit'])->name('users.edit');
Route::post('/admin/users/{id}/update', [App\Http\Controllers\UserController::class, 'update'])->name('users.update');

//delete users
Route::post('/admin/users/destroy/{id}', [App\Http\Controllers\UserController::class, 'destroy'])->name('users.destroy');


//index galleries
Route::get('/admin/{id}/galleries', [App\Http\Controllers\GalleryController::class, 'index'])->name('galleries.index');

//create galleries
Route::get('/admin/galleries/{id}/create', [App\Http\Controllers\GalleryController::class, 'create'])->name('galleries.create');
Route::post('/admin/galleries/{id}/store', [App\Http\Controllers\GalleryController::class, 'store'])->name('galleries.store');

//edit galleries
Route::get('/admin/galleries/{id}/edit', [App\Http\Controllers\GalleryController::class, 'edit'])->name('galleries.edit');
Route::post('/admin/galleries/{id}/update', [App\Http\Controllers\GalleryController::class, 'update'])->name('galleries.update');

//delete galleries
Route::post('/admin/galleries/destroy/{id}', [App\Http\Controllers\GalleryController::class, 'destroy'])->name('galleries.destroy');


//index banners
Route::get('/admin/banners', [App\Http\Controllers\BannerController::class, 'index'])->name('banners.index');

//create banners
Route::get('/admin/banners/create', [App\Http\Controllers\BannerController::class, 'create'])->name('banners.create');
Route::post('/admin/banners/store', [App\Http\Controllers\BannerController::class, 'store'])->name('banners.store');

//edit banners
Route::get('/admin/banners/{id}/edit', [App\Http\Controllers\BannerController::class, 'edit'])->name('banners.edit');
Route::post('/admin/banners/{id}/update', [App\Http\Controllers\BannerController::class, 'update'])->name('banners.update');

//delete banners
Route::post('/admin/banners/destroy/{id}', [App\Http\Controllers\BannerController::class, 'destroy'])->name('banners.destroy');


//index massage
Route::get('/admin/massages/index', [App\Http\Controllers\MassageController::class, 'index'])->name('massages.index');

//delete massage
Route::post('/admin/massages/destroy/{id}', [App\Http\Controllers\MassageController::class, 'destroy'])->name('massages.destroy');

//index reservations
Route::get('/admin/reservations/index', [App\Http\Controllers\ReservationController::class, 'index'])->name('reservations.index');

//delete reservations
Route::post('/admin/reservations/destroy/{id}', [App\Http\Controllers\ReservationController::class, 'destroy'])->name('reservations.destroy');

//index settings
Route::get('/admin/settings', [App\Http\Controllers\SettingController::class, 'index'])->name('settings.index');

//create settings
Route::get('/admin/settings/create', [App\Http\Controllers\SettingController::class, 'create'])->name('settings.create');
Route::post('/admin/settings/store', [App\Http\Controllers\SettingController::class, 'store'])->name('settings.store');

//edit settings
Route::get('/admin/settings/{id}/edit', [App\Http\Controllers\SettingController::class, 'edit'])->name('settings.edit');
Route::post('/admin/settings/{id}/update', [App\Http\Controllers\SettingController::class, 'update'])->name('settings.update');

//delete settings
Route::post('/admin/settings/destroy/{id}', [App\Http\Controllers\SettingController::class, 'destroy'])->name('settings.destroy');

//index settings
Route::get('/admin/subscripe', [App\Http\Controllers\SubscribeController::class, 'index'])->name('subscripe.index');

//create subscripe
Route::get('/admin/subscripe/create', [App\Http\Controllers\SubscribeController::class, 'create'])->name('subscripe.create');
Route::post('/admin/subscripe/store', [App\Http\Controllers\SubscribeController::class, 'store'])->name('subscripe.store');

//edit subscripe
Route::get('/admin/subscripe/{id}/edit', [App\Http\Controllers\SubscribeController::class, 'edit'])->name('subscripe.edit');
Route::post('/admin/subscripe/{id}/update', [App\Http\Controllers\SubscribeController::class, 'update'])->name('subscripe.update');

//delete subscripe
Route::post('/admin/subscripe/destroy/{id}', [App\Http\Controllers\SubscribeController::class, 'destroy'])->name('subscripe.destroy');


Route::get('/error', 'HomeController@errorPage')->name('error.page');

Route::group(['prefix'=>'{lang?}','middleware' => 'Lang'] , function() {

    Route::get('/{slug}', [App\Http\Controllers\FrontEndController::class, 'page'])->middleware('parents')->name('page');

    Route::get('/', 'FrontEndController@index')->name('index');
    Route::post('/messages/store', [App\Http\Controllers\MassageController::class, 'store'])->name('messages.store');
    Route::post('/reservations/store', [App\Http\Controllers\ReservationController::class, 'store'])->name('reservations.store');
    Route::get('/{slug1}/{slug2}', [App\Http\Controllers\FrontEndController::class, 'subpage'])->name('sub.page');
    Route::get('/{slug1}/{slug2}/{slug3}', [App\Http\Controllers\FrontEndController::class, 'detailspage'])->name('details.page');



});


//front index
