<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Perfiles;

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
}
