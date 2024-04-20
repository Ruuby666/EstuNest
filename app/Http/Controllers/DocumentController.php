<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cookie;

class DocumentController extends Controller
{

    /**
     * Gets the data from the form and saves the document in the database and the image in the img/documents folder
     */
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

    /**
     * Returns the view with the documents that are in the database
     */
    public function viewDocuments()
    {
        $documents = DB::select('select * from documents');
        return view('mainAdmin', ['documents' => $documents]);
    }

    /**
     * Accepts the document, changes the user type to 'both' and deletes the document from the database
     */
    public function acceptDocument($id)
    {
        $document = Document::where('id', $id)->first();
        $user = User::where('dni', $document->dni_user)->first();

        if ($user) {
            $user->type = 'both';
            $user->save();
            $document->delete();
        }

        return redirect()->route('mainAdmin');
    }
    
    /**
     * Denies the document and deletes it from the database
     */
    public function denyDocument($id)
    {
        $document = Document::where('id', $id)->first();
        $document->delete();
        unlink(public_path('img/documents/' . $document->image));

        return redirect()->route('mainAdmin');

    }
}
