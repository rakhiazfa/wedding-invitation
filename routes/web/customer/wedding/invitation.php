<?php

use App\Http\Controllers\Web\Customer\Wedding\InvitationController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Invitation Routes
|--------------------------------------------------------------------------
*/

Route::name('.invitations')->prefix('/{wedding}/invitations')->group(function () {

    Route::middleware(['auth', 'permission'])->group(function () {

        Route::get('/', [InvitationController::class, 'index']);

        Route::post('/invite', [InvitationController::class, 'invite'])->name('.invite');

        Route::post('/import', [InvitationController::class, 'import'])->name('.import');

        Route::get('/export', [InvitationController::class, 'export'])->name('.export');

        Route::delete('/cancel-invitation/{invitation}', [InvitationController::class, 'cancelInvitation'])
            ->name('.cancel_invitation');
    });
});
