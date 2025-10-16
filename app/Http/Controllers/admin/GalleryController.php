<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gallery;
use Illuminate\Support\Facades\Storage; 

class GalleryController extends Controller
{
    public function index()
    {
        $gallerys = Gallery::latest()->get();
        return view('admin.gallery.index', compact('gallerys'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|file|max:10240',
        ]);

        try {
            $file = $request->file('file');
            
            $filePath = $file->store('gallery', 'public');
            
            $gallery = Gallery::create([
                'filename' => basename($filePath)
            ]);

            return response()->json([
                'success' => true,
                'message' => 'File uploaded successfully',
                'upload' => [
                    'id' => $gallery->id,
                    'filename' => $gallery->filename,
                    'url' => asset('storage/gallery/' . $gallery->filename) // Direct URL
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


    public function update(Request $request, $id)
    {
        $request->validate([
            'description' => 'nullable|string|max:255',
            'alt_text' => 'nullable|string|max:255',
        ]);

        $gallery= Gallery::findOrFail($id);
        $gallery->update($request->only(['description', 'alt_text']));

        return redirect()->route('admin.gallery.index')
            ->with('success', 'File updated successfully');
    }
    public function destroy($id)
    {
        try {
            // Find the upload record
            $gallery = Gallery::findOrFail($id);
            
            // Get the filename before deleting the record
            $filename = $gallery->filename;
            
            // Delete the file from storage
            if (Storage::disk('public')->exists('gallery/' . $filename)) {
                Storage::disk('public')->delete('gallery/' . $filename);
            }
            
            // Delete the database record
            $gallery->delete();
            
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
