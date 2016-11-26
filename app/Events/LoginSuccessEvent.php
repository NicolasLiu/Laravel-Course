<?php

namespace App\Events;

use App\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use \Illuminate\Http\Request;
use Carbon\Carbon;

class LoginSuccessEvent extends Event
{
    use InteractsWithSockets, SerializesModels;

    public $ip;
    public $time;
    public $secure;
    public $user;

    /**
     * Create a new event instance.
     * @param \Illuminate\Http\Request
     * @param \App\User
     * @return void
     */
    public function __construct(Request $request, User $user)
    {
        $this->ip = $request->getClientIp();
        $this->time = Carbon::now();
        $this->secure = $request->isSecure();
        $this->user = $user;

    }

    public function name()
    {
        return 'App\Events\LoginSuccess';
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
