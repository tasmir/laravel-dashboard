<?php

namespace App\Listeners;

use App\Services\Backend\UserActivityService;
use Illuminate\Auth\Events\Login;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class LogSuccessfulLogin
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
    public function handle(Login $event): void
    {
//        $this->service->store($event->user, 'User',  'login', 'User Login');
    }
}
