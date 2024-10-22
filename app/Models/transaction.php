<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaction extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'amount', 'type', 'description'];

    // Relación con el modelo User
    public function user()
    {
        return $this->belongsTo(User::class);


    }

    // protected static function booted()
    // {
    //     static::creating(function ($transaction) {
    //         $transaction->user_id = auth()->id();  // Asignar el ID del usuario autenticado
    //     });
    // }
}
