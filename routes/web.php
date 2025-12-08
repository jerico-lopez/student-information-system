<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('index');
    });

    Route::controller(StudentController::class)->group(function () {
        Route::get('/students', 'index');
        Route::get('/students/create', 'create');
        Route::post('/students', 'store');
        Route::get('/students/{student}', 'show');
        Route::get('/students/edit/{student}', 'edit');
        Route::put('/students/update/{student}', 'update');
        Route::get('/students/delete/{student}', 'delete');
        Route::delete('/students/destroy/{student}', 'destroy');
    });
});

Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'showLoginForm')->name('login');
    Route::post('/login', 'login');
    Route::get('/logout', 'showLogoutConfirmation');
    Route::post('/logout', 'logout');
});
