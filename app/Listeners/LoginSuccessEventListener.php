<?php

namespace App\Listeners;

use App\Events\LoginSuccessEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Logs\Log;

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
        $log = new Log($event->name());
        $log->login_ip = $event->ip;
        $log->login_secure = $event->secure;
        $log->login_time = $event->time;
        $log->login_user = $event->user->id;
        $log->save();

    }
}
