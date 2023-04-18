<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RankController;
use App\Http\Controllers\TrainingController;

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

Route::get('/', function () {
    return view('welcome');
})->name('home');
Route::get('/users', [UserController::class, 'index'])->name('users');
Route::get('/user/{id}', [UserController::class, 'show'])->name('user');
Route::post('/promote/{id}', [UserController::class, 'promote'])->name('promote');
Route::post('/demote/{id}', [UserController::class, 'demote'])->name('demote');

Route::get('/training', [TrainingController::class, 'index'])->name('training.overview');

Route::get('/ranks', [RankController::class, 'index'])->name('ranks');


