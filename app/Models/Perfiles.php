<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;  // Importa Auth para obtener el usuario logueado
use App\Models\Cuentas;
use App\Models\User;
use App\Models\Suscripcion;

class Perfiles extends Model
{
    use HasFactory;

    protected $fillable = ['id','cuenta_id', 'nombre_perfil', 'estado', 'user_id', 'fecha_vencimiento',];

    // Relación con Cuenta
    public function cuentas()
    {
        return $this->belongsTo(Cuentas::class, 'cuenta_id'); // Aquí debe estar 'cuenta_id'
    }

    // Relación opcional con Cliente
    public function User()
    {
        return $this->belongsTo(User::class);
    }

    // Relación de un perfil con muchas suscripciones
    public function suscripciones()
    {
        return $this->hasMany(Suscripcion::class, 'perfil_id'); // Asegúrate de que 'perfil_id' sea el nombre correcto del campo en la tabla de suscripciones
    }

    // Hook para insertar el usuario logueado antes de guardar el registro
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($perfil) {
            // Si el campo user_id está vacío, asigna el ID del usuario logueado
            if (Auth::check() && empty($perfil->user_id)) {
                $perfil->user_id = Auth::id();  // Asigna el ID del usuario logueado
            }
        });
    }
}
