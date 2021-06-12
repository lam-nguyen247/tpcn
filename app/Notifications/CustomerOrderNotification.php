<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CustomerOrderNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */

    private $order;

    public function __construct($order)
    {
        $this->order = $order;
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
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
        ->view('mail.customerOrder', ['order_id' => $this->order->id, 'customer'=>$this->order->customer, 'items'=> $this->order->cart, 'subTotal'=> $this->order->total, 'ship'=> $this->order->ship, 'method'=> $this->order->method])
        ->from(config('mail.from.address'), config('mail.from.name'))
        ->subject('Completed Order #'.$this->order->id.'from '. env('APP_NAME'))
        ->line('The introduction to the notification.')
        ->action('Thông báo đặt hàng', url('/admin/order/'.$this->order->id));
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
