<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\Property;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cookie;


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

    public function rentPay(Request $request, $id){
        // Almacenar los valores en la sesión
        Session::put('reservation_dates', [
            'start' => $request->input('start'),
            'end' => $request->input('end'),
        ]);

        $propertyRes = DB::select('select * from properties where id = ?', [$id]);
        return view('reservePage', ['property' => $propertyRes]);
    }


    public function create(Request $request) {

        try {
            $request->validate([
                'address' => 'required',
                'city' => 'required',
                'rooms' => 'required',
                'description' => 'required',
                'price' => 'required',
                'property-image' => 'required|file|mimes:jpeg,png,jpg,gif,svg',
            ]);

            $imageName = time().'.'.$request->file('property-image')->extension();
            $request->file('property-image')->move(public_path('img/properties'), $imageName);

            $property = new Property();
            $property -> rooms_available = $request->input('rooms');
            $property -> description = $request->input('description');
            $property -> price = $request->input('price');
            $property -> city = $request->input('city');
            $property -> address = $request->input('address');
            $property -> images = $imageName;
            $property -> dni_landlord = Cookie::get('user_dni');
            $property -> save();

            return redirect()->route('catalog');
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

    public function edit($id){
        $property = DB::select('select * from properties where id = ?', [$id]);
        return view('propertyEdit', ['property' => $property]);
    }

    public function destroy($id)
    {
        DB::delete('delete from properties where id = ?', [$id]);
        return redirect()->route('userProperties');
    }

    public function update($id, Request $request){
        try {
            $property = Property::find($id);

            //Validate the data
            $request->validate([
                'address' => 'required',
                'city' => 'required',
                'rooms' => 'required',
                'description' => 'required',
                'price' => 'required',
            ]);

            $property -> rooms_available = $request->input('rooms');
            $property -> description = $request->input('description');
            $property -> price = $request->input('price');
            $property -> city = $request->input('city');
            $property -> address = $request->input('address');
            $property -> dni_landlord = Cookie::get('user_dni');
            $property -> save();

            return redirect()->route('userProperties');
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }
}
