<?php

use App\Http\Controllers\AdminTourController;
use App\Http\Controllers\TourController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


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

// Route::get('/', function () {
//     return view('welcome');
// });


// Группируем маршруты админки
Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/tours', [AdminTourController::class, 'index'])->name('admin.tours.index');
    Route::get('/tours/{id}/edit', [AdminTourController::class, 'edit'])->name('admin.tours.edit');
    Route::put('/tours/{id}', [AdminTourController::class, 'update'])->name('admin.tours.update');
});

Route::resource('tours', TourController::class);

Route::get('/tours', [TourController::class, 'index'])->name('tours.index');
Route::get('/tours/{tour}', [TourController::class, 'show'])->name('tours.show');

Route::get('/register', [UserController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [UserController::class, 'register']);
Route::get('/login', [UserController::class, 'showLoginForm'])->name('login');
Route::post('/login', [UserController::class, 'login']);
Route::post('/logout', [UserController::class, 'logout'])->name('logout');

