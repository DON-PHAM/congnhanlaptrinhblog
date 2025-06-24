<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\SettingController;
use App\Models\Setting;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::resource('categories', CategoryController::class);
    Route::resource('posts', PostController::class);
    Route::resource('comments', CommentController::class);
    Route::resource('settings', SettingController::class);
    Route::resource('users', UserController::class);
    Route::resource('abouts', AboutController::class);
    Route::resource('tags', TagController::class);
});

// Helper route lấy giá trị setting theo key
Route::get('/setting/{key}', function ($key) {
    $setting = Setting::where('key', $key)->first();
    return $setting ? $setting->value : '';
})->middleware(['auth', 'admin']);

// Route hiển thị danh sách category ở frontend
Route::get('/categories', [CategoryController::class, 'listFrontend'])->name('frontend.categories.list');
// Route hiển thị bài viết theo category ở frontend
Route::get('/category/{slug}', [CategoryController::class, 'postsByCategory'])->name('frontend.categories.posts');

Route::get('/post/{slug}', [PostController::class, 'showFrontend'])->name('frontend.posts.detail');

// Route tăng lượt xem bài viết qua AJAX
Route::post('/post/{id}/view', [PostController::class, 'increaseView'])->name('frontend.posts.increaseView');

// Route API lấy danh sách bài viết cho lazy load trang chủ
Route::get('/api/posts', [App\Http\Controllers\HomeController::class, 'lazyLoadPosts'])->name('api.posts.lazy');

Route::get('/search', [PostController::class, 'search'])->name('frontend.search');

// Trang about cá nhân frontend
Route::get('/about', [AboutController::class, 'aboutFrontend'])->name('frontend.about');