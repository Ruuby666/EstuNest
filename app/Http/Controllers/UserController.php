<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cookie;


class UserController extends Controller
{
    public function register(Request $request)
    {
        //Validar los datos del formulario
        $request->validate([
            'dni' => 'required|unique:users|string|min:8|regex:/^[xyz]?\d{8}[a-z]$/i',
            'name' => 'required|string|max:255|regex:/^[A-Z]+$/i',
            'surname' => 'required|string|max:255|regex:/^[A-Z][a-z]+ [A-Z][a-z]+$/',
            'email' => 'required|email|max:255|unique:users|regex:/^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/i',
            'pass' => 'required|string|min:3|confirmed|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[[:punct:]])[A-Za-z\d[:punct:]]{8,}$/i',
            'phone' => 'required|string|max:255|regex:/^\d{9}$/i',
        ],[
            'pass.regex' => 'Como minimo, debe contener 1 mayúscula, 1 minúscula, 1 dígito, 1 carácter especial y un minimo de 8 caracteres.'
        ]);


        // Crear un nuevo usuario
        $user = new User();
        $user ->dni = $request->input('dni');
        $user -> name = $request->input('name');
        $user -> surname = $request->input('surname');
        $user -> email = $request-> input('email');
        $user -> password = bcrypt($request->input('pass'));
        $user -> phone = $request->input('phone');
        $user -> type = 'landlord';
        $user -> save();

        // Autenticar al usuario (opcional)
        // auth()->login($user);
        // Redirigir al usuario después del registro
        return redirect()->route('logIn');
    }

    public function viewMyProperties()
    {
        $user = Cookie::get('user_dni');
        $properties = DB::select('select * from properties where dni_landlord = ?', [$user]);
        return view('userProperties', ['properties' => $properties]);
    }

}
