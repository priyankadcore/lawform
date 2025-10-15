<?php
// app/Http/Controllers/CommentController.php

namespace App\Http\Controllers;

use App\Models\Comments;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CommentController extends Controller
{


    public function index()
    {
        $comments = Comments::with('blog')->get();
        return view('admin.comment.index', compact('comments'));
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'blog_id' => 'nullable|exists:blogs,id',
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'comment' => 'required|string'
            ]);

            $comment = Comments::create($validated);

            // Check if it's an AJAX request
            if ($request->ajax()) {
                return response()->json([
                    'status' => 'success',
                    'message' => 'Comment saved successfully!'
                ]);
            }

            return redirect()->back()->with('success', 'Comment saved successfully!');

        } catch (ValidationException $e) {
            if ($request->ajax()) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Validation failed',
                    'errors' => $e->errors()
                ], 422);
            }

            return redirect()->back()->withErrors($e->errors())->withInput();
        }
    }



    public function destroy($id)
    {
        $comment = Comments::find($id);

        if (!$comment) {
            return response()->json([
                'message' => 'Comment not found!'
            ], Response::HTTP_NOT_FOUND);
        }

        $comment->delete();
         return redirect()->back()->with('success', 'Comment deleted successfully!');

    }

   
    
}