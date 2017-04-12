<?php

namespace App\Listeners\Auth;

use Illuminate\Auth\Events\Logout;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class LogoutListener
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
     * @param  Logout  $event
     * @return void
     */
    public function handle(Logout $event)
    {
        //
    }
}
