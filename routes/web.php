<?php

use Illuminate\Support\Facades\Route;
use   App\Http\Controllers\HomeController;
use   App\Http\Controllers\CategoryController;
use   App\Http\Controllers\MealController;
use   App\Http\Controllers\FrontController;
use Illuminate\Support\Facades\Auth;

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


Route::get('/', [FrontController::class, 'index'])->name('frontPage');
Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'admin','middleware'=>['auth']], function() {
    //


    Route::resources([
        'categories'=>CategoryController::class,
        'meals'=>MealController::class,
        ]);
        Route::get('/trashed/meal', [MealController::class, 'trashed'])->name('meals.trashed');
        Route::get('/restore/meal/{id}', [MealController::class, 'restore'])->name('meals.restore');
        Route::delete('/hardDelete/meal/{id}', [MealController::class, 'hardDelete'])->name('meals.hardDelete');
    });
