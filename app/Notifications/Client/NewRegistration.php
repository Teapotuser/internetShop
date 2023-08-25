<?php

namespace App\Notifications\Client;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\User;

class NewRegistration extends Notification
{
    use Queueable;

    private string $password;
    private User $user;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(User $user, $password)
    {
        $this->user = $user;
        $this->password = $password;
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
        /* return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!'); */

        $client_name = $this->user->name;
        $client_last_name = $this->user->last_name;
        $client_phone = $this->user->phone_number;
        $client_email = $this->user->email;

        return (new MailMessage)

            ->subject('Вы успешно зарегистрированы')
            ->greeting('Вы успешно зарегистрированы')
            ->salutation('')
            ->line('Данные вашей учетной записи')
            ->line('Имя: ' . $client_name)
            ->line('Фамилия: ' . $client_last_name)
            ->line('Телефон: ' . $client_phone)
            ->line('Email: ' . $client_email)
            ->line('Пароль: ' . $this->password);
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
