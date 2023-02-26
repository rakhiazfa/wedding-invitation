<?php

namespace App\Http\Controllers\Web\Customer\Wedding;

use App\Http\Controllers\Controller;
use App\Models\Invitation;
use App\Models\Wedding;
use App\Services\WeddingOrganizerService;
use Closure;
use Exception;
use Illuminate\Http\Request;

class InvitationController extends Controller
{
    /**
     * @var WeddingOrganizerService
     */
    protected WeddingOrganizerService $weddingOrganizerService;

    /**
     * @param WeddingOrganizerService $weddingOrganizerService
     */
    public function __construct(WeddingOrganizerService $weddingOrganizerService)
    {
        $this->weddingOrganizerService = $weddingOrganizerService;

        $this->middleware(function (Request $request, Closure $next) {

            if ($request->user()->cannot('doAny', [Invitation::class, $request->route('wedding')])) {

                abort(404);
            }

            return $next($request);
        });
    }

    /**
     * Invite guests to the wedding.
     */
    public function invite(Request $request, string $username, Wedding $wedding)
    {
        $request->validate(['guest_name' => ['required']]);

        try {

            $this->weddingOrganizerService->createInvitation($wedding, $request->all());

            // 
        } catch (Exception $exception) {

            abort(502, $exception->getMessage());
        }

        return back()->with(
            'success',
            'Managed to make an invitation for a guest named ' . $request->input('guest_name') . '.',
        );
    }

    /**
     * Cancel inviting guests to the wedding.
     */
    public function cancelInvitation(string $username, Wedding $wedding, Invitation $invitation)
    {
        $this->authorize('delete', [Invitation::class, $wedding, $invitation]);

        $invitation->delete();

        return back()->with(
            'success',
            'Invitation successfully canceled for guest named ' . $invitation->guest_name . '.',
        );
    }
}
