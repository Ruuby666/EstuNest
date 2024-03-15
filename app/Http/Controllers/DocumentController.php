<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cookie;

class DocumentController extends Controller
{
    public function index()
    {
    }

    public function uploadDocument(Request $request) {

        try {
            $imageName = time().'.'.$request->file('file')->extension();
            $request->file('file')->move(public_path('img/documents'), $imageName);
            $document = new Document();
            $document -> image = $imageName;
            $document -> dni_user = Cookie::get('user_dni');
            $document -> save();

            return redirect()->route('mainPage');
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }
}
