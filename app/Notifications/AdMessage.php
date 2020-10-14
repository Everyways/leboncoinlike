<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AdMessage extends Notification
{
    use Queueable;

    /**
     * The ad.
     *
     * @var \App\Models\Ad
     */
    protected $ad;
    /**
     * The message.
     *
     * @var String
     */
    protected $message;
    /**
     * The email.
     *
     * @var String
     */
    protected $email;

    /**
     * Create a new notification instance.
     *
     * @param \App\Models\Ad  $ad
     * @param String  $message
     * @param String  $email
     * @return void
     */
    public function __construct($ad, $message, $email)
    {
        $this->ad = $ad;
        $this->message = $message;
        $this->email = $email;
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
            ->line('Vous avez reçu un message concernant une annonce que vous avez déposée :')
            ->line('--------------------------------------')
            ->line($this->message)
            ->line('--------------------------------------')
            ->action('Voir votre annonce', route('annonces.show', $this->ad->id))
            ->line("L'email de l'expéditeur est : " . $this->email)
            ->line("Merci d'utiliser notre site pour vos annonces !");
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
