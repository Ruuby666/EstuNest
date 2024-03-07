<?php

namespace App\Http\Controllers;

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

    public function show($id)
    {
        $property = DB::select('select * from properties where id = ?', [$id]);
        return view('propertyDetails', ['property' => $property]);
    }
}
