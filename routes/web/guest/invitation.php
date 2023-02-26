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

    Route::get('/{accessToken}', [InvitationController::class, 'acceptInvitation'])->name('.accept_invitation');
});
