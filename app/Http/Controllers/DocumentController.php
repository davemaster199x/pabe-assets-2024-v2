<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    public function index()
    {
        return view('documents.index');
    }

    public function getDocuments()
    {
        $documents = Document::with('user')->get();
        return response()->json($documents);
    }

    public function getDocuments2($id)
    {
        $documents = Document::with('user')->where('asset_id',$id)->where('delete','0')->get();
        return response()->json($documents);
    }

    public function store(Request $request)
    {
        $request->validate([
            'document' => 'required|file|mimes:pdf,doc,docx,jpg,png|max:2048',
        ]);

        if ($request->hasFile('document')) {
            $file = $request->file('document');
            $path = $file->store('documents', 'public');
            $fileType = $file->getClientMimeType();

            $document = new Document();
            $document->file_name = basename($path);
            $document->file_path = $path;
            $document->file_type = $fileType;
            $document->asset_id = $request->asset_id;
            $document->user_id = Auth::id();
            $document->description = $request->description;
            $document->save();

            return response()->json(['success' => true, 'message' => 'Document uploaded successfully.', 'path' => $path]);
        }

        return response()->json(['success' => false, 'message' => 'No document uploaded.'], 400);
    }

    public function download($id)
    {
        $document = Document::findOrFail($id);
        return response()->download(storage_path("app/public/{$document->file_path}"), $document->file_name);
    }

    public function destroy($id)
    {
        // Find the document by its primary key
        $document = Document::findOrFail($id);

        // Update the 'delete' field to 1 for soft deletion
        $document->update(['delete' => 1]);

        // Optionally, you can also update the timestamps if needed
        // $document->touch();

        return response()->json(['success' => true, 'message' => 'Document detached successfully.']);
    }


}
