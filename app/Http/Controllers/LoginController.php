<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Cookie;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('logIn');
    }

    public function login(Request $request)
    {
        // Obtener el email y la contraseña del formulario
        $email = $request->input('email');
        $password = $request->input('pass');

        // Buscar al usuario por su email
        $user = User::where('email', $email)->first();

        // Verificar si el usuario existe y si la contraseña coincide
        if ($user && $user->password == $password) {
            //if (\Illuminate\Support\Facades\Hash::check('password', $user->password)) {
                Cookie::queue('user_dni', $user->dni, 5);
                Cookie::queue('user_name', $user->name, 5);
                Cookie::queue('user_surname', $user->surname, 5);
                Cookie::queue('user_phone', $user->phone, 5);
                Cookie::queue('user_email', $user->email, 5);
                Cookie::queue('user_type', $user->type, 5);
           // }
            // Autenticación exitosa
            // Aquí puedes realizar alguna acción, como redirigir al usuario a otra página
            return redirect()->route('mainPage');
        } else {
            // Autenticación fallida
            // Vuelve al formulario de inicio de sesión con un mensaje de error
            return redirect()->route('logIn');
        }
    }

    public function logout(Request $request)
    {

        Cookie::queue(Cookie::forget('user_dni'));
        Cookie::queue(Cookie::forget('user_name'));
        Cookie::queue(Cookie::forget('user_surname'));
        Cookie::queue(Cookie::forget('user_phone'));
        Cookie::queue(Cookie::forget('user_email'));
        Cookie::queue(Cookie::forget('user_type'));
        

        return redirect('/');
    }
}
