<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Others\MessageController;
use App\Http\Controllers\Others\AdminMessageController;
use App\Http\Controllers\Others\AdminUserController;

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
    Route::middleware('check_is_regular_user')->group(function () {
        Route::get('/messages', [MessageController::class, 'index'])->name('messages');
        Route::post('/messages', [MessageController::class, 'store'])->name('messages');
    });

    Route::middleware('check_is_admin')->group(function () {
        Route::get('/admin-messages', [AdminMessageController::class, 'index'])->name('admin-messages');
        Route::get('/admin-users', [AdminUserController::class, 'index'])->name('admin-users');
        Route::put('/admin-activate', [AdminUserController::class, 'activate'])->name('admin-activate');
        Route::put('/admin-deactivate', [AdminUserController::class, 'deactivate'])->name('admin-deactivate');
    });
    
});


require __DIR__.'/auth.php';