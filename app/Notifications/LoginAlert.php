<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class LoginAlert extends Notification
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
                    ->subject('Alerta de inicio de sesión') // Asunto del correo
                    ->greeting('Hola ' . $notifiable->name . ',') // Saludo personalizado
                    ->line('Hemos detectado un inicio de sesión en tu cuenta.') // Línea de introducción
                    ->action('Verificar actividad', url('/')) // Acción con botón
                    ->line('Si no has iniciado sesión, por favor, cambia tu contraseña.') // Línea final
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
