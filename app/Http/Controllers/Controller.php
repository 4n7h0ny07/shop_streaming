<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    // Método que muestra el formulario de registro
    public function showRegister()
    {
        return view('vendor.voyager.register'); // Asegúrate de que esta sea la vista correcta
    }

    public function register(Request $request)
    {
        // Usar el método validate() proporcionado por el trait ValidatesRequests
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Crear el usuario después de que los datos sean válidos
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Lógica adicional, como iniciar sesión al usuario
        auth()->login($user);

        return redirect('/admin');
    }
}
