<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Failed;
use Illuminate\Auth\Events\Login;
use Illuminate\Auth\Events\Logout;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Events\Verified;
use Illuminate\Support\Facades\Log;

class AuthenticationListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        // NOP
    }

    /**
     * Handle user registered events.
     * @param $event
     */
    public function handleUserRegistered($event)
    {
        $this->log('handleUserRegistered', $event);
    }

    /**
     * Handle user successful login events.
     * @param $event
     */
    public function handleUserSuccessfulLogin($event)
    {
        $this->log('handleUserSuccessfulLogin', $event);
    }

    /**
     * Handle user failed login events.
     * @param $event
     */
    public function handleUserFailedLogin($event)
    {
        $this->log('handleUserFailedLogin', $event);
    }

    /**
     * Handle user logout events.
     * @param $event
     */
    public function handleUserLogout($event)
    {
        $this->log('handleUserLogout', $event);
    }

    /**
     * Handle user login reset password events.
     * @param $event
     */
    public function handleUserPasswordReset($event)
    {
        $this->log('handleUserPasswordReset', $event);
    }

    /**
     * Handle user verified events.
     * @param $event
     */
    public function handleUserVerified($event)
    {
        $this->log('handleUserVerified', $event);
    }

    private function log($functionName, $event)
    {
        Log::info(sprintf('%s() %s, ip address %s, user agent %s',
            $functionName, $event->user ? $event->user->email : request('email'), request()->ip(), request()->userAgent()));
    }

    /**
     * Subscribe the event
     * @param $events
     */
    public function subscribe($events)
    {
        $events->listen(Registered::class, AuthenticationListener::class . '@handleUserRegistered');
        $events->listen(Login::class, AuthenticationListener::class . '@handleUserSuccessfulLogin');
        $events->listen(Failed::class, AuthenticationListener::class . '@handleUserFailedLogin');
        $events->listen(Logout::class, AuthenticationListener::class . '@handleUserLogout');
        $events->listen(PasswordReset::class, AuthenticationListener::class . '@handleUserPasswordReset');
        $events->listen(Verified::class, AuthenticationListener::class . '@handleUserVerified');
    }
}
