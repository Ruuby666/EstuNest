<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cookie;

class DocumentController extends Controller
{
    public function index()
    {
    }

    public function uploadDocument(Request $request)
    {

        try {
            $imageName = time() . '.' . $request->file('file')->extension();
            $request->file('file')->move(public_path('img/documents'), $imageName);
            $document = new Document();
            $document->image = $imageName;
            $document->dni_user = Cookie::get('user_dni');
            $document->save();

            return redirect()->route('mainPage');
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

    public function viewDocuments()
    {
        $documents = DB::select('select * from documents');
        return view('mainAdmin', ['documents' => $documents]);
    }

    public function acceptDocument($id)
    {
        $document = Document::where('id', $id)->first();
        $user = User::where('dni', $document->dni_user)->first();

        if ($user) {
            // Cambia el tipo de usuario
            $user->type = 'both';

            // Guarda los cambios en la base de datos
            $user->save();

            // Eliminar el registro de la base de datos
            $document->delete();
        }
        // Redirige de vuelta a la lista de documentos
        return redirect()->route('mainAdmin');

    }

    public function denyDocument($id)
    {
        $document = Document::where('id', $id)->first();
        // Eliminar el registro de la base de datos
        $document->delete();

        // Redirige de vuelta a la lista de documentos
        return redirect()->route('mainAdmin');

    }
}
