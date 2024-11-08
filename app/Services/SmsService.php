<?php 
namespace App\Services;

use Twilio\Rest\Client;

class SmsService
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client(env('TWILIO_SID'), env('TWILIO_AUTH_TOKEN'));
    }

    public function sendSms($to, $message)
{
    $phoneNumber = '+591' . $to;

    $this->client->messages->create($phoneNumber, [
        'from' => env('TWILIO_PHONE_NUMBER'),
        'body' => $message,
    ]);
}
}
