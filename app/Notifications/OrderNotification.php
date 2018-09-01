<?php

namespace App\Notifications;

use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class OrderNotification extends Notification
{
    use Queueable;
    protected $orderdetail;
    protected $order;

    public function __construct(Order $order, OrderDetail $orderdetail)
    {
        $this->order = $order;
        $this->orderdetail = $orderdetail;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database','broadcast'];
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
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    public function toBroadcast($notifiable)
    {
        return new BroadcastMessage([

            'product_name' => $this->orderdetail->product->name,
            'qty' => $this->orderdetail->quantity,
            'name' => $this->order->name,
        ]);
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
            'product_name' => $this->orderdetail->product->name,
            'qty' => $this->orderdetail->quantity,
            'name' => $this->order->name,
        ];
    }
}
