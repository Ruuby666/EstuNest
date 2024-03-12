<?php

namespace App\Http\Controllers;

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

    public function recomendaciones() {
        $properties = Property::take(3)->get();
        return view('mainPage', ['properties' => $properties]);
    }

    public function show($id)
    {
        $property = DB::select('select * from properties where id = ?', [$id]);
        return view('propertyDetails', ['property' => $property]);
    }

    public function create()
    {
        $name = Cookie::get('user_name');
        $surname = Cookie::get('user_surname');
        $email = Cookie::get('user_email');
        $phone = Cookie::get('user_phone');
        $type = Cookie::get('user_type');

        return view('userDetails', ['name' => $name, 'surname' => $surname, 'email' => $email, 'phone' => $phone, 'type' => $type]);
    }

    public function register(Request $request) {

        try {
            // Tu código actual aquí
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

    // public function edit($id)
    // {
    //     $property = DB::select('select * from properties where id = ?', [$id]);
    //     return view('editProperty', ['property' => $property]);
    // }

    public function destroy($id)
    {
        DB::delete('delete from properties where id = ?', [$id]);
        return redirect()->route('userProperties');
    }
}
