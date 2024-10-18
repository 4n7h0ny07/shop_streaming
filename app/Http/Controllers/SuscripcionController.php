<?php

namespace App\Http\Controllers;

use App\Models\Suscripcion;
use App\Models\Perfiles;
use Illuminate\Http\Request;
use App\Models\Product;
use Carbon\Carbon; // Asegúrate de importar la clase Carbon
use App\Models\Cuentas;

class SuscripcionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Obtener todos los productos
        $productos = Product::all();
        return view('shopping.index', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {        
        
        $user = auth()->user();

        $balance = $user->getWalletBalance();

        //
        $productos = Product::findOrFail($id);

        $cuentas = $productos->cuentas;


        $perfiles = Perfiles::where('estado', 'like', 'disponible')
                      ->whereHas('Cuentas', function($query) use ($productos){
                        $query->where('producto_id', $productos->id);
                      })
                      ->first(); // Asegúrate de usar `first()`, que devuelve un solo modelo o null.

        //dd($perfiles);
        return view('shopping.show', compact( 'balance', 'perfiles', 'productos'));

    }

    public function pay(request $request)
    {

        $user = auth()->user();
        
        try {

            
            $user->debit($request->amount, 'Producto pagado con saldo de la Billetera - '.$request->product);
            //dd($request);
            $fechaInicio = Carbon::now();
    
            // Fecha de fin (30 días después)
            $fechaFin = Carbon::now()->addDays(30);
        
            // Crear una nueva suscripción
            $suscripcion = new Suscripcion();
            $suscripcion->user_id = $user->id;
            $suscripcion->perfil_id = $request->id;
            $suscripcion->fecha_inicio = $fechaInicio;
            $suscripcion->fecha_fin = $fechaFin;

            // Guardar la suscripción en la base de datos
            $suscripcion->save();

        

             // Actualizar el estado del perfil a "vendido" o similar (asegúrate de que existe el perfil y el estado a modificar)
            $perfil = Perfiles::find($request->id);  // Asegúrate de que el perfil existe
            if ($perfil) {
                $perfil->estado = 'vendido';  // Ajusta el estado según corresponda
                $perfil->nombre_perfil = $user->name;
                $perfil->fecha_vencimiento = $fechaFin;
                $perfil->save();
            }
    
            return redirect()->back()->with('success', 'Pago realizado con exito.');
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


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Suscripcion $suscripcion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Suscripcion $suscripcion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Suscripcion $suscripcion)
    {
        //
    }
}
