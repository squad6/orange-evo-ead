<?php

use App\Http\Controllers\Auth\Admin\AdminController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\ContentUserController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\TrailController;
use App\Http\Controllers\TrailUserController;
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

// Rotas de Admin
Route::prefix('admin')->group(function () {
    Route::get('/login', [AdminController::class, 'loginView'])->name('admin.login.view');
    Route::post('/login', [AdminController::class, 'login'])->name('admin.login');
    Route::post('/logout', [AdminController::class, 'logout'])->name('admin.logout')->middleware('admin.auth');

    Route::get('/register', [AdminController::class, 'registerView'])->name('admin.register.view')->middleware('admin.auth');
    Route::post('/resgiter', [AdminController::class, 'create'])->name('admin.register')->middleware('admin.auth');

    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard')->middleware('admin.auth');
});


// Rotas para controle de trilhas escolhidas pelos usuários
Route::prefix('user')->middleware('auth')->group(function () {
    Route::get('/choose-trail/{trail}', [TrailUserController::class, 'chooseTrail'])->name('choose.trail');

    Route::get('/dashboard', [TrailUserController::class, 'index'])->name('user.dashboard');

    Route::get('/orange-juice', function () {
        return view('user.orange-juice');
    })->name('user.orange');

    Route::get('/content-check', [ContentUserController::class, 'checkContent'])->name('check.content');
    Route::get('/content-show', [ContentUserController::class, 'index'])->name('show.content');
});

// Rotas de Trilhas
Route::resource('/trail', TrailController::class)->names('trail');

// Rotas de modulos
Route::resource('/trail/{trail}/module', ModuleController::class)->names('module');

// Rotas de conteúdos
Route::resource('/trail/{trail}/module/{module}/content', ContentController::class)->names('content');

// Rota de testes
Route::get('/teste', [App\Http\Controllers\TesteController::class, 'index'])->name('teste');
