<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('logIn');
    }

    public function login(Request $request)
    {
        // Obtener el DNI y la contraseña del formulario
        $email = $request->input('email');
        $password = $request->input('pass');

        // Buscar al usuario por su DNI
        $user = User::where('email', $email)->first();

        // Verificar si el usuario existe y si la contraseña coincide
        if ($user && $user->password == $password) {
            // Autenticación exitosa
            // Aquí puedes realizar alguna acción, como redirigir al usuario a otra página
            return redirect()->route('mainPage')->with('message', '¡Hola, ' . $user->name . '!');
        } else {
            // Autenticación fallida
            // Vuelve al formulario de inicio de sesión con un mensaje de error
            return redirect()->route('logIn')->with('error', 'Credenciales incorrectas');
        }
    }

    public function logout(Request $request)
    {
        return redirect('/');
    }
}
