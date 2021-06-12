<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class FollowNotification extends Notification
{
    use Queueable;


    /**
     * Create a new notification instance.
     *
     * @param Customer $customer
     */
    public function __construct()
    {
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
        ->view('mail.follow')
        ->from(config('mail.from.address'), config('mail.from.name'))
        ->subject('Đăng ký theo dõi')
        ->line('The introduction to the notification.')
        ->action('Thông báo liên hệ', url('/lien-he'))
        ->line('Cảm ơn bạn đã đăng ký theo dõi chúng tôi');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
