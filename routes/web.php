<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WalletController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\SuscripcionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('login', function () {
    return redirect('admin/login');
})->name('login');

// Ruta para mostrar el formulario de registro
Route::get('/register', [Controller::class, 'showRegister'])->name('register');
Route::post('/register', [Controller::class, 'register']);


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();

    Route::post('/wallet/generate-qr', [Controller::class, 'generateQr'])->name('wallet.generateQr');

    Route::get('/wallet', [WalletController::class, 'index'])->name('wallet.index');
    Route::post('/wallet/generate-qr', [WalletController::class, 'generateQr'])->name('wallet.generateQr');
    Route::post('/wallet/consultar-qr', [WalletController::class, 'checkQrStatus'])->name('wallet.checkQrStatus');
    Route::get('/wallet/show', [WalletController::class, 'show'])->name('wallet.show');
    Route::post('/wallet/add', [WalletController::class, 'addCredit'])->name('wallet.addCredit');
    Route::post('/wallet/debit', [WalletController::class, 'debit'])->name('wallet.debit');
    Route::get('/wallet/{id}/printer', [WalletController::class, 'generatePdf'])->name('voucher.pdf');
    Route::get('/wallet/{id}', [WalletController::class, 'obtenerCuenta'])->name('wallet.obtener');

    Route::post('/wallet/{id}renovar', [WalletController::class, 'renovarPerfil'])->name('wallet.renovar');
    

    Route::get('/shopping', [SuscripcionController::class, 'index'])->name('shopping.index');
    Route::get('/shopping/{id}/show', [SuscripcionController::class, 'show'])->name('shopping.show');
    Route::post('/shopping/pay', [SuscripcionController::class, 'pay'])->name('perfiles.pay');
    ;
});
