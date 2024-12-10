<?php

use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\TourController as AdminTourController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TourController;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Главная страница
Route::get('/', fn() => redirect('/tours'));
Route::get('/home', fn() => redirect('/tours'));

// Группируем маршруты админки
Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::resource('tours', AdminTourController::class)->names('admin.tours');
    Route::resource('categories', AdminCategoryController::class)->names('admin.categories');
    Route::resource('users', AdminUserController::class)->names('admin.users');
});

// Маршруты для пользователей (туров и категорий)
Route::resource('tours', TourController::class)->only(['index', 'show'])->names('user.tours');
Route::resource('categories', CategoryController::class)->only(['index'])->names('user.categories');

// Регистрация и вход пользователей

Route::get('/register', [UserController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [UserController::class, 'register']);
Route::get('/login', [UserController::class, 'showLoginForm'])->name('login');
Route::post('/login', [UserController::class, 'login']);
Route::post('/logout', [UserController::class, 'logout'])->name('logout');

Route::get('/user/edit', [UserController::class, 'edit'])->name('user.users.edit');
Route::post('/user/update', [UserController::class, 'update'])->name('user.users.update');

// Верификация электронной почты
Route::middleware(['auth'])->group(function () {
    Route::get('/email/verify', fn() => view('user.users.verify-email'))->name('verification.notice');
    Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
        $request->fulfill();
        return redirect('/tours');
    })->middleware('signed')->name('verification.verify');
    Route::post('/email/verification-notification', function (Request $request) {
        $request->user()->sendEmailVerificationNotification();
        return back()->with('message', 'Verification link sent!');
    })->middleware('throttle:6,1')->name('verification.send');
});
