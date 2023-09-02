<?php

namespace App\Listeners;

use App\Events\CallEvent;
use App\Models\Messages;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CallEventListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(CallEvent $event): void
    {
        $message = new Messages();
        $message->title = $event->data['title'];
        $message->message = $event->data['message'];
        $message->save();
    }
}
