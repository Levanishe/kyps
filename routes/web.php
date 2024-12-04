<?php

use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\TourController as AdminTourController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TourController;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return redirect('/tours');
});
Route::get('/home', function () {
    return redirect('/tours');
});

// Группируем маршруты админки
Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/tours', [AdminTourController::class, 'index'])->name('admin.tours.index');
    Route::get('/tours/{tour}', [AdminTourController::class, 'show'])->name('admin.tours.show');
    Route::get('/tour/create', [AdminTourController::class, 'create'])->name('admin.tours.create');
    Route::post('/tours', [AdminTourController::class, 'store'])->name('admin.tours.store'); // Маршрут для хранения нового тура
    Route::get('/tours/{tour}/edit', [AdminTourController::class, 'edit'])->name('admin.tours.edit');
    Route::put('/tours/{tour}', [AdminTourController::class, 'update'])->name('admin.tours.update');
    Route::delete('/tours/{tour}', [AdminTourController::class, 'destroy'])->name('admin.tours.destroy');

    Route::get('/categories', [AdminCategoryController::class, 'index'])->name('admin.categories.index');
    Route::get('/categories/create', [AdminCategoryController::class, 'create'])->name('admin.categories.create');
    Route::post('/categories', [AdminCategoryController::class, 'store'])->name('admin.categories.store');
    Route::get('/categories/{category}/edit', [AdminCategoryController::class, 'edit'])->name('admin.categories.edit');
    Route::put('/categories/{category}', [AdminCategoryController::class, 'update'])->name('admin.categories.update');
    Route::delete('/categories/{category}', [AdminCategoryController::class, 'destroy'])->name('admin.categories.destroy');
});


Route::resource('tours', TourController::class);
Route::get('/tours', [TourController::class, 'index'])->name('user.tours.index');
Route::get('/tours/{tour}', [TourController::class, 'show'])->name('user.tours.show');

Route::get('/categories', [CategoryController::class, 'index'])->name('user.categories.index');

Route::get('/register', [UserController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [UserController::class, 'register']);
Route::get('/login', [UserController::class, 'showLoginForm'])->name('login');
Route::post('/login', [UserController::class, 'login']);
Route::post('/logout', [UserController::class, 'logout'])->name('logout');

// Route::middleware(['auth', 'verified'])->group(function () {

// });

    //Уведомление о проверке электронной почты - Показать страницу верификации:
    Route::get('/email/verify', function () {
        return view('user.users.verify-email');
    })->middleware('auth')->name('verification.notice');
    //Обработчик проверки электронной почты - Обработчик верификации:
    Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
        $request->fulfill();
        return redirect('/tours');
    })->middleware(['auth', 'signed'])->name('verification.verify');
    //Повторная отправка проверочного письма
    Route::post('/email/verification-notification', function (Request $request) {
        $request->user()->sendEmailVerificationNotification();
        return back()->with('message', 'Verification link sent!');
    })->middleware(['auth', 'throttle:6,1'])->name('verification.send');