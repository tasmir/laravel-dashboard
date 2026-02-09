<?php

namespace App\Listeners;


use App\Services\Backend\UserActivityService;
use Illuminate\Auth\Events\Logout;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class LogSuccessfulLogout
{
    /**
     * Create the event listener.
     */
    public function __construct(protected UserActivityService $service)
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(Logout $event): void
    {
//        $this->service->store($event->user, 'User',  'logout', 'User Logout');
    }
}
