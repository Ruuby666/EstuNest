<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\Property;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cookie;


class PropertyController extends Controller
{

    /**
     * Returns the catalog view with the properties that are in the database
     */
    public function index()
    {
        $properties = DB::select('select * from properties');
        return view('catalogo', ['properties' => $properties]);
    }

    /**
     * Returns the main page view with the 3 first properties that are in the database
     */
    public function recomendaciones()
    {
        $properties = Property::take(3)->get();
        return view('mainPage', ['properties' => $properties]);
    }

    /**
     * Returns the view with the details of a property by its id
     */
    public function show($id)
    {
        $property = DB::select('select * from properties where id = ?', [$id]);
        return view('propertyDetails', ['property' => $property]);
    }

    /**
     * Saves the reservation dates in the session and returns the view to pay the rent
     */
    public function rentPay(Request $request, $id)
    {
        Session::put('reservation_dates', [
            'start' => $request->input('start'),
            'end' => $request->input('end'),
        ]);

        $propertyRes = DB::select('select * from properties where id = ?', [$id]);
        return view('reservePage', ['property' => $propertyRes]);
    }

    /**
     * Creates a new property in the database and saves the image in the img/properties folder, then redirects to the catalog view
     */
    public function create(Request $request) 
    {
            $request->validate([
                'address' => 'required',
                'city' => 'required',
                'description' => 'required',
                'price' => 'required',
                'property-image' => 'required|file|mimes:jpeg,png,jpg,gif,svg',
            ]);

            $imageName = time().'.'.$request->file('property-image')->extension();
            $request->file('property-image')->move(public_path('img/properties'), $imageName);

            $property = new Property();
            $property -> description = $request->input('description');
            $property -> price = $request->input('price');
            $property -> city = $request->input('city');
            $property -> address = $request->input('address');
            $property -> images = $imageName;
            $property -> dni_landlord = Cookie::get('user_dni');
            $property -> save();

            return redirect()->route('catalog');
    }

    /**
     * Returns the view to edit a property by its id
     */
    public function edit($id){
        $property = DB::select('select * from properties where id = ?', [$id]);
        return view('propertyEdit', ['property' => $property]);
    }

    /**
     * Deletes a property by its id and redirects to the user properties view
     */
    public function destroy($id)
    {
        DB::delete('delete from properties where id = ?', [$id]);
        return redirect()->route('userProperties');
    }

    /**
     * Updates a property with the new data and image if it has been changed and redirects to the user properties view
     */
    public function update($id, Request $request)
    {
        try {
            $property = Property::find($id);

            $request->validate([
                'property-image' => 'file|mimes:jpeg,png,jpg,gif,svg',
            ]);

            if($request->hasFile('property-image')){
                $imageName = time().'.'.$request->file('property-image')->extension();
                $request->file('property-image')->move(public_path('img/properties'), $imageName);
                $property -> images = $imageName;
            }

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

    /**
     * Returns the view with all the properties that are in the database (only for admin)
     */
    public function viewAllProperties(Request $request){
        $properties = Property::all();
        return view('viewAllProperties', ['properties' => $properties]);
    }

    /**
     * Returns the view to edit a property by its id (only for admin)
     */
    public function adminDeleteProperty($id)
    {
        DB::delete('delete from properties where id = ?', [$id]);
        return redirect()->route('viewAllProperties');
    }

}



