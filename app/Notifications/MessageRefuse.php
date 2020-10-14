<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\{ModelsAd as Ad, ModelsMessage as Message};

class MessageRefuse extends Notification
{
    use Queueable;

    /**
     * The message.
     *
     * @var App\Models\Message
     */
    protected $message;

    /**
     * The deny message.
     *
     * @var String
     */
    protected $messageRefus;

    /**
     * The ad.
     *
     * @var \App\Models\Ad
     */
    protected $ad;

    /**
     * Create a new notification instance.
     *
     * @param \App\Models\Message $message
     * @param String $messageRefus
     * @return void
     */
    public function __construct(Ad $ad, Message $message, $messageRefus)
    {
        $this->ad = $ad;
        $this->message = $message;
        $this->messageRefus = $messageRefus;
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
            ->line('Nous avons refusé ce message que vous avez déposé :')
            ->line('--------------------------------------')
            ->line($this->message->texte)
            ->line('--------------------------------------')
            ->line('Pour la raison suivante :')
            ->line('--------------------------------------')
            ->line($this->messageRefus)
            ->line('--------------------------------------')
            ->action('Voir cette annonce', route('annonces.show', $this->ad->id))
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
