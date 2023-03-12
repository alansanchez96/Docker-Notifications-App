<?php

namespace App\Listeners;

use App\Adapters\CacheAdapter;
use App\Models\User;
use App\Models\Product;
use App\Events\CreatedProductEvent;
use Illuminate\Support\Facades\Cache;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Notification;
use App\Notifications\CreatedProductNotification;

class CreatedProductListener
{
    use CacheAdapter;

    public function __construct()
    {
    }

    /**
     * Handle the event.
     */
    public function handle(CreatedProductEvent $event): void
    {
        $this->cacheProducts();

        User::all()
            ->each(fn (User $user) =>
            Notification::send($user, new CreatedProductNotification(
                $user,
                $event->product
            )));
    }
}
