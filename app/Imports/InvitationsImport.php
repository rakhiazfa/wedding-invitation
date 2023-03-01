<?php

namespace App\Imports;

use App\Jobs\CreateInvitationJob;
use App\Models\Invitation;
use App\Models\Wedding;
use App\Services\WeddingOrganizerService;
use Maatwebsite\Excel\Concerns\ToModel;

class InvitationsImport implements ToModel
{
    /**
     * @var Wedding
     */
    protected Wedding $wedding;

    /**
     * @var WeddingOrganizerService
     */
    protected WeddingOrganizerService $weddingOrganizerService;

    /**
     * @param Wedding $wedding
     */
    public function __construct(Wedding $wedding, WeddingOrganizerService $weddingOrganizerService)
    {
        $this->wedding = $wedding;
        $this->weddingOrganizerService = $weddingOrganizerService;
    }

    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        CreateInvitationJob::dispatch($this->wedding, $this->weddingOrganizerService, [
            'guest_name' => $row[0],
        ]);
    }
}
