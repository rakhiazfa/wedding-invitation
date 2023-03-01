<?php

namespace App\Services;

use App\Models\Invitation;
use App\Models\Wedding;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

class WeddingOrganizerService
{
    /**
     * @var Wedding
     */
    protected Wedding $wedding;

    /**
     * @var Invitation
     */
    protected Invitation $invitation;

    /**
     * @param Wedding $wedding
     */
    public function __construct(Wedding $wedding, Invitation $invitation)
    {
        $this->wedding = $wedding;
        $this->invitation = $invitation;
    }

    /**
     * @param array $with
     * 
     * @return Collection|LengthAwarePaginator
     */
    public function orderByIdDesc(int $perPage = 0, array $with = [])
    {
        return $perPage > 0 ?
            $this->wedding->with($with)->orderBy('id', 'DESC')->paginate($perPage) :
            $this->wedding->with($with)->orderBy('id', 'DESC')->get();
    }

    /**
     * @param array $attributes
     * 
     * @return Model
     */
    public function createWedding(array $attributes)
    {
        $attributes['code'] = Wedding::generateCode();

        $wedding = $this->wedding->create($attributes);

        return $wedding;
    }

    /**
     * @param Wedding $wedding
     * @param array $attributes
     * 
     * @return Model
     */
    public function updateWedding(Wedding $wedding, array $attributes = []): Model
    {
        $wedding->update($attributes);

        return $wedding;
    }

    /**
     * @param Wedding $wedding
     * 
     * @return Model|bool
     */
    public function createInvitation(Wedding $wedding, array $attributes): Model|bool
    {
        $invitationCode = Invitation::generateCode();

        $attributes['code'] = $invitationCode;
        $attributes['qr_code_link'] = Invitation::generateQrCode($wedding->code, $invitationCode);

        return $wedding->invitations()->save($this->invitation->newInstance($attributes));
    }

    public function importInvitations()
    {
    }

    public function exportInvitations()
    {
    }
}
