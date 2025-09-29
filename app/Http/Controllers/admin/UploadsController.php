<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PropertyStatus;
use App\Models\Upload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; 

class UploadsController extends Controller
{
   
     public function index()
    {
        $uploads = Upload::latest()->get();
        return view('admin.uploads.index', compact('uploads'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|file|max:10240', // 10MB max
        ]);

        try {
            $file = $request->file('file');
            
            // Store file
            $filePath = $file->store('uploads', 'public');
            
            // Create upload record - ONLY filename
            $upload = Upload::create([
                'filename' => basename($filePath)
            ]);

            return response()->json([
                'success' => true,
                'message' => 'File uploaded successfully',
                'upload' => [
                    'id' => $upload->id,
                    'filename' => $upload->filename,
                    'url' => asset('storage/uploads/' . $upload->filename) // Direct URL
                ]
            ]);

        } catch (\Exception $e) {
            \Log::error('Upload error: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to upload file: ' . $e->getMessage()
            ], 500);
        }
    }

    public function edit($id)
    {
        $upload = Upload::findOrFail($id);
        return view('admin.uploads.edit', compact('upload'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'description' => 'nullable|string|max:255',
            'alt_text' => 'nullable|string|max:255',
        ]);

        $upload = Upload::findOrFail($id);
        $upload->update($request->only(['description', 'alt_text']));

        return redirect()->route('uploads.index')
            ->with('success', 'File updated successfully');
    }
    public function destroy($id)
    {
        try {
            // Find the upload record
            $upload = Upload::findOrFail($id);
            
            // Get the filename before deleting the record
            $filename = $upload->filename;
            
            // Delete the file from storage
            if (Storage::disk('public')->exists('uploads/' . $filename)) {
                Storage::disk('public')->delete('uploads/' . $filename);
            }
            
            // Delete the database record
            $upload->delete();
            
            return response()->json([
                'success' => true,
                'message' => 'Image deleted successfully'
            ]);
            
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error deleting image: ' . $e->getMessage()
            ], 500);
        }
    }
}