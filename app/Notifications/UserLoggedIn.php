<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class UserLoggedIn extends Notification
{
    use Queueable;

    protected $ipAddress;
    protected $loginTime;

    public function __construct(string $ipAddress, string $loginTime)
    {
        $this->ipAddress = $ipAddress;
        $this->loginTime = $loginTime;
    }

    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Security Alert: New Login Detected')
            ->greeting('Hello ' . $notifiable->name . '!')
            ->line('We noticed a new login to your account.')
            ->line('**Time:** ' . $this->loginTime)
            ->line('**IP Address:** ' . $this->ipAddress)
            ->line('If this was you, no further action is required.')
            ->line('If you did not log in, please secure your account immediately.');
    }
}
