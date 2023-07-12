<?php

namespace App\Http\Controllers\Web\Guest;

use App\Http\Controllers\Controller;
use App\Models\Invitation;
use App\Models\Presence;
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

        $wedding->load('wishes');

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

        return view('guest.invitation_accepted')->with([
            'wedding' => $wedding,
            'invitation' => $invitation,
            'accessToken' => $accessToken,
        ]);
    }

    public function accept(string $accessToken, Request $request)
    {
        $combinationCode = explode('.', Crypt::decrypt($accessToken));

        $wedding = Wedding::where('code', $combinationCode[0])->firstOrFail();
        $invitation = Invitation::where('code', $combinationCode[1])->firstOrFail();

        $this->authorize('viewQrCode', [Invitation::class, $wedding, $invitation]);

        $request->validate([
            'arriving_guest' => ['required', 'numeric'],
        ]);

        $invitation->arriving_guest = $request->input('arriving_guest');
        $invitation->is_already_received = true;
        $invitation->time_received = date('H:i:s');
        $invitation->save();

        return back()->with('success', 'Berhasil menerima undangan.');
    }

    public function confirmation(Wedding $wedding, Invitation $invitation, Request $request)
    {
        $this->authorize('viewQrCode', [Invitation::class, $wedding, $invitation]);

        $request->validate([
            'name' => ['required'],
            'presence_status' => ['required'],
            'guest_estimates' => ['required', 'numeric'],
            'wishes' => ['required'],
        ]);

        $request->merge(['wedding_id' => $wedding->id]);

        $invitation->guest_estimates = $request->input('guest_estimates');
        $invitation->save();

        Presence::create($request->all());

        return back()->with('success', 'Terima kasih atas konfirmasinya.');
    }
}
