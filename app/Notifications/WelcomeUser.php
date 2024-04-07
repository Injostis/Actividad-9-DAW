<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class WelcomeUser extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->subject('Bienvenido a nuestra plataforma') // Asunto del correo
                    ->greeting('Hola ' . $notifiable->name . ',') // Saludo personalizado
                    ->line('Estamos emocionados de que te hayas unido a nuestra comunidad.') // Línea de introducción
                    ->action('Explora nuestra plataforma', url('/')) // Acción con botón
                    ->line('Si tienes alguna pregunta, no dudes en contactarnos.') // Línea final
                    ->salutation('Saludos,'); // Saludo final
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
