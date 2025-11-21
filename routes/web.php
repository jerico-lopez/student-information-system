<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/students', [StudentController::class, 'index']);
Route::get('/students/create', [StudentController::class, 'create']);
Route::post('/students', [StudentController::class, 'store']);
Route::get('/students/{student}', [StudentController::class, 'show']);
Route::get('/students/edit/{student}', [StudentController::class, 'edit']);
Route::put('/students/update/{student}', [StudentController::class, 'update']);
Route::get('/students/delete/{student}', [StudentController::class, 'delete']);
Route::delete('/students/destroy/{student}', [StudentController::class, 'destroy']);

