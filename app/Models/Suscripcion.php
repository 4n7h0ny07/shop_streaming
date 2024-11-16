<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

use App\Models\Perfiles;
use Carbon\Carbon; // Asegúrate de importar la clase Carbon

class Suscripcion extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'perfil_id', 'fecha_inicio', 'fecha_fin'];

    // Relación con User (antes Cliente)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relación con Cuenta
    public function Perfiles()
    {
        return $this->belongsTo(Perfiles::class);
    }

    // Evento para ejecutar antes de crear el registro
    public static function boot()
    {
        parent::boot();

        // Evento para establecer fechas automáticas
        static::creating(function ($suscripcion) {
            $suscripcion->fecha_inicio = Carbon::now();
            $suscripcion->fecha_fin = Carbon::now()->addDays(30);
        });
    }
}
