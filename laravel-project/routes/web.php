<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;


// HOMEページ
Route::get('/', function () { return view('home');})->name('home');

// Haruページ
Route::get('/haru', function () { return view('haru');})->name('haru');

// 予約ページ
Route::get('/reservation', function() {return view('reservation');})->name('reservation');

// ブログ一覧ページ
Route::get('/blog', function() { return view('blog');})->name('blog');

// ブログ詳細ページ
Route::get('/blog_detail', function() { return view('blog_detail');})->name('blog_detail');

// 管理者ログインページ
Route::get('/admin/login', [AdminController::class, 'showLoginForm'])->name('admin.login_form');
Route::post('/admin/login', [AdminController::class,'login'])->name('admin.login');

// 管理者ログアウト
Route::post('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

// 管理者ログインページのダッシュボード
Route::middleware('admin')->group(function() {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
});