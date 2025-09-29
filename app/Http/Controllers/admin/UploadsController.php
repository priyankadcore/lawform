<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PropertyStatus;
use App\Models\Upload;
use Illuminate\Http\Request;

class UploadsController extends Controller
{
    // public function index()
    // {
    //     // $statuses = PropertyStatus::orderBy('sort_order')->paginate(10);
    //     return view('admin.uploads.index');
    // }

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
            
            // Create upload record
            $upload = Upload::create([
                'filename' => basename($filePath)
            ]);

            return response()->json([
                'success' => true,
                'message' => 'File uploaded successfully',
                'upload' => [
                    'id' => $upload->id,
                    'name' => $upload->original_name,
                    'size' => $upload->formatted_file_size,
                    'url' => $upload->file_url,
                    'preview' => $upload->file_url
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
        $upload = Upload::findOrFail($id);
        
        // Delete file from storage
        Storage::disk('public')->delete($upload->file_path);
        
        // Delete record from database
        $upload->delete();

        return response()->json([
            'success' => true,
            'message' => 'File deleted successfully'
        ]);
    }
}