<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AppcartUsersController;
use App\Http\Controllers\Auth\LoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and will be assigned to
| the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/users/create', [AppcartUsersController::class, 'create'])->name('users.create');
Route::post('/users/create', [AppcartUsersController::class, 'store'])->name('users.store');


Route::get('/login', [LoginController::class, 'loginForm'])->name('login');

Route::post('/login', [LoginController::class, 'login']);

Route::middleware('auth')->group(function () {
    Route::get('/users', [AppcartUsersController::class, 'index'])->name('users.index');
    Route::get('/users/{user}/edit', [AppcartUsersController::class, 'edit'])->name('users.edit');
    Route::put('/users/{user}', [AppcartUsersController::class, 'update'])->name('users.update');
    Route::delete('/users/{user}', [AppcartUsersController::class, 'destroy'])->name('users.destroy');
});
