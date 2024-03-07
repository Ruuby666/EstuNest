<?php

namespace App\Http\Controllers;
use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function index() {
        $properties = Property::all(); // Obtener todas las propiedades
        return view('properties.index', compact('properties'));
    }
}
