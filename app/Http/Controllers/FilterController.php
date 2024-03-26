<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FilterController extends Controller
{
    public function filter(Request $request)
    {
        $startDate = $request->start;
        $endDate = $request->end;
        $address = $request->address;
        $city = $request->city;

        if ($address != null) {
            
            if ($city != null)
                $properties = DB::select('SELECT * FROM properties WHERE address = ? and city = ? and id NOT IN (SELECT id_property FROM rents WHERE start_month <= ? OR end_month >= ?)', [$address, $city, $startDate, $endDate]);
            else
                $properties = DB::select('SELECT * FROM properties WHERE address = ? and id NOT IN (SELECT id_property FROM rents WHERE start_month <= ? OR end_month >= ?)', [$address, $startDate, $endDate]);

            return view('catalogo', ['properties' => $properties]);
        }
        else if ($city != null) {

            if($address != null)
                $properties = DB::select('SELECT * FROM properties WHERE city = ? and address = ? and id NOT IN (SELECT id_property FROM rents WHERE start_month <= ? OR end_month >= ?)', [$city, $address, $startDate, $endDate]);
            else
                $properties = DB::select('SELECT * FROM properties WHERE city = ? and id NOT IN (SELECT id_property FROM rents WHERE start_month <= ? OR end_month >= ?)', [$city, $startDate, $endDate]);
            
            return view('catalogo', ['properties' => $properties]);
        }
        else {
            $properties = DB::select('SELECT * FROM properties WHERE id NOT IN (SELECT id_property FROM rents WHERE start_month <= ? OR end_month >= ?)', [$startDate, $endDate]);
            return view('catalogo', ['properties' => $properties]);
        }
    }
}
