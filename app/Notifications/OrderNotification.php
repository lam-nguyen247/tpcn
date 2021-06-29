<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class OrderNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */

    private $order;
    private $cart;

    public function __construct($order, $cart)
    {
        $this->order = $order;
        $this->cart = $cart;
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
        ->view('mail.order', [
            'order_id' => $this->order->id,
            'customer'=>$this->order->name,
            'phone'=>$this->order->phone,
            'address'=>$this->order->address,
            'note'=>$this->order->note,
            'items'=> $this->cart,
            'subTotal'=> $this->order->total,
            'ship'=> $this->order->ship,
            'method'=> $this->order->method
        ])
        ->from(config('mail.from.address'), config('mail.from.name'))
        ->subject('Bạn có đơn đặt hàng')
        ->line('The introduction to the notification.')
        ->action('Thông báo đặt hàng', route('order.show', $this->order->id));
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
