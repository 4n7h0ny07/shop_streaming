<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Suscripcion; // Modelo de la tabla donde guardas la fecha de suscripción
use Carbon\Carbon;
use Twilio\Rest\Client;

class SendSubscriptionReminder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-subscription-reminder';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Envía un recordatorio de suscripción a los usuarios cuyo suscripción vence en 7 días.';

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Obtener la fecha y hora actual
        $hoy = Carbon::now();
        
        // Obtener las suscripciones que vencen en los próximos 7 días o que vencieron hace 7 días
        $suscripciones = Suscripcion::whereDate('fecha_fin', '>=', $hoy) // Para suscripciones que aún no han vencido
            ->whereDate('fecha_fin', '<=', $hoy->copy()->addDays(7)) // Hasta 7 días de vencimiento
            ->get();
    
        //$this->info('Suscripciones encontradas: ' . $suscripciones->count());
    
        foreach ($suscripciones as $suscripcion) {
            // Calcular los días restantes hasta la fecha de vencimiento
            $diasRestantes = Carbon::parse($suscripcion->fecha_fin)->diffInDays($hoy);
    
            //$this->info("Suscripción ID {$suscripcion->id}: días restantes = {$diasRestantes}");
    
            if ($diasRestantes > 0 && $diasRestantes <= 7) {
                // Suscripción por vencer (dentro de los próximos 7 días)
                $nombreUsuario = $suscripcion->user ? $suscripcion->user->name : 'Estimado cliente';
                $mensaje = "De TV Streaming Fassid: hola {$nombreUsuario}, tu suscripcion vence en {$diasRestantes} dias, visita https://streaming.fassid.com para realizar la renovacion.";
            } elseif ($diasRestantes < 0 && $diasRestantes >= -7) {
                // Suscripción vencida (hasta 7 días después de la fecha de vencimiento)
                $nombreUsuario = $suscripcion->user ? $suscripcion->user->name : 'Estimado cliente';
                $diasVencidos = abs($diasRestantes); // Tomar el valor absoluto de los días vencidos
                $mensaje = "TV Streaming Fassid: hola {$nombreUsuario}, tu suscripción vencio hace {$diasVencidos} dias. Visita https://streaming.fassid.com para renovarla.";
            } else {
                continue; // Si no está en el rango de los últimos 7 días de vencimiento o vencida, no se envía mensaje
            }
    
            // Obtener el número de teléfono desde la relación Profile y agregar el prefijo +591
            $numeroTelefono = $suscripcion->user && $suscripcion->user->profile ? $suscripcion->user->profile->phone_number : null;
    
            if ($numeroTelefono) {
                $numeroTelefonoConPrefijo = '+591' . $numeroTelefono; // Concatenar el prefijo correctamente
                $this->info("Número de teléfono obtenido: {$numeroTelefonoConPrefijo}"); // Ver si el número se obtiene
                $this->sendSms($numeroTelefonoConPrefijo, $mensaje);
                $this->info("Mensaje enviado al número: {$numeroTelefonoConPrefijo}");
            } else {
                $this->info("No se encontró el número de teléfono para el usuario ID: {$suscripcion->user_id}");
            }
        }
    
        $this->info('Mensajes de recordatorio enviados con éxito al cliente.');
    }   
    

    /**
     * Enviar SMS usando Twilio
     */
    private function sendSms($numeroTelefono, $mensaje)
    {
        $this->info("Enviando SMS a: {$numeroTelefono}");  // Agregar depuración aquí
        $sid = env('TWILIO_SID');
        $token = env('TWILIO_AUTH_TOKEN');
        $twilioNumber = env('TWILIO_PHONE_NUMBER');
    
        $client = new Client($sid, $token);
    
        try {
            $client->messages->create(
                $numeroTelefono,
                [
                    'from' => $twilioNumber,
                    'body' => $mensaje,
                ]
            );
        } catch (\Exception $e) {
            $this->error('Error al enviar el SMS: ' . $e->getMessage());
        }
    }
}
