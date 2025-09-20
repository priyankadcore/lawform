<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::with(['author', 'category'])->latest()->paginate(10);
        return view('admin.blogs.index', compact('blogs'));
    }

    public function create()
    {
        $categories = BlogCategory::where('status', true)->get();
        $authors = User::where('is_admin', true)->get();
        return view('admin.blogs.create', compact('categories', 'authors'));
    }

    public function store(Request $request)
    {


        $validated = $request->validate([
            'title' => 'required|string|max:255|unique:blogs',
            'content' => 'required|string',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'author_id' => 'required|exists:users,id',
            'category_id' => 'required|exists:blog_categories,id',
            'status' => 'required|boolean',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
            'published_at' => now()
        ]);

        if ($request->hasFile('featured_image')) {
            $validated['featured_image'] = $request->file('featured_image')->store('blogs', 'public');
        }

        Blog::create($validated);

        return redirect()->route('admin.blogs.index')
                        ->with('success', 'Blog created successfully.');
    }

    public function edit(Blog $blog)
    {
        $categories = BlogCategory::where('status', true)->get();
        $authors = User::where('is_admin', true)->get();
        return view('admin.blogs.edit', compact('blog', 'categories', 'authors'));
    }

    public function update(Request $request, Blog $blog)
    {
     
        $validated = $request->validate([
            'title' => 'required|string|max:255|unique:blogs,title,'.$blog->id,
            'content' => 'required|string',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'author_id' => 'required|exists:users,id',
            'category_id' => 'required|exists:blog_categories,id',
            'status' => 'required|boolean',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
        ]);

        if ($request->hasFile('featured_image')) {
            // Delete old image if exists
            if ($blog->featured_image) {
                Storage::disk('public')->delete($blog->featured_image);
            }
            $validated['featured_image'] = $request->file('featured_image')->store('blogs', 'public');
        }

        $blog->update($validated);

        return redirect()->route('admin.blogs.index')
                        ->with('success', 'Blog updated successfully');
    }

    public function destroy(Blog $blog)
    {
        // Delete featured image if exists
        if ($blog->featured_image) {
            Storage::disk('public')->delete($blog->featured_image);
        }
        
        $blog->delete();

        return redirect()->route('admin.blogs.index')
                        ->with('success', 'Blog deleted successfully');
    }
}