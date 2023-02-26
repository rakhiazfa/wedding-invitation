<?php

use App\Http\Controllers\Web\WeddingController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Wedding Routes
|--------------------------------------------------------------------------
*/

Route::name('weddings')->prefix('/weddings')->middleware(['auth', 'permission'])->group(function () {

    Route::get('/', [WeddingController::class, 'index']);

    Route::get('/create/{customer?}', [WeddingController::class, 'create'])->name('.create');

    Route::post('/', [WeddingController::class, 'store'])->name('.store');

    Route::get('/{wedding}', [WeddingController::class, 'show'])->name('.show');

    Route::get('/{wedding}/edit', [WeddingController::class, 'edit'])->name('.edit');

    Route::put('/{wedding}', [WeddingController::class, 'update'])->name('.update');

    Route::delete('/{wedding}', [WeddingController::class, 'destroy'])->name('.destroy');
});
