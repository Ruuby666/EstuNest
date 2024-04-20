<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Cookie;

class LoginController extends Controller
{
    /**
     * Shows the login form view
     */
    public function showLoginForm()
    {
        return view('logIn');
    }

    /**
     * Validates the login form and logs the user in
     */
    public function login(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('pass');

        $user = User::where('email', $email)->first();

        if ($user && \Illuminate\Support\Facades\Hash::check($password, $user->password)) {
                Cookie::queue('user_dni', $user->dni, 60);
                Cookie::queue('user_name', $user->name, 60);
                Cookie::queue('user_surname', $user->surname, 60);
                Cookie::queue('user_phone', $user->phone, 60);
                Cookie::queue('user_email', $user->email, 60);
                Cookie::queue('user_profile_pic', $user->profile_picture, 60);
                Cookie::queue('user_type', $user->type, 60);

            if($user->type == 'admin') {
                return redirect()->route('mainAdmin');
            }
            else{
                return redirect()->route('mainPage');
            }

        } else {
            $errorMessage = 'Usuario o contraseña incorrectos';
            return redirect()->route('logIn')->with('errorMessage', $errorMessage);
        }
    }

    /**
     * Logs the user out and redirects to the home page
     */
    public function logout(Request $request)
    {

        Cookie::queue(Cookie::forget('user_dni'));
        Cookie::queue(Cookie::forget('user_name'));
        Cookie::queue(Cookie::forget('user_surname'));
        Cookie::queue(Cookie::forget('user_phone'));
        Cookie::queue(Cookie::forget('user_email'));
        Cookie::queue(Cookie::forget('user_profile_pic'));
        Cookie::queue(Cookie::forget('user_type'));


        return redirect('/');
    }
}
