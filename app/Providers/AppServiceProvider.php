<?php

namespace App\Providers;

use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        VerifyEmail::toMailUsing(function( $notifiable, $url ) {

            return ( new MailMessage )
                ->subject('Verificar Cuenta')
                ->line('Por favor, haga clic en el botón de abajo para verificar su dirección de correo electrónico.')
                ->action( 'Confirme su correo electrónico', $url )
                ->line('Si no ha creado una cuenta, no se requiere ninguna acción adicional.');

        });
    }
}
