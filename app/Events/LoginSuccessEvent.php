<?php

namespace App\Events;

use App\Users\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use \Illuminate\Http\Request;
use Carbon\Carbon;
use App\Logs\LoginSuccess;

class LoginSuccessEvent extends Event
{

    /**
     * Create a new event instance.
     * @param \Illuminate\Http\Request
     * @param \App\Users\User
     * @return void
     */
    public function __construct(Request $request, User $user)
    {
        $this->attributes['ip'] = $request->getClientIp();
        $this->attributes['time'] = Carbon::now();
        $this->attributes['secure'] = $request->isSecure();
        $this->attributes['user'] = $user->id;

    }


    protected function getLog()
    {
        return new LoginSuccess();
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
