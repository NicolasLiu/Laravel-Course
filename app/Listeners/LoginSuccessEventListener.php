<?php

namespace App\Listeners;

use App\Events\LoginSuccessEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class LoginSuccessEventListener implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  LoginSuccessEvent  $event
     * @return void
     */
    public function handle(LoginSuccessEvent $event)
    {
        $event->log();
    }
}
