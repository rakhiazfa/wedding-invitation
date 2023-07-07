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

        if ($invitation->is_already_received) {

            return view('guest.invitation_accepted')->with([
                'wedding' => $wedding,
                'invitation' => $invitation,
            ]);
        }

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

        $invitation->is_already_received = true;
        $invitation->time_received = date('H:i:s');
        $invitation->save();

        return view('guest.invitation_accepted')->with([
            'wedding' => $wedding,
            'invitation' => $invitation,
        ]);
    }

    public function confirmation(Wedding $wedding, Invitation $invitation, Request $request)
    {
        $this->authorize('viewQrCode', [Invitation::class, $wedding, $invitation]);

        $request->validate([
            'guest_estimates' => ['required', 'numeric'],
        ]);

        $invitation->guest_estimates = $request->input('guest_estimates');
        $invitation->save();

        return redirect()->route('invitations.confirmed_invitation', [
            'wedding' => $wedding,
            'invitation' => $invitation,
        ]);
    }

    public function confirmedInvitation(Wedding $wedding, Invitation $invitation)
    {
        $this->authorize('viewQrCode', [Invitation::class, $wedding, $invitation]);

        if ($invitation->is_already_received) {

            return view('guest.invitation_accepted')->with([
                'wedding' => $wedding,
                'invitation' => $invitation,
            ]);
        }

        return view('guest.confirmed_invitation')->with([
            'wedding' => $wedding,
            'invitation' => $invitation,
        ]);
    }
}
