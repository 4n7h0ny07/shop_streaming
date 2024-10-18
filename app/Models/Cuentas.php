<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\user;
use App\Models\Product;
use App\Models\Perfiles;


class Cuentas extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'producto_id', 'usuario', 'password', 'pefiles_disponibles'];

    // Relación con Perfiles
    public function Product()
    {
        return $this->hasMany(Prodcut::class);
    }

    // Relación con Cliente
    public function User()
    {
        return $this->belongsTo(User::class);
    }

    // Relación de una cuenta con múltiples perfiles
    public function perfiles()
    {
        return $this->hasMany(perfiles::class, 'cuenta_id'); // Asegúrate que el campo 'cuenta_id' sea correcto
    }

 










}
