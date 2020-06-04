<?php

namespace App\Listeners\Auth;

use Illuminate\Auth\Events\Verified;

class LogVerifiedUser
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
     * @param Verified $event
     *
     * @return void
     */
    public function handle(Verified $event)
    {
        //
    }
}
