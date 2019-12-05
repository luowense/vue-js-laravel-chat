<?php


namespace App\Events;

use App\User;
use App\Psychologist;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class ServerCreated implements ShouldBroadcast
{
    use SerializesModels;

    public $user;

    public $psychologist;

    /**
     * Create a new event instance
     *
     * @return void
     */
    public function __construct(User $user, Psychologist $psychologist)
    {
        $this->user = $user;
        $this->psychologist = $psychologist;
    }


    /**
     * Get the channels the event should broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('chat.' . $this->user->id);
    }
}