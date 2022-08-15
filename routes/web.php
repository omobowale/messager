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

Route::get('/messages', [MessageController::class, 'index'])->middleware(['auth'])->name('messages');

Route::get('/admin-messages', [AdminMessageController::class, 'index'])->middleware(['auth', 'check_is_admin'])->name('admin-messages');

Route::get('/admin-users', [AdminUserController::class, 'index'])->middleware(['auth', 'check_is_admin'])->name('admin-users');

Route::post('/messages', [MessageController::class, 'store'])->middleware(['auth'])->name('messages');

Route::put('/admin-activate', [AdminUserController::class, 'activate'])->middleware(['auth', 'check_is_admin'])->name('admin-activate');

Route::put('/admin-deactivate', [AdminUserController::class, 'deactivate'])->middleware(['auth', 'check_is_admin'])->name('admin-deactivate');

require __DIR__.'/auth.php';