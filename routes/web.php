<?php

use App\Http\Controllers\Auth\Admin\AdminController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\TrailController;
use Illuminate\Support\Facades\Auth;
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
    return view('home');
});

// Rotas de autenticação de usuário
Auth::routes();

// Dashboard de usuário
Route::get('/dashboard', [App\Http\Controllers\UserController::class, 'index'])->name('dashboard');

// Rotas de Admin
Route::prefix('admin')->group(function () {
    Route::get('/login', [AdminController::class, 'loginView'])->name('admin.login.view');
    Route::post('/login', [AdminController::class, 'login'])->name('admin.login');
    Route::post('/logout', [AdminController::class, 'logout'])->name('admin.logout')->middleware('admin.auth');

    Route::get('/register', [AdminController::class, 'registerView'])->name('admin.register.view')->middleware('admin.auth');
    Route::post('/resgiter', [AdminController::class, 'create'])->name('admin.register')->middleware('admin.auth');

    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard')->middleware('admin.auth');
});


// Rotas de Trilhas
Route::resource('trail', TrailController::class)->names('trail');

// Rotas de modulos
Route::resource('/{trail}/module', ModuleController::class)->names('module');


// Rota de testes
Route::get('/teste', [App\Http\Controllers\TesteController::class, 'index'])->name('teste');
