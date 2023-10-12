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

Route::prefix('manage-sheets')->group(function () {
    Route::get('/', [App\Http\Controllers\GoogleSheetsController::class, 'index'])->name('/home');
    Route::get('/create', [App\Http\Controllers\GoogleSheetsController::class, 'create'])->name('create');
    Route::get('/edit/{user}', [App\Http\Controllers\GoogleSheetsController::class, 'edit'])->name('edit');
    Route::get('/delete/{user}', [App\Http\Controllers\GoogleSheetsController::class, 'destroy'])->name('delete');
});
