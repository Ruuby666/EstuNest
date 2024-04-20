<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cookie;


class UserController extends Controller
{
    /**
     * Gets the data form the register form and creates a new user in the database
     */
    public function register(Request $request)
    {
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

        $user = new User();
        $user ->dni = $request->input('dni');
        $user -> name = $request->input('name');
        $user -> surname = $request->input('surname');
        $user -> email = $request-> input('email');
        $user -> password = bcrypt($request->input('pass'));
        $user -> phone = $request->input('phone');
        $user -> type = 'landlord';
        $user -> save();

        return redirect()->route('logIn');
    }

    /**
     * Returns the view with the user details
     */
    public function details()
    {
        $dni = Cookie::get('user_dni');
        $name = Cookie::get('user_name');
        $surname = Cookie::get('user_surname');
        $email = Cookie::get('user_email');
        $phone = Cookie::get('user_phone');
        $profile_picture = User::where('dni', $dni)->first()->profile_picture;
        $type = Cookie::get('user_type');

        return view('userDetails', ['name' => $name, 'surname' => $surname, 'email' => $email, 'phone' => $phone, 'profile_picture' => $profile_picture , 'type' => $type]);
    }

    /**
     * Returns the view with the properties of the user
     */
    public function viewMyProperties()
    {
        $user = Cookie::get('user_dni');
        $properties = DB::select('select * from properties where dni_landlord = ?', [$user]);
        return view('userProperties', ['properties' => $properties]);
    }

    /**
     * Changes the profile picture of the user and saves the image in the img/profile_pictures folder, then redirects to the main page
     */
    public function changeProfilePic(Request $request)
    {
        $request->validate([
            'profilePictureInput' => 'required|file|mimes:jpeg,png,jpg,gif,svg',
        ]);
    
        $dni = Cookie::get('user_dni');
        $user = User::where('dni', $dni)->first();

        $imageName = $dni.'.'.$request->file('profilePictureInput')->extension();
        $request->file('profilePictureInput')->move(public_path('img/profile_pictures'), $imageName);
    
        $user->profile_picture = $imageName;
        $user->save();
    
        return redirect()->route('mainPage');
    }
}
