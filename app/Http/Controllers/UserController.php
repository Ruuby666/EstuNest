<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Controller;


class UserController extends Controller
{
    public function register(Request $request)
    {
        //Validar los datos del formulario
        $request->validate([
            'dni' => 'required|unique:users|string|min:8',
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'pass' => 'required|string|min:3|confirmed',
            'phone' => 'required|string|max:255',
        ]);

        // Crear un nuevo usuario
        $user = new User();
        $user ->dni = $request->input('dni');
        $user -> name = $request->input('name');
        $user -> surname = $request->input('surname');
        $user -> email = $request-> input('email');
        $user -> password = $request->input('pass');
        $user -> phone = $request->input('phone');
        $user -> type = 'landlord';
        $user -> save();

        // Autenticar al usuario (opcional)
        // auth()->login($user);
        // Redirigir al usuario después del registro
        return redirect()->route('mainPage')->with('success', '¡Registro exitoso!');
    }
}
