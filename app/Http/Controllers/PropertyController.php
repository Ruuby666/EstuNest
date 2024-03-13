<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\Property;
use Illuminate\Support\Facades\DB;

class PropertyController extends Controller
{

    public function index()
    {
        $properties = DB::select('select * from properties');
        return view('catalogo', ['properties' => $properties]);
    }

    public function recomendaciones()
    {
        $properties = Property::take(3)->get();
        return view('mainPage', ['properties' => $properties]);
    }

    public function show($id)
    {
        $property = DB::select('select * from properties where id = ?', [$id]);
        return view('propertyDetails', ['property' => $property]);
    }

    public function rentPay(Request $request, $id)
    {
        // Almacenar los valores en la sesión
        Session::put('reservation_dates', [
            'start' => $request->input('start'),
            'end' => $request->input('end'),
        ]);
        
        $propertyRes = DB::select('select * from properties where id = ?', [$id]);
        return view('reservePage', ['property' => $propertyRes]);
    }

    public function create()
    {
        return view('propertyCreation');
    }
}
