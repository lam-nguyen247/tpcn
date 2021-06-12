<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class RecoverNotification extends Notification
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
        ->view('mail.recover', ['store' => $this->store])
        ->from(config('mail.from.address'), config('mail.from.name'))
        ->subject('Khôi phục mật khẩu cửa hàng')
        ->action('Thông báo xác thực', url('/store/dang-nhap'));
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
