<?php

namespace App\Http\Controllers;

use App\Models\Perfiles;
use Illuminate\Http\Request;

class PerfilesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function venderPerfil($perfil_id, $cliente_id)
    {
        $perfil = Perfil::findOrFail($perfil_id);
        
        if ($perfil->estado === 'disponible') {
            // Marcar perfil como vendido
            $perfil->estado = 'vendido';
            $perfil->cliente_id = $cliente_id;
            $perfil->fecha_vencimiento = now()->addMonth();
            $perfil->save();
            
            // Actualizar cuenta, reducir perfiles disponibles
            $cuenta = Cuenta::find($perfil->cuenta_id);
            $cuenta->perfiles_disponibles -= 1;
            $cuenta->save();

            return response()->json(['message' => 'Perfil vendido exitosamente']);
        }
        
        return response()->json(['message' => 'El perfil ya está vendido'], 400);
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
    public function show(Perfiles $perfiles)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Perfiles $perfiles)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Perfiles $perfiles)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Perfiles $perfiles)
    {
        //
    }
}
