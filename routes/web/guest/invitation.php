<?php

use App\Http\Controllers\Web\Guest\InvitationController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Guest Invitation Routes
|--------------------------------------------------------------------------
*/

Route::name('invitations')->prefix('/invitations')->group(function () {

    Route::get('/{wedding:code}/{invitation:code}', [InvitationController::class, 'invitation']);

    Route::post('/{wedding:code}/{invitation:code}/confirmation', [InvitationController::class, 'confirmation'])->name('.confirmation');

    Route::get('/{wedding:code}/{invitation:code}/confirmed_invitation', [InvitationController::class, 'confirmedInvitation'])->name('.confirmed_invitation');

    Route::get('/{accessToken}', [InvitationController::class, 'acceptInvitation'])->name('.accept_invitation');

    Route::post('/{accessToken}', [InvitationController::class, 'accept'])->name('.accept');
});
