<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
     public function index()
    { 
         $blogs = Blog::with('category')->latest()->get();
        return view('admin.blog.index', compact('blogs'));
    }

     public function create()
    {
        $categories = Category::latest()->get();
        return view('admin.blog.create',compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
             'category_id' => 'required|exists:categories,id', 
            'title'         => 'required|string|max:255',
            'description'   => 'required|string|max:1000',
            'content'       => 'required|string',
            'status'        => 'required|in:draft,published',
            'image'         => 'nullable|image|mimes:jpeg,png,jpg,webp,avif|max:2048',
            'slug'          => 'required|string|unique:blogs,slug',
            
        ]);

        $data = $request->only([
            'category_id',
            'title', 
            'description', 
            'content', 
            'status', 
            'slug'
        ]);
        
        // Handle Featured Image Upload
        if ($request->hasFile('image')) {
            $image      = $request->file('image');
            $imageName  = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/blogs'), $imageName);
            $data['featured_image'] = 'uploads/blogs/' . $imageName;
        }

        // Save to Database
        Blog::create($data);

        return redirect()->route('admin.blogs.index')->with('success', 'Blog created successfully.');
        
    }

     public function edit(Blog $blog)
    {
          $categories = Category::all();
        return view('admin.blog.edit', compact('blog','categories'));
    }

    

   
    public function destroy(Blog $blog)
    {
        if ($blog->featured_image && file_exists(public_path($blog->featured_image))) {
            unlink(public_path($blog->featured_image));
        }
        
        $blog->delete();

        return redirect()->route('admin.blogs.index')->with('success', 'Blog deleted successfully.');
    }

 
    public function update(Request $request, Blog $blog)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id', 
            'title'         => 'required|string|max:255',
            'description'   => 'required|string|max:1000',
            'content'       => 'required|string',
            'status'        => 'required|in:draft,published',
            'image'         => 'nullable|image|mimes:jpeg,png,jpg,webp,avif|max:2048',
            'slug'          => 'required|string|unique:blogs,slug,' . $blog->id,
            'remove_image'  => 'nullable|boolean',
        ]);

        $data = $request->only([
            'category_id',
            'title', 
            'description', 
            'content', 
            'status', 
            'slug'
        ]);

        if ($request->has('remove_image') && $request->remove_image == 1) {
            if ($blog->featured_image && Storage::exists($blog->featured_image)) {
                Storage::delete($blog->featured_image);
            }
            $data['featured_image'] = null;
        }
        else if ($request->hasFile('image')) {
            if ($blog->featured_image && Storage::exists($blog->featured_image)) {
                Storage::delete($blog->featured_image);
            }
            
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('uploads/blogs'), $imageName);
            $data['featured_image'] = 'uploads/blogs/' . $imageName;
        }
        else {
            $data['featured_image'] = $blog->featured_image;
        }

        $blog->update($data);

        return redirect()->route('admin.blogs.index')->with('success', 'Blog updated successfully.');
    }

}
