<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use Illuminate\Http\Request;

class BlogCategoryController extends Controller
{
    public function index()
    {
        $categories = BlogCategory::orderBy('sort_order')->paginate(10);
        return view('admin.blog-categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.blog-categories.create');
    }

    public function store(Request $request)
    {
        

        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:blog_categories',
            'description' => 'nullable|string',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
            'is_featured' => 'required|boolean',
            'status' => 'required|boolean',
            'sort_order' => 'nullable|integer'
        ]);

        BlogCategory::create($validated);

        return redirect()->route('admin.blog-categories.index')
                        ->with('success', 'Blog category created successfully.');
    }

    public function edit(BlogCategory $blogCategory)
    {
        return view('admin.blog-categories.edit', compact('blogCategory'));
    }

    public function update(Request $request, BlogCategory $blogCategory)
    {
        

        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:blog_categories,name,'.$blogCategory->id,
            'description' => 'nullable|string',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
            'is_featured' => 'required|boolean',
            'status' => 'required|boolean',
            'sort_order' => 'nullable|integer'
        ]);

        $blogCategory->update($validated);

        return redirect()->route('admin.blog-categories.index')
                        ->with('success', 'Blog category updated successfully');
    }

    public function destroy(BlogCategory $blogCategory)
    {
        if($blogCategory->blogs()->count() > 0) {
            return redirect()->route('admin.blog-categories.index')
                            ->with('error', 'Cannot delete category with associated blogs.');
        }
        
        $blogCategory->delete();

        return redirect()->route('admin.blog-categories.index')
                        ->with('success', 'Blog category deleted successfully');
    }
}