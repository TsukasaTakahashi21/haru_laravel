<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminBlogController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;

// HOMEページ
Route::get('/', [HomeController::class, 'index'])->name('home');

// Haruページ
Route::get('/haru', function () { return view('haru');})->name('haru');

// お部屋紹介ページ
Route::get('/room', function () {return view('room-photos');})->name('room');

// ブログ一覧ページ
Route::get('/blogs', [HomeController::class, 'blog_lists'])->name('public_blog_lists');

// ブログ詳細ページ
Route::get('/blogs/{id}', [HomeController::class, 'blog_detail'])->name('public_blog_detail');

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

// ブログのコメント保存
Route::post('/blog/{blog}/comments', [CommentController::class, 'store'])->name('comments.store');

// ブログのコメント削除
Route::delete('/comments{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');

// ブログの編集機能
Route::get('/blog/{blog}/edit', [AdminBlogController::class, 'edit'])->name('admin_blog.edit');
Route::put('_blog/{blog}', [AdminBlogController::class, 'update'])->name('admin_blog.update');

// ブログの削除機能
Route::delete('/blog/{blog}', [AdminBlogController::class, 'destroy'])->name('admin_blog.destroy');