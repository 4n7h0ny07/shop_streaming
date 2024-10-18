<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\suscripcion;
use App\Models\Cuentas;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['images', 'code', 'nombre', 'max_perfiles', 'precio_suscripcion', 'descripcion'];

    // Relación con Suscripciones
    public function suscripcion()
    {
        return $this->hasMany(Suscripcion::class);
    }
// Relación de producto con cuenta
// public function Cuentas()
// {
//     return $this->belongsTo(Cuentas::class);
// }
    
public function cuentas()
{
    return $this->hasMany(Cuentas::class, 'producto_id');
}

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            // Verificar si el código está vacío
            if (empty($model->code)) {
                // Obtener el último producto con un código generado
                $lastProduct = self::orderBy('id', 'desc')->first();
                $lastCode = $lastProduct ? intval($lastProduct->code) : 0;

                // Incrementar el código y formatearlo con ceros
                $newCode = str_pad($lastCode + 1, 6, '0', STR_PAD_LEFT);

                $model->code = $newCode; // Asignar el nuevo código generado
            }
        });
    }
}
