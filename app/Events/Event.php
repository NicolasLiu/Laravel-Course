<?php

namespace App\Events;

use App\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use \Illuminate\Http\Request;
use App\Logs\Log;

abstract class Event
{
    use InteractsWithSockets, SerializesModels;


    public $attributes = [];

    public function log()
    {
        $log = $this->getLog();
        foreach ($this->attributes as $key => $value) {
            $log->{$key} = $value;
        }
        $log->{$log->nameKey()} = $log->name();
        $log->save();
    }

    protected abstract function getLog();

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
