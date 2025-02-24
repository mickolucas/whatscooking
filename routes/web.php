<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

// ✅ Home Page
Route::get('/', function () {
    return view('home');
})->name('home');

// ✅ Meal Page
Route::get('/meal', function () {
    return view('meal');
})->name('meal');

// ✅ About Page
Route::get('/about', function () {
    return view('about');
})->name('about');

// ✅ Contact Page
Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.submit');