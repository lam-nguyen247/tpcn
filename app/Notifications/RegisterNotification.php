<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class RegisterNotification extends Notification
{
    use Queueable;

    /**
     * @var store
     */
    private $store;

    /**
     * Create a new notification instance.
     *
     * @param Customer $customer
     */
    public function __construct($store)
    {
        $this->store = $store;
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
        ->view('mail.register', ['store' => $this->store])
        ->from(config('mail.from.address'), config('mail.from.name'))
        ->subject('Xác thực email đăng ký cửa hàng')
        ->line('The introduction to the notification.')
        ->action('Thông báo xác thực', url('/store/dang-nhap'))
        ->line('Cảm ơn bạn đã đăng ký.');
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
