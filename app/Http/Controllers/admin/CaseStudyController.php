<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\CaseStudy;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class CaseStudyController extends Controller
{
    public function index()
    { 
         $CaseStudy = CaseStudy::with('category')->latest()->get();
        return view('admin.caseStudy.index', compact('CaseStudy'));
    }

     public function create()
    {
        $categories = Category::latest()->get();
        return view('admin.caseStudy.create',compact('categories'));
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
            $image->move(public_path('storage/caseStudy/'), $imageName);
            $data['featured_image'] = 'storage/caseStudy/' . $imageName;
        }
        CaseStudy::create($data);

        return redirect()->route('admin.caseStudy.index')->with('success', 'Case Study created successfully.');
        
    }

     public function edit(CaseStudy $CaseStudy)
    {
          $categories = Category::all();
        return view('admin.caseStudy.edit', compact('CaseStudy','categories'));
    }

    

   
    public function destroy(CaseStudy $CaseStudy)
    {
        if ($CaseStudy->featured_image && file_exists(public_path($CaseStudy->featured_image))) {
            unlink(public_path($CaseStudy->featured_image));
        }
        
        $CaseStudy->delete();

        return redirect()->route('admin.caseStudy.index')->with('success', 'case Study deleted successfully.');
    }

 
    public function update(Request $request, CaseStudy $CaseStudy)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id', 
            'title'         => 'required|string|max:255',
            'description'   => 'required|string|max:1000',
            'content'       => 'required|string',
            'status'        => 'required|in:draft,published',
            'image'         => 'nullable|image|mimes:jpeg,png,jpg,webp,avif|max:2048',
            'slug'          => 'required|string|unique:case_study,slug,' . $CaseStudy->id,
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
            if ($CaseStudy->featured_image && Storage::exists($CaseStudy->featured_image)) {
                Storage::delete($CaseStudy->featured_image);
            }
            $data['featured_image'] = null;
        }
        else if ($request->hasFile('image')) {
            if ($CaseStudy->featured_image && Storage::exists($CaseStudy->featured_image)) {
                Storage::delete($CaseStudy->featured_image);
            }
            
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('storage/caseStudy/'), $imageName);
            $data['featured_image'] = 'storage/caseStudy/' . $imageName;
        }
        else {
            $data['featured_image'] = $CaseStudy->featured_image;
        }

        $CaseStudy->update($data);

        return redirect()->route('admin.caseStudy.index')->with('success', 'Case Study updated successfully.');
    }
}
