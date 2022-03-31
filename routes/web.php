<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\admin\TransactionController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;

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

// Route::get('/', [HomeController::class, 'index'])->name('index')->middleware('auth');

//LOGIN
Route::get('login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('login', [LoginController::class, 'store'])->name('login.store');

//REGISTER
Route::get('/register', [RegisterController::class, 'index'])->name('register')->middleware('guest');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

//LOGOUT
Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');

//TRANSACTION
Route::get('/transaction/{id}', [TransactionController::class, 'index'])->name('transaction')->middleware('auth');
Route::post('/transaction/save', [TransactionController::class, 'store'])->name('transaction.store');

//ADMIN
Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('dashboard');

//ADMIN USER
Route::get('/admin/data-user', [UserController::class, 'index'])->name('admin.user');
Route::get('/admin/data-user/add', [UserController::class, 'show'])->name('admin.user.add');
Route::post('/admin/data-user/add', [UserController::class, 'store'])->name('user.add');
Route::get('/admin/data-user/{id}', [UserController::class, 'tampil'])->name('user.show');
Route::put('/admin/data-user/{id}/update', [UserController::class, 'update'])->name('user.update');
Route::delete('admin/data-user/{id}/delete', [UserController::class, 'destroy'])->name('user.delete');

//ADMIN TRANSACTION
Route::get('/admin/data-transaction', [TransactionController::class, 'index'])->name('admin.transaction');
