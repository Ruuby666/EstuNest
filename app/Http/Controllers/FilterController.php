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

        if ($address != null) {
            $properties = DB::select('select * from properties where properties.id not in (select id_property from rents where (start_month <= ? and end_month >= ? and address = ? ) OR (start_month >= ? and end_month <= ? and address = ?))', [$startDate, $endDate, $address]);
            return view('catalogo', ['properties' => $properties]);
        }
        else {
            $properties = DB::select('select * from properties where properties.id not in (select id_property from rents where (start_month <= ? and end_month >= ? ) OR (start_month >= ? and end_month <= ?))', [$startDate, $endDate]);
            return view('catalogo', ['properties' => $properties]);
        }
    }
}
