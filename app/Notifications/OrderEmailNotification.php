<?php

namespace App\Notifications;

use App\Models\Order;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class OrderEmailNotification extends Notification implements ShouldQueue
{
    use Queueable;
    public $order;
    public $user;

    /**
     * Create a new notification instance.
     *
     * @param Order $order
     * @param User $user
     */
    public function __construct(Order $order, User $user)
    {
        $this->order = $order;
        $this->user = $user;
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
                    ->line('Dear ' .$this->user->name)
                    ->line('Your oder has been successfully placed.')
                    ->line('Your Order ID is #'.$this->order->id.'.')
                    ->action('View Order Details', route('order.details', $this->order->id))
                    ->line('Thank you for using our application!');
    }

    
}
