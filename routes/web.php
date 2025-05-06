<?php

use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\CommentLikeController;
use App\Http\Controllers\ShareController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\GroupController;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::put('password', [PasswordController::class, 'update'])->name('password.update');

Route::get('/home', function () {
    return view('home');
})->middleware(['auth', 'verified'])->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
    Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.delete');
    Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');
});

Route::post('/posts/{post}/comments', [CommentController::class, 'store'])->name('comments.store');

Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');

Route::post('/comments/{comment}/like', [CommentLikeController::class, 'store'])->name('comments.like');
Route::delete('/comments/{comment}/like', [CommentLikeController::class, 'destroy'])->name('comments.unlike');

Route::post('/posts/{post}/like', [LikeController::class, 'store'])->name('likes.store');
Route::delete('/posts/{post}/like', [LikeController::class, 'destroy'])->name('likes.destroy');


Route::post('/messages', [MessageController::class, 'store'])->name('messages.store');
Route::get('/messages/{user}', [MessageController::class, 'show'])->name('messages.show');
Route::get('/messages/fetch/{userId}', [MessageController::class, 'fetch'])->name('messages.fetch');
Route::post('/messages/{messageId}/read', [MessageController::class, 'markAsRead'])->name('messages.markAsRead');

Route::post('/notifications/{userId}', [NotificationController::class, 'store'])->name('notifications.store');
Route::get('/notifications', [NotificationController::class, 'show'])->name('notifications.show');
Route::post('/notifications/{notificationId}/read', [NotificationController::class, 'markAsRead'])->name('notifications.markAsRead');
Route::patch('/notifications/{id}/read', [NotificationController::class, 'markAsRead'])->name('notifications.read');

Route::middleware('auth')->group(function () {
    Route::get('/pages', [PageController::class, 'index'])->name('pages.index');
    Route::get('/pages/create', [PageController::class, 'create'])->name('pages.create');
    Route::post('/pages', [PageController::class, 'store'])->name('pages.store');
    Route::get('/pages/{id}', [PageController::class, 'show'])->name('pages.show');
    Route::get('/pages/{id}/edit', [PageController::class, 'edit'])->name('pages.edit');
    Route::put('/pages/{id}', [PageController::class, 'update'])->name('pages.update');
    Route::delete('/pages/{id}', [PageController::class, 'destroy'])->name('pages.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/groups', [GroupController::class, 'index'])->name('groups.index');
    Route::get('/groups/create', [GroupController::class, 'create'])->name('groups.create');
    Route::post('/groups', [GroupController::class, 'store'])->name('groups.store');
    Route::get('/groups/{id}', [GroupController::class, 'show'])->name('groups.show');
    Route::post('/groups/{id}/join', [GroupController::class, 'join'])->name('groups.join');
    Route::post('/groups/{id}/leave', [GroupController::class, 'leave'])->name('groups.leave');
});

Route::get('/shares', [ShareController::class, 'index'])->name('shares.index');
Route::post('/posts/{post}/share', [ShareController::class, 'store'])->name('posts.share');
Route::delete('/posts/{post}/unshare', [ShareController::class, 'destroy'])->name('posts.unshare');
