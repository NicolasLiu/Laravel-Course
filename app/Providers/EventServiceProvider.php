<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\LoginSuccessEvent' => [
            'App\Listeners\LoginSuccessEventListener',
        ],
        'App\Mods\Teamwork\Events\VisitEvent' => [
            'App\Mods\Teamwork\Listeners\VisitEventListener',
        ],
    ];

    /**
     * Register any Events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
