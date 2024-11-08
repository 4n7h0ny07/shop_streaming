<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function show(Profile $profile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        $user = auth()->user();
        $profile = $user->profile; // Asume que la relación está definida en el modelo User
    
        return view('vendor.voyager.profile.edit', compact('profile'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Profile $profile)
    {
        //
         // Validar los datos del formulario
         $request->validate([
            'photo_front_page' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'phone_number' => 'required|string|max:15',
            'number_document' => 'required|string|max:50',
            'city' => 'required|string|max:100',
            'address' => 'required|string|max:255',
            'number_home' => 'nullable|string|max:10',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
        ]);

        // Obtener el usuario autenticado
        $user = Auth::user();

        // Buscar o crear el perfil asociado al usuario
        $profile = Profile::firstOrCreate(
            ['user_id' => $user->id],
            [
                'phone_number' => $request->phone_number,
                'number_document' => $request->number_document,
                'city' => $request->city,
                'address' => $request->address,
                'number_home' => $request->number_home,
                'latitude' => $request->latitude,
                'longitude' => $request->longitude,
            ]
        );

        // Actualizar la foto de portada si se cargó una nueva
        if ($request->hasFile('photo_front_page')) {
            $photoPath = $request->file('photo_front_page')->store('profile_photos', 'public');
            $profile->photo_front_page = $photoPath;
        }

        // Actualizar los demás datos del perfil
        $profile->phone_number = $request->phone_number;
        $profile->number_document = $request->number_document;
        $profile->city = $request->city;
        $profile->address = $request->address;
        $profile->number_home = $request->number_home;
        $profile->latitude = $request->latitude;
        $profile->longitude = $request->longitude;
        $profile->save();

        return redirect()->back()->with('success', 'Perfil actualizado correctamente.');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Profile $profile)
    {
        //
    }
}
