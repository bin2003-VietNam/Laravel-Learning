<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisterdUserController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;

Route::get('/', [JobController::class, 'index'])->name('index');

Route::get('/jobs/create', [JobController::class, 'create'])->middleware('auth');
Route::post('/jobs', [JobController::class, 'store'])->middleware('auth');

Route::get('/search', SearchController::class);
Route::get('/tags/{tag}', TagController::class);

Route::middleware('auth')->group(function () {
    Route::post('/login', [SessionController::class, 'store']);
    Route::post('/register', [RegisterdUserController::class, 'store']);
    Route::get('/register', [RegisterdUserController::class, 'create']);
    Route::get('/login', [SessionController::class, 'create']);
});

Route::delete('/logout', [SessionController::class, 'destroy'])->middleware('auth');