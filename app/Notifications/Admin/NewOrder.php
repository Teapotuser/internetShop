<?php

namespace App\Notifications\Admin;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Order;

class NewOrder extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Order $order)
    {
        $this->order=$order;
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
       /*  return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!'); */
        $delivery = match ($this->order->delivery_method) {
            "post" => "Адресная доставка",
            "pickup" => "Самовывоз",
            default => $this->order->delivery_method
        };

        $payment_method = match ($this->order->payment_method) {
            "cash" => "Наличными",
            "card" => "Кредитной картой",
            default => $this->order->payment_method
        };

        $mailMessage = (new MailMessage)
            ->subject('Сформирован новый заказ ' . $this->order->id)
            ->salutation('')
            ->greeting('')
            ->line('Сумма заказа : ' . $this->order->orderPrice())
            ->line('Товары в заказе :');

        foreach ($this->order->order_products as $order_product) {
            $mailMessage->line(' - ' . $order_product->product->title . ' кол-во ' . $order_product->quantity . ' шт.');
        }

        $client_name = $this->order->name;
        $client_last_name = $this->order->last_name;
        $client_phone = $this->order->phone_number;
        $client_email = $this->order->email;

        $mailMessage
            ->line('Имя: ' . $client_name)
            ->line('Фамилия: ' . $client_last_name)
            ->line('Телефон: ' . $client_phone)
            ->line('Email: ' . $client_email)
            ->line('Способ оплаты:  ' . $payment_method)
            ->line('Доставка: ' . $delivery);
        if ($this->order->delivery_method == 'post') {
            $mailMessage
                ->line('Индекс: ' . $this->order->zip_code)
                ->line('Город: ' . $this->order->city)
                ->line('Адрес: ' . $this->order->address);                
        }

        return $mailMessage;            
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
