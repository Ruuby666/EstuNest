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
        return view('mainPage', ['properties' => $properties]);
        
    }
}
