<?php

namespace App\Providers;

use App\Events\Auth\SocialLogin;
use App\Listeners\Auth\LoginListener;
use App\Listeners\Auth\LogoutListener;
use App\Listeners\Auth\RegisteredListener;
use App\Listeners\Auth\SocialLoginListener;
use Illuminate\Auth\Events\Login;
use Illuminate\Auth\Events\Logout;
use Illuminate\Auth\Events\Registered;
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
        Login::class => [LoginListener::class],
        Logout::class => [LogoutListener::class],
        Registered::class => [RegisteredListener::class],
        SocialLogin::class => [SocialLoginListener::class],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
