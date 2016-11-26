<?php

namespace App\Mods\Teamwork\Listeners;

use App\Mods\Teamwork\Events\VisitEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class VisitEventListener
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
     * @param  VisitEvent  $event
     * @return void
     */
    public function handle(VisitEvent $event)
    {
        //
    }
}
