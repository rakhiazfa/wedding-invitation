<?php

namespace App\Http\Controllers\Web\Guest;

use App\Http\Controllers\Controller;
use App\Models\Invitation;
use App\Models\Wedding;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class InvitationController extends Controller
{
    public function invitation(Wedding $wedding, Invitation $invitation)
    {
        $this->authorize('viewQrCode', [Invitation::class, $wedding, $invitation]);

        return view('guest.invitation')->with([
            'wedding' => $wedding,
            'invitation' => $invitation,
        ]);
    }

    public function acceptInvitation(string $accessToken)
    {
        $combinationCode = explode('.', Crypt::decrypt($accessToken));

        $wedding = Wedding::where('code', $combinationCode[0])->firstOrFail();
        $invitation = Invitation::where('code', $combinationCode[1])->firstOrFail();

        $this->authorize('viewQrCode', [Invitation::class, $wedding, $invitation]);

        return 'Success';
    }
}
