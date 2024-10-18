<?php

namespace App\Http\Controllers;

use App\Models\transaction;
use App\Models\Suscripcion;
use App\Models\Product;
use App\Models\Cuentas;
use App\Models\Perfiles;;
use PDF; // Importar la clase PDF
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon; // Asegúrate de importar la clase Carbon
use NumberToWords\NumberToWords;

class WalletController extends Controller
{
    //

    public function index()
    {

        $user = auth()->user();
        $transactions = $user->transactions()->latest()->get();
        $balance = $user->getWalletBalance();

        //dd(Product::whereHas('cuentas')->toSql());
         // Obtener los productos comprados por el usuario actual a través de las suscripciones de los perfiles
    // Obtener los productos cuyas cuentas tienen perfiles comprados por el usuario actual
    // $productos = Product::whereHas('cuentas.perfiles.suscripciones', function($query) use ($user) {
    //     $query->where('user_id', $user);
    // })->with('cuentas.perfiles.suscripciones')->get();

    $productos = Product::whereHas('cuentas', function ($query) use ($user) {
        $query->whereHas('perfiles', function ($query) use ($user) {
            $query->whereHas('suscripciones', function ($query) use ($user) {
                $query->where('user_id', $user->id);
            });
        });
    })->with(['cuentas.perfiles.suscripciones' => function ($query) use ($user) {
        $query->where('user_id', $user->id);
    }])->get();


        return view('wallet.index', compact('balance', 'productos'));
    }

    public function obtenerCuenta($id)
{
    $cuenta = Cuentas::findOrFail($id); // O usar tu lógica para encontrar la cuenta
    
    return response()->json([
        'usuario' => $cuenta->usuario,
        'contraseña' => $cuenta->password,
    ]);
}

public function renovarPerfil(Request $request, $id)
    {

        // Verificar que el ID y otros datos lleguen correctamente
        //dd($request->monto, $request->rproducto, $id);
    if (!$id || !$request->monto) {
        return response()->json(['error' => 'Datos faltantes.'], 400);
    }
        $user = auth()->user();
        $suscripcion = Suscripcion::findOrFail($id);
        
        try {
            $user->debit($request->monto, 'Pago de renovacion con saldo de a Billetera, de  -  ' . $request->rproducto);
                // Aumentar la fecha de fin de la suscripción
            $suscripcion->fecha_fin = Carbon::parse($suscripcion->fecha_fin)->addDays(30);
            $suscripcion->save();
    
           // return redirect()->back()->with('success', 'Pago de renovacion exitosa');
            return response()->json(['success' => 'Suscripción renovada con éxito.']);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
        }
    }
    public function generateToken()
    {
        $client = new Client();
        $cUrl = env('BANCO_TOKEN_GENERATE');

        $data = [
            'accountid' => env('BANCO_ACCOUNT'),
            'authorizationid' => env('BANCO_AUTHORIZATION'),
        ];

        try {
            $response = $client->post($cUrl, [
                'headers' => [
                    'Content-Type' => 'application/json',
                    'cache-control' => 'no-cache',
                ],
                'json' => $data,
            ]);

            $responseData = json_decode($response->getBody(), true);
            //dd($responseData); // Imprime la respuesta del token para depuración
            return $responseData['message'] ?? null;
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 500);
        }
    }// end function generateToken()


    public function generateQr(Request $request)
    {
        // URL del banco
        $c_url = env('BANCO_QR_GENERATE');
    
        // Obtener datos del usuario
        $userId = auth()->user()->id;
        $userName = auth()->user()->name;
    
        // Datos para el QR
        $data = [
            'currency' => 'BOB',
            'gloss' => 'Saldo para ' . $userName,
            'amount' => $request->amount,
            'singleUse' => true,
            'expirationDate' => now()->addMinutes(15), // Validez de 15 minutos
            'additionalData' => 'Datos Adicionales para identificar el QR',
            'destinationAccountId' => 1,
        ];
    
        try {
            // Generar el token
            $token = $this->generateToken();
    
            if (!$token) {
                return response()->json(['error' => 'No se pudo obtener el token de autenticación'], 500);
            }
    
            // Realizar la solicitud POST
            $response = Http::withHeaders([
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . $token,
                'Cache-Control' => 'no-cache',
            ])->post($c_url, $data);
    
            // Decodificar la respuesta
            $responseBody = json_decode($response->body(), true);
    
            if (isset($responseBody['id'])) {
                $qrId = $responseBody['id'];
                $qrCode = $responseBody['qr'];
    
                // Retornar el QR y el ID generado al frontend
                return response()->json(['qrCode' => $qrCode, 'qrId' => $qrId], 200);
            }
    
            return response()->json(['error' => 'No se pudo generar el código QR'], 500);
    
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function checkQrStatus(Request $request)
    {
        $c_url = env('BANCO_QR_STATUS'); // URL para consultar el estado del QR
    
        $data = [
            'qrId' => $request->qrId, // El ID del QR que se generó previamente
        ];
    
        try {
            $token = $this->generateToken(); // Generar el token
    
            if (!$token) {
                return response()->json(['error' => 'No se pudo obtener el token de autenticación'], 500);
            }
    
            // Realizar la solicitud POST para consultar el estado del QR
            $response = Http::withHeaders([
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . $token,
                'Cache-Control' => 'no-cache',
            ])->post($c_url, $data);
    
            // Procesar la respuesta de la API
            $responseBody = json_decode($response->body(), true);
    
            if (isset($responseBody['statusId'])) {
                return response()->json([
                    'statusId' => $responseBody['statusId'],
                    'message' => $responseBody['message'] ?? null,
                ]);
            }
    
            return response()->json(['error' => 'No se pudo obtener el estado del QR'], 500);
    
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    
    public function show()
    {
        $user = auth()->user();
        $transactions = $user->transactions()->latest()->get();
        $balance = $user->getWalletBalance();
        
        return view('wallet.show', compact('transactions', 'balance'));
    }

    public function addCredit(Request $request)
    {
        $user = auth()->user();
        $user->addCredit($request->amount, 'Recarga de Credito a la Billetera');
        return redirect()->back()->with('success', 'Fondos añadidos.');
    }

    public function debit(Request $request)
    {
        $user = auth()->user();
        
        try {
            $user->debit($request->amount, 'Pago con saldo de a Billetera');
    
            return redirect()->back()->with('success', 'Retiro realizado.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
        }
    }

    public function generatePdf($id){

        // Obtener la transacción por su ID
        $transaction = transaction::with('user')->findOrFail($id);
        $user = auth()->user();



        $amount = number_format($transaction->amount, 2, '.', '');

        // Separar parte entera y centavos
        list($integerPart, $decimalPart) = explode('.', $amount);

        // Instanciar la clase para convertir números a palabras
        $numberToWords = new NumberToWords();
        $numberTransformer = $numberToWords->getNumberTransformer('es'); // 'es' para español

        // Convertir la parte entera a palabras
        $integerPartInWords = $numberTransformer->toWords($integerPart);

        // Formatear el monto en letras como "veintitrés con 45/100"
        $amountInWords = ucfirst($integerPartInWords) . ' ' . $decimalPart . '/100 Bolivianos' ;

        $logoUrl = setting('printer-site.printerLogo');
        $addressUrl = setting('printer-site.printerAdrress');
        $phoneUrl = setting('printer-site.printerPhone');
        $balance = $user->getWalletBalance();

        $data = [
            'logoUrl' => $logoUrl,
            'addressUrl' => $addressUrl,
            'amount_in_words' => ucfirst($amountInWords),
            'phoneUrl' => $phoneUrl,
            'balance' => $balance,
            'transaction' => $transaction
        ];

        $pdf = PDF::loadview('printer.voucher', $data)
            ->setPaper('letter');
        return $pdf->stream('voucher-'.str_pad($transaction->id, 6, '0', STR_PAD_LEFT).'.pdf');
        //return $pdf->download('voucher'.$transaction->id.'.pdf');



        //return view('printer.voucher');

    }
    

  
}
