<?php

namespace App\Jobs;

use App\Models\Wedding;
use App\Services\WeddingOrganizerService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class CreateInvitationJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * @var Wedding
     */
    public Wedding $wedding;

    /**
     * @var WeddingOrganizerService
     */
    public WeddingOrganizerService $weddingOrganizerService;

    /**
     * @var array
     */
    protected array $attributes = [];

    /**
     * Create a new job instance.
     */
    public function __construct(Wedding $wedding, WeddingOrganizerService $weddingOrganizerService, array $attributes = [])
    {
        $this->wedding = $wedding;
        $this->weddingOrganizerService = $weddingOrganizerService;
        $this->attributes = $attributes;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $this->weddingOrganizerService->createInvitation($this->wedding, $this->attributes);
    }
}
