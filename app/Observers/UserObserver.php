<?php

namespace App\Observers;

use App\Models\User;
use App\Services\Backend\UserActivityService;

class UserObserver
{
    public function __construct(protected UserActivityService $service)
    {
        //
    }
    /**
     * Handle the User "created" event.
     */
    public function created(User $user): void
    {
        $this->service->store($user, class_basename($user),  __FUNCTION__, 'User Created');
    }

    /**
     * Handle the User "updated" event.
     */
    public function updated(User $user): void
    {
        $this->service->store($user, class_basename($user),  __FUNCTION__, 'User Updated');
    }

    /**
     * Handle the User "deleted" event.
     */
    public function deleted(User $user): void
    {
        $this->service->store($user, class_basename($user),  __FUNCTION__, 'User Deleted');
    }

    /**
     * Handle the User "restored" event.
     */
    public function restored(User $user): void
    {
        $this->service->store($user, class_basename($user),  __FUNCTION__, 'User Restored');
    }

    /**
     * Handle the User "force deleted" event.
     */
    public function forceDeleted(User $user): void
    {
        $this->service->store($user, class_basename($user),  __FUNCTION__, 'User Force Deleted');
    }
}
