<?php

use App\Http\Controllers\Admin\AdminContentController;
use App\Http\Controllers\Admin\AdminModuleController;
use App\Http\Controllers\Admin\AdminTrailController;
use App\Http\Controllers\Auth\Admin\AdminController;
use App\Http\Controllers\User\UserContentController;
use App\Http\Controllers\User\UserContentUserController;
use App\Http\Controllers\User\UserModuleController;
use App\Http\Controllers\User\UserTrailController;
use App\Http\Controllers\User\UserTrailUserController;
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
    return redirect()->route('login');
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

    // Rotas de Trilhas
    Route::resource('/trail', AdminTrailController::class)->names('admin.trail')->middleware('admin.auth');

    // Rotas de modulos
    Route::resource('/trail/{trail}/module', AdminModuleController::class)->names('admin.module')->middleware('admin.auth');

    // Rotas de conteúdos
    Route::resource('/trail/{trail}/module/{module}/content', AdminContentController::class)->names('admin.content')->middleware('admin.auth');
});


// Rotas para controle de trilhas escolhidas pelos usuários
Route::prefix('user')->middleware('auth')->group(function () {
    Route::get('/choose-trail/{trail}', [UserTrailUserController::class, 'chooseTrail'])->name('user.trail.subscribe');
    Route::delete('/trail/{trail}/delete', [UserTrailUserController::class, 'destroy'])->name('user.trail.unsubscribe');

    Route::get('/dashboard', [UserTrailUserController::class, 'index'])->name('user.dashboard');

    Route::get('/orange-juice', function () {
        return view('user.orange-juice');
    })->name('user.orange');

    Route::post('/content-status/{content}', [UserContentUserController::class, 'setStatusContent'])->name('user.status.content');
    Route::get('/content-show', [UserContentUserController::class, 'index'])->name('user.show.content');

    // Rotas de Trilhas
    Route::resource('/trail', UserTrailController::class)->names('user.trail');

    // Rotas de modulos
    Route::resource('/trail/{trail}/module', UserModuleController::class)->names('user.module');

    // Rotas de conteúdos
    Route::resource('/trail/{trail}/module/{module}/content', UserContentController::class)->names('user.content');
});


// Rota de testes
// Route::get('/teste', [App\Http\Controllers\TesteController::class, 'index'])->name('teste');

// Rota de testes
// Route::get('/teste/status/{trail}/{status_content}', [App\Http\Controllers\TrailUserController::class, 'setTrailUserStatus']);
