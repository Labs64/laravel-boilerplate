<?php

namespace App\Listeners\Auth;

use App\Events\Auth\SocialLogin;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SocialLoginListener
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
     * @param  SocialLogin  $event
     * @return void
     */
    public function handle(SocialLogin $event)
    {
        //
    }
}
