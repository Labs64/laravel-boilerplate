<?php

namespace App\Events\Auth;

use App\Models\Auth\User\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class SocialLogin
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $user;
    public $provider;
    public $socialite;

    /**
     * Create a new event instance.
     *
     * @param User $user
     * @param $provider
     * @param $providerUser
     */
    public function __construct(User $user, $provider, $socialite)
    {
        $this->user = $user;
        $this->provider = $provider;
        $this->socialite = $socialite;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('social-login.' . $this->user->id);
    }
}
