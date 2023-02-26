<?php

use App\Http\Controllers\Web\Customer\WeddingController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Wedding Routes
|--------------------------------------------------------------------------
*/

Route::name('customer.weddings')->prefix('/{username}/weddings')->middleware(['auth', 'permission'])->group(function () {

    Route::get('/', [WeddingController::class, 'index']);

    Route::get('/{wedding}', [WeddingController::class, 'show'])->name('.show');

    Route::get('/{wedding}/edit', [WeddingController::class, 'edit'])->name('.edit');

    Route::put('/{wedding}', [WeddingController::class, 'update'])->name('.update');

    /**
     * Load invitition routes.
     * 
     */

    require_once __DIR__ . '/wedding/invitation.php';
});
