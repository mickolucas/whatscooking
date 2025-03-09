<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\IngredientController;
use App\Http\Controllers\MealController;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

// Authentication Routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.submit');

// Ingredient Routes
Route::get('/ingredients', [IngredientController::class, 'index'])->name('ingredients.index');
Route::post('/ingredients', [IngredientController::class, 'store'])->name('ingredients.store');
Route::delete('/ingredients/{id}', [IngredientController::class, 'destroy'])->name('ingredients.destroy');

// Meal Routes
Route::get('/meal', [MealController::class, 'index'])->name('meal.index');
Route::post('/meal/suggest', [MealController::class, 'fetchRecipes'])->name('meal.suggest');

// AI Routes
Route::post('/ai/suggest-substitutes', [MealController::class, 'suggestSubstitutes'])->name('ai.suggest.substitutes');
Route::post('/ai/cooking-assistant', [MealController::class, 'aiCookingAssistant'])->name('ai.cooking.assistant');