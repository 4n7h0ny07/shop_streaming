<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Suscripcion;

use Twilio\Rest\Client;
use Illuminate\Support\Facades\Mail;

class SendSubscriptionReminder extends Command
{
    protected $signature = 'app:send-subscription-reminder';
    protected $description = 'Envía un recordatorio de suscripción a los usuarios cuyo suscripción vence en 7 días.';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $hoy = Carbon::now();
        $suscripciones = Suscripcion::whereDate('fecha_fin', '>=', $hoy)
            ->whereDate('fecha_fin', '<=', $hoy->copy()->addDays(7))
            ->get();
    
        foreach ($suscripciones as $suscripcion) {
            $diasRestantes = Carbon::parse($suscripcion->fecha_fin)->diffInDays($hoy);

            if ($diasRestantes > 0 && $diasRestantes <= 7) {
                $nombreUsuario = $suscripcion->user ? $suscripcion->user->name : 'Estimado cliente';
                $mensaje = "De TV Streaming Fassid: hola {$nombreUsuario}, tu suscripción vence en {$diasRestantes} días, visita https://streaming.fassid.com para realizar la renovación.";
            } elseif ($diasRestantes < 0 && $diasRestantes >= -7) {
                $nombreUsuario = $suscripcion->user ? $suscripcion->user->name : 'Estimado cliente';
                $diasVencidos = abs($diasRestantes);
                $mensaje = "TV Streaming Fassid: hola {$nombreUsuario}, tu suscripción venció hace {$diasVencidos} días. Visita https://streaming.fassid.com para renovarla.";
            } else {
                continue;
            }

            // $numeroTelefono = $suscripcion->user && $suscripcion->user->profile ? $suscripcion->user->profile->phone_number : null;
            $emailUsuario = $suscripcion->user ? $suscripcion->user->email : null;

            // if ($numeroTelefono) {
            //     $numeroTelefonoConPrefijo = '+591' . $numeroTelefono;
            //     $this->sendSms($numeroTelefonoConPrefijo, $mensaje);
            //     $this->info("Mensaje enviado al número: {$numeroTelefonoConPrefijo}");
            // } else {
            //     $this->info("No se encontró el número de teléfono para el usuario ID: {$suscripcion->user_id}");
            // }

            if ($emailUsuario) {
                $this->sendEmail($emailUsuario, $nombreUsuario, $mensaje);
                $this->info("Correo enviado a: {$emailUsuario}");
            } else {
                $this->info("No se encontró el correo electrónico para el usuario ID: {$suscripcion->user_id}");
            }
        }

        $this->info('Mensajes de recordatorio enviados con éxito.');
    }

    // private function sendSms($numeroTelefono, $mensaje)
    // {
    //     $this->info("Enviando SMS a: {$numeroTelefono}");
    //     $sid = env('TWILIO_SID');
    //     $token = env('TWILIO_AUTH_TOKEN');
    //     $twilioNumber = env('TWILIO_PHONE_NUMBER');

    //     $client = new Client($sid, $token);

    //     try {
    //         $client->messages->create(
    //             $numeroTelefono,
    //             [
    //                 'from' => $twilioNumber,
    //                 'body' => $mensaje,
    //             ]
    //         );
    //     } catch (\Exception $e) {
    //         $this->error('Error al enviar el SMS: ' . $e->getMessage());
    //     }
    // }

    private function sendEmail($email, $nombreUsuario, $mensaje)
    {
        $this->info("Enviando correo electrónico a: {$email}"); // Depuración

        try {
            Mail::send('emails.subscription-reminder', ['nombreUsuario' => $nombreUsuario, 'mensaje' => $mensaje], function ($message) use ($email) {
                $message->to($email)->subject('Recordatorio de Suscripción - TV Streaming Fassid');
            });
        } catch (\Exception $e) {
            $this->error('Error al enviar el correo electrónico: ' . $e->getMessage());
        }
    }
}
