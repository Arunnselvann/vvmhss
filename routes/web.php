<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\StudentController;

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

Route::get('/user',[StudentController::class, 'index']);
Route::post('/form',[StudentController::class, 'form'])->name('form');
Route::get('/student/list',[StudentController::class, 'show'])->name('show');
Route::post('/update/form',[StudentController::class, 'update'])->name('update');
Route::get('/student/delete/{id}',[StudentController::class,'delete'])->name('delete');
