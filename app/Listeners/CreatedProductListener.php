<?php

namespace App\Listeners;

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
    public function __construct()
    {
    }

    /**
     * Handle the event.
     */
    public function handle(CreatedProductEvent $event): void
    {
        Cache::forget('products');
        Cache::forever('products', Product::select('id', 'name', 'description')->get());

        User::all()
            ->each(fn (User $user) =>
            Notification::send($user, new CreatedProductNotification(
                $user,
                $event->product
            )));
    }
}
