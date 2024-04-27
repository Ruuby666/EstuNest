<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;
use Illuminate\Support\Facades\Session;
use App\Models\Rent;
use Illuminate\Support\Facades\Cookie;

class RentController extends Controller
{
    /**
     * Gets the payment data and reservation dates and saves the rent in the database
     */
    public function pay(Request $request)
    {
        $request->validate([
            'name-card' => 'required|string|max:255|regex:/^[A-Z][a-z]+ [A-Z][a-z]+ [A-Z][a-z]+$/',
            'number-card' => 'required|string|max:255|regex:/^\d{16}$/',
            'date-card' => 'required',
            'cvc-card' => 'required|string|max:4|regex:/^\d{3}$/',
        ], [
            'number-card.regex' => 'El número de tarjeta debe contener exactamente 16 dígitos.',
            'date-card.regex' => 'La fecha de caducidad debe tener el formato MM/YY.',
            'cvc-card.regex' => 'El código de seguridad (CVC) debe tener exactamente 3 dígitos.',
        ]);

        $reservationDates = Session::get('reservation_dates');
        $start = $reservationDates['start'];
        $end = $reservationDates['end'];

        $clientDni = Cookie::get('user_dni');

        $rental = Rent::create([
            'id_property' => $request->route('id'),
            'dni_tenant' => $clientDni,
            'start_month' => $start,
            'end_month' => $end,
        ]);

        $rental->save();

        return redirect()->route('mainPage')->with('success', 'La reserva se ha realizado correctamente');
    }
}
