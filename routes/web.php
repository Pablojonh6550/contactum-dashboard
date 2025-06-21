<?php

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

Route::get('/', [App\Http\Controllers\Contact\ContactController::class, 'index'])->name('index');
Route::get('/login', [App\Http\Controllers\AuthController::class, 'login'])->name('auth.login');
Route::post('/login', [App\Http\Controllers\AuthController::class, 'authenticate'])->name('auth.authenticate');
Route::get('/logout', [App\Http\Controllers\AuthController::class, 'logout'])->name('auth.logout')->middleware('auth');

Route::group(['prefix' => 'contact', 'as' => 'contact.', 'middleware' => ['auth']], function () {
    Route::get('/create', [App\Http\Controllers\Contact\ContactController::class, 'create'])->name('create');
    Route::post('/store', [App\Http\Controllers\Contact\ContactController::class, 'store'])->name('store');
    Route::get('/detail/{id}', [App\Http\Controllers\Contact\ContactController::class, 'detail'])->name('detail');
    Route::get('/edit/{id}', [App\Http\Controllers\Contact\ContactController::class, 'edit'])->name('edit');
    Route::post('/update/{id}', [App\Http\Controllers\Contact\ContactController::class, 'update'])->name('update');
    Route::get('/delete/{id}', [App\Http\Controllers\Contact\ContactController::class, 'delete'])->name('delete');
    Route::get('/getDelete', [App\Http\Controllers\Contact\ContactController::class, 'getDelete'])->name('getDelete');
    Route::get('/restore/{id}', [App\Http\Controllers\Contact\ContactController::class, 'restore'])->name('restore');
});
