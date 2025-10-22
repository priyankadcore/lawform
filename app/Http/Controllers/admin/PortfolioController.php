<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Portfolio;
use App\Models\Category;
use App\Models\PortfolioImage;

class PortfolioController extends Controller
{
    public function index()
    {
        $portfolios = Portfolio::all();
       $categories = Category::latest()->get();
        return view('admin.portfolio.index',compact('portfolios','categories'));
    }

    public function create()
    {
        $categories = Category::latest()->get();
        return view('admin.portfolio.create',compact('categories'));
    }

   

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:portfolios,slug',
            'category_id' => 'required|exists:categories,id',
            'client' => 'nullable|string|max:255',
            'project_date' => 'nullable|date',
            'description' => 'nullable|string',
            'project_url' => 'nullable|url',
            'technologies' => 'nullable|string',
            'featured_image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'status' => 'required|boolean',
        ]);

        try {
            // Upload featured image
            $featuredImagePath = null;
            if ($request->hasFile('featured_image')) {
                $featuredImagePath = $request->file('featured_image')->store('portfolio', 'public');
            }

            // Create portfolio
            $portfolio = Portfolio::create([
                'name' => $request->name,
                'slug' => $request->slug,
                'category_id' => $request->category_id,
                'client' => $request->client,
                'project_date' => $request->project_date,
                'description' => $request->description,
                'project_url' => $request->project_url,
                'technologies' => $request->technologies,
                'featured_image' => $featuredImagePath,
                'status' => $request->status,
            ]);

            return redirect()->route('admin.portfolio.index')
            ->with('success', 'Portfolio item created successfully!');

        } catch (\Exception $e) {
            return response()->json([
                'success' => false, 
                'message' => 'Error creating portfolio: '.$e->getMessage()
            ], 500);
        }
    }

     public function show($id)
    {
        $portfolio = Portfolio::with(['category', 'images'])->findOrFail($id);
     
        return view('admin.portfolio.show', compact('portfolio'));
    }

    public function edit($id)
    {
        $portfolio = Portfolio::findOrFail($id);
        $categories = Category::latest()->get();
        return view('admin.portfolio.edit', compact('portfolio', 'categories'));
    }

   public function update(Request $request, $id)
    {
        $portfolio = Portfolio::findOrFail($id);
        
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:portfolios,slug,' . $portfolio->id,
            'category_id' => 'required|exists:categories,id',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'client' => 'nullable|string|max:255',
            'project_date' => 'nullable|date',
            'short_description' => 'nullable|string|max:500',
            'description' => 'nullable|string',
            'project_url' => 'nullable|url',
            'technologies' => 'nullable|string',
            'status' => 'required|boolean',
        ]);

        try {
            if ($request->hasFile('featured_image')) {
                if ($portfolio->featured_image && Storage::disk('public')->exists($portfolio->featured_image)) {
                    Storage::disk('public')->delete($portfolio->featured_image);
                }
                
                $featuredImagePath = $request->file('featured_image')->store('portfolio', 'public');
                $portfolio->featured_image = $featuredImagePath;
            }

            $portfolio->update([
                'name' => $request->name,
                'slug' => $request->slug,
                'category_id' => $request->category_id,
                'client' => $request->client,
                'project_date' => $request->project_date,
                'short_description' => $request->short_description,
                'description' => $request->description,
                'project_url' => $request->project_url,
                'technologies' => $request->technologies,
                'status' => $request->status,
                'featured_image' => $portfolio->featured_image, 
            ]);

            return redirect()->route('admin.portfolio.index')
                ->with('success', 'Portfolio item updated successfully!');

        } catch (\Exception $e) {
            return back()->with('error', 'Error updating portfolio: ' . $e->getMessage())
                        ->withInput();
        }
    }

    public function destroy($id)
    {
        try {
            $portfolio = Portfolio::findOrFail($id);
            if ($portfolio->featured_image) {
                Storage::disk('public')->delete($portfolio->featured_image);
            }

            if (method_exists($portfolio, 'images') && $portfolio->images->isNotEmpty()) {
                foreach ($portfolio->images as $image) {
                    if ($image->image_path) {
                        Storage::disk('public')->delete($image->image_path);
                    }
                    $image->delete();
                }
            }
            $portfolio->delete();

            return redirect()->route('admin.portfolio.index')
                ->with('success', 'Portfolio item deleted successfully!');

        } catch (\Exception $e) {
            return redirect()->route('admin.portfolio.index')
                ->with('error', 'Error deleting portfolio: ' . $e->getMessage());
        }
    }


    public function uploadGallery(Request $request)
    {
        $request->validate([
            'portfolio_id' => 'required|exists:portfolios,id',
            'gallery_images.*' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:5120'
        ]);

        try {
            $portfolioId = $request->portfolio_id;
            $uploadedImages = [];

            if ($request->hasFile('gallery_images')) {
                foreach ($request->file('gallery_images') as $image) {
                     $filename = $image->getClientOriginalName(); 
                
                    $imagePath = $image->storeAs('portfolio/gallery', $filename, 'public');
            
                    $portfolioImage = PortfolioImage::create([
                        'portfolio_id' => $portfolioId,
                        'image' => $imagePath, 
                    ]);

                    $uploadedImages[] = $portfolioImage;
                }
            }

            return redirect()->back()->with('success', count($uploadedImages) . ' images uploaded successfully!');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error uploading images: ' . $e->getMessage());
        }
    }


    public function deleteImage($id)
    {
        try {
            $portfolioImage = PortfolioImage::findOrFail($id);
            $portfolioId = $portfolioImage->portfolio_id;
            
            if (Storage::disk('public')->exists($portfolioImage->image)) {
                Storage::disk('public')->delete($portfolioImage->image);
            }
            
            $portfolioImage->delete();
            
            return redirect()->route('admin.portfolio.show', $portfolioId)
                            ->with('success', 'Image deleted successfully!');
                            
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error deleting image: ' . $e->getMessage());
        }
    }
}