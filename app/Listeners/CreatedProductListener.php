<?php

namespace App\Listeners;

use App\Models\User;
use App\Events\CreatedProductEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Notification;
use App\Notifications\CreatedProductNotification;

class CreatedProductListener
{
    public function __construct()
    {
    }

    /**
     * Handle the event.
     */
    public function handle(CreatedProductEvent $event): void
    {
        User::all()
            ->each(function (User $user) use ($event) {
                Notification::send($user, new CreatedProductNotification($user, $event->product));
            });
    }
}
