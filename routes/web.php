<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Others\DashboardController;
use App\Http\Controllers\Others\MessageController;
use App\Http\Controllers\Others\AdminMessageController;
use App\Http\Controllers\Others\AdminTaskController;
use App\Http\Controllers\Others\AdminTaskCategoryController;
use App\Http\Controllers\Others\AdminUserController;
use App\Http\Controllers\Others\TaskController;

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
})->name('welcome');

Route::get('/unauthorized', function () {
    return view('permissions.unauthorized');
});

Route::middleware('auth')->group(function() {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::middleware('check_is_regular_user')->group(function () {
        Route::get('/messages', [MessageController::class, 'index'])->name('messages');
        Route::get('/tasks', [TaskController::class, 'index'])->name('tasks');
        Route::post('/messages', [MessageController::class, 'store'])->name('messages');
        Route::post('/tasks', [TaskController::class, 'store'])->name('tasks');
        Route::put('/tasks/{id}', [TaskController::class, 'update']);
        Route::delete('/tasks/{id}', [TaskController::class, 'delete']);
    });

    Route::middleware('check_is_admin')->group(function () {
        Route::get('/admin-messages', [AdminMessageController::class, 'index'])->name('admin-messages');
        Route::get('/admin-users', [AdminUserController::class, 'index'])->name('admin-users');
        Route::put('/admin-activate', [AdminUserController::class, 'activate'])->name('admin-activate');
        Route::put('/admin-deactivate', [AdminUserController::class, 'deactivate'])->name('admin-deactivate');
        Route::get('/admin-tasks', [TaskController::class, 'index'])->name('admin-tasks');
        Route::get('/admin-categories', [AdminTaskCategoryController::class, 'index'])->name('admin-categories');
        Route::post('/admin-categories', [AdminTaskCategoryController::class, 'store'])->name('admin-categories');
        Route::put('/admin-categories/{id}', [AdminTaskCategoryController::class, 'update'])->name('admin-categories-update');
        Route::delete('/admin-categories/{id}', [AdminTaskCategoryController::class, 'delete'])->name('admin-categories-delete');
    });
    
});


require __DIR__.'/auth.php';