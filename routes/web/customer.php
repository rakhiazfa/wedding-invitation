<?php

use App\Http\Controllers\Web\CustomerController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Customer Routes
|--------------------------------------------------------------------------
*/

Route::name('customers')->prefix('/customers')->middleware(['auth', 'permission'])->group(function () {

    Route::get('/', [CustomerController::class, 'index']);

    Route::get('/create', [CustomerController::class, 'create'])->name('.create');

    Route::post('/', [CustomerController::class, 'store'])->name('.store');

    Route::get('/{customer}', [CustomerController::class, 'show'])->name('.show');

    Route::get('/{customer}/edit', [CustomerController::class, 'edit'])->name('.edit');

    Route::put('/{customer}', [CustomerController::class, 'update'])->name('.update');

    Route::delete('/{customer}', [CustomerController::class, 'destroy'])->name('.destroy');
});
