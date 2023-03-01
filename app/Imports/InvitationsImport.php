<?php

namespace App\Imports;

use App\Models\Invitation;
use App\Models\Wedding;
use App\Services\WeddingOrganizerService;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class InvitationsImport implements ToModel, WithChunkReading, ShouldQueue
{
    use Importable;

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

        $this->wedding->invitations()->delete();
    }

    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return $this->weddingOrganizerService->createInvitation($this->wedding, [
            'guest_name' => $row[0],
        ]);
    }

    public function chunkSize(): int
    {
        return 1600;
    }
}
