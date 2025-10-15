<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\SectionType;
use App\Models\SectionTemplate;
use App\Models\PageSection;
use App\Models\PageSectionFields;

use App\Models\Blog;
use App\Models\Comments;
use App\Models\Category;

class FrontController extends Controller
{
   

    // public function index()
    // {
    //     $Page = Page::where('slug', 'home')->first();
        
    //     $pageSections = PageSection::with([
    //         'page', 
    //         'sectionType', 
    //         'sectionTemplate',
    //         'fields'
    //     ])
    //     ->where('page_id', $Page->id)
    //     ->orderBy('order', 'asc')
    //     ->get();

    //     // Fields ko properly format karein
    //     $pageSections->each(function($section) {
    //         $fieldsData = [];
            
    //         foreach($section->fields as $field) {
    //             // field_key ke according data organize karein
    //             $fieldsData[$field->field_key] = $field->field_value;
    //         }
            
    //         $section->fields_data = $fieldsData;
    //     });

    //     return view('frontend.index', compact('pageSections'));
    // }

   public function show($slug = 'home')
    {
        if ($slug === 'blog') {
            return $this->blog();
        }
         if ($slug === 'our-team') {
            return $this->team();
        }
        
        if ($slug === 'blog-detail') {
            // You'll need to handle this differently since blog-detail requires a slug parameter
            abort(404); // or redirect to actual blog page
        }

        $Page = Page::where('slug', $slug)->firstOrFail();
        
        $pageSections = PageSection::with([
            'page', 
            'sectionType', 
            'sectionTemplate',
            'fields'
        ])
        ->where('page_id', $Page->id)
        ->orderBy('order', 'asc')
        ->get();

        // Fields formatting
        $pageSections->each(function($section) {
            $fieldsData = [];
            foreach($section->fields as $field) {
                $fieldsData[$field->field_key] = $field->field_value;
            }
            $section->fields_data = $fieldsData;
        });

        // Header menu
        $header = \App\Models\Navigation::orderBy('order')->get();

        // Return same view always
        return view('frontend.index', compact('pageSections', 'header', 'Page'));
    }

    public function blog()
    {
        $blogs = Blog::where('status', 'published')
                ->with('category')
                ->latest()
                ->get();
                
        // Header menu
        $header = \App\Models\Navigation::orderBy('order')->get();
        
        return view('frontend.blog', compact('blogs', 'header'));
    }

    public function blog_detail($slug)
    {
        $blog = Blog::where('slug', $slug)->firstOrFail();
        $blog_list = Blog::where('status', 'published')
                        ->where('slug', '!=', $slug)
                        ->where('category_id', $blog->category_id)
                        ->get();
                        
        $comments = Comments::where('blog_id', $blog->id)
                        ->latest()
                        ->take(4)
                        ->get();

        $categories = Category::withCount([
            'blogs',
            'publishedBlogs'
        ])->latest()->get();  
        
        // Header menu
        $header = \App\Models\Navigation::orderBy('order')->get();              

        return view('frontend.blog_details', compact('blog', 'blog_list', 'comments', 'categories', 'header'));
    }

    public function team()
    {
        // $blogs = Blog::where('status', 'published')
        //         ->with('category')
        //         ->latest()
        //         ->get();
                 
        return view('frontend.our_team');
    }

}
