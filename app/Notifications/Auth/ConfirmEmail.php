<?php

namespace App\Notifications\Auth;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class ConfirmEmail extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $mailMessage = new MailMessage();

        $mailMessage->subject(__('notification.auth.confirm_email.mail.subject', ['app' => config('app.name')]));
        $mailMessage->greeting(__('notification.auth.confirm_email.mail.greeting', ['user' => $notifiable->name]));
        $mailMessage->line(__('notification.auth.confirm_email.mail.line.0'));
        $mailMessage->action(__('notification.auth.confirm_email.mail.action'), route('confirm', [$notifiable->confirmation_code]));
        $mailMessage->line(__('notification.auth.confirm_email.mail.line.1'));
        $mailMessage->line(__('notification.auth.confirm_email.mail.line.2', ['email' => config('mail.from.address')]));

        $mailMessage->line(__('notification.auth.confirm_email.mail.line.3', ['app' => config('app.name')]));

        return $mailMessage;
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
