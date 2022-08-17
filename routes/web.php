<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [\App\Http\Controllers\ExamController::class, 'index']);
Route::get('/exam/{id}', [\App\Http\Controllers\ExamController::class, 'details'])->name("exam.details");
Route::get('/exam/remove/question/{id}', [\App\Http\Controllers\ExamController::class, 'delete'])->name("remove.question");
Route::post('/exam/question/create', [\App\Http\Controllers\ExamController::class, 'create'])->name("create.question");
