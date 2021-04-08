<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Task\TaskController;

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
    return view('auth.login');
});

Auth::routes();

Route::middleware('auth')->group(function() {
    // Task App Route & Crud Function
    Route::get('/task', [TaskController::class, 'index'])->name('home');
    Route::get('/task/create', [TaskController::class, 'create'])->name('create');
    Route::post('/task/create', [TaskController::class, 'store'])->name('store');
    Route::get('/task/{task}', [TaskController::class, 'show'])->name('show');
    Route::get('/task/{task}/edit', [TaskController::class, 'edit'])->name('edit');
    Route::patch('/task/{task}/edit', [TaskController::class, 'update'])->name('update');

    Route::delete('/task/{task}', [TaskController::class, 'destroy'])->name('delete');

    //Status 
    Route::patch('/task/{task}', [TaskController::class, 'remark'])->name('remark');
});
