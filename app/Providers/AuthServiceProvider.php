<?php

namespace App\Providers;

use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
        VerifyEmail::toMailUsing(function ($notifiable, $url) {
            return (new MailMessage)
                ->subject('Verificar Cuenta')
                ->line('Tu cuenta ya esta casi lista, solo debes presionar el enlace a continuación')
                ->action('Confirmar Cuenta', $url)
                ->line('Si no creaste esta cuenta, puedes ignorar este mensaje');
        });
    }
}
