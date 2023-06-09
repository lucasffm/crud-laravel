<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    return redirect('home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/users', [UserController::class, 'index'])->name('listUsers');
Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('editUser');
Route::post('/users/{id}/update', [UserController::class, 'update'])->name('updateUser');
Route::post('/users/{id}/change-status', [UserController::class, 'changeStatus'])->name('changeStatus');
