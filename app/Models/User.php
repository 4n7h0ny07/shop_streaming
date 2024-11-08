<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\DB; // Asegúrate de importar DB
use App\Models\transaction;
use App\Models\User;
use App\Models\Cuentas;


class User extends \TCG\Voyager\Models\User
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function transactions()
    {
        return $this->hasMany(transaction::class);
    }

    // Obtener saldo actual
    public function getWalletBalance()
    {
        return $this->transactions()->sum(DB::raw("IF(type = 'credit', amount, -amount)"));
    }

    // Agregar crédito a la billetera
    public function addCredit($amount, $description = null)
    {
        return $this->transactions()->create([
            'amount' => $amount,
            'type' => 'credit',
            'description' => $description,
        ]);
    }

    // Retirar fondos de la billetera
    public function debit($amount, $description = null)
    {
        if ($this->getWalletBalance() < $amount) {
            throw new \Exception("Fondos insuficientes.");
        }

        return $this->transactions()->create([
            'amount' => $amount,
            'type' => 'debit',
            'description' => $description,
        ]);
    }

    // Relación con el modelo Profile
    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    // Relación con Cuentas
    public function cuentas()
    {
        return $this->hasMany(Cuenta::class);
    }

    // Relación con Suscripciones
    public function suscripciones()
    {
        return $this->hasMany(Suscripcion::class);
    }

}
