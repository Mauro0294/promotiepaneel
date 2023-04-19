<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RankController;
use App\Http\Controllers\TrainingController;
use App\Http\Controllers\AuthController;

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
    return redirect('users');
})->name('home');

// add auth middleware to all routes
Route::middleware(['auth'])->group(function () {
    Route::get('/users', [UserController::class, 'index'])->name('users');
    Route::get('/user/{id}', [UserController::class, 'show'])->name('user');
    Route::post('/promote/{id}', [UserController::class, 'promote'])->name('promote');
    Route::post('/demote/{id}', [UserController::class, 'demote'])->name('demote');
    
    Route::get('/training', [TrainingController::class, 'index'])->name('trainings.overview');
    Route::post('/training/claim/{id}', [TrainingController::class, 'claimTraining'])->name('training.claim');

    Route::post('/training/success/{id}', [TrainingController::class, 'trainingSuccess'])->name('training.success');
    Route::post('/training/fail/{id}', [TrainingController::class, 'trainingFail'])->name('training.fail');

    Route::get('/trainings/claimed', [TrainingController::class, 'claimedTrainings'])->name('trainings.claimed');
    
    Route::get('/ranks', [RankController::class, 'index'])->name('ranks');
});

// Authentication routes
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login-request', [AuthController::class, 'loginRequest'])->name('loginRequest'); 
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register-request', [AuthController::class, 'registerRequest'])->name('registerRequest'); 
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

