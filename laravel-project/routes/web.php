<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminBlogController;

// HOMEページ
Route::get('/', function () { return view('home');})->name('home');

// Haruページ
Route::get('/haru', function () { return view('haru');})->name('haru');

// 予約ページ
Route::get('/reservation', function() {return view('reservation');})->name('reservation');


// 管理者用のRoute

// 管理者ログインページ
Route::get('/admin/login', [AdminController::class, 'showLoginForm'])->name('admin.login_form');
Route::post('/admin/login', [AdminController::class,'login'])->name('admin.login');

// 管理者ログアウト
Route::post('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

// 管理者ログインページのダッシュボード
Route::middleware('admin')->group(function() {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
});

// 管理者ブログ作成ページ
Route::get('/admin/blog/create', [AdminBlogController::class, 'create'])->name('admin_blog.create');
Route::post('/admin/blog/store', [AdminBlogController::class, 'store'])->name('admin_blog.store');

// 管理者ブログ一覧ページ
Route::get('/admin/blogs', [AdminBlogController::class, 'index'])->name('admin_blog.index');

// 管理者ブログ詳細ページ
Route::get('/admin/blog/{id}', [AdminBlogController::class, 'show'])->name('admin_blog.detail');

