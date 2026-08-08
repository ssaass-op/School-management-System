<?php

namespace App\Listeners;

use App\Notifications\UserLoggedIn;
use Illuminate\Auth\Events\Login;

class SendLoginNotification
{
    public function handle(Login $event): void
    {
        $user = $event->user;
        $ipAddress = request()->ip();
        $loginTime = now()->format('Y-m-d H:i:s T');

        // Send the notification email to the logged-in user
        $user->notify(new UserLoggedIn($ipAddress, $loginTime));
    }
}
