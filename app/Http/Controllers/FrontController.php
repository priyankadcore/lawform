<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\SectionType;
use App\Models\SectionTemplate;
use App\Models\PageSection;
use App\Models\PageSectionFields;

class FrontController extends Controller
{
   

    public function index()
    {
        $Page = Page::where('slug', 'home')->first();
        
        $pageSections = PageSection::with([
            'page', 
            'sectionType', 
            'sectionTemplate',
            'fields'
        ])
        ->where('page_id', $Page->id)
        ->orderBy('order', 'asc')
        ->get();

        // Fields ko properly format karein
        $pageSections->each(function($section) {
            $fieldsData = [];
            
            foreach($section->fields as $field) {
                // field_key ke according data organize karein
                $fieldsData[$field->field_key] = $field->field_value;
            }
            
            $section->fields_data = $fieldsData;
        });

        return view('frontend.index', compact('pageSections'));
    }

    // public function index($slug)
    // {
    //     // Home page ke liye alag handling
    //     if($slug === '/') {
    //         $slug = 'home';
    //     }
        
    //     $Page = Page::where('slug', $slug)->first();
        
    //     // Agar page nahi mila toh 404
    //     if(!$Page) {
    //         abort(404);
    //     }
        
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
    //             $fieldsData[$field->field_key] = $field->field_value;
    //         }
            
    //         $section->fields_data = $fieldsData;
    //     });

    //     return view('frontend.index', compact('pageSections', 'Page'));
    // }
    
    public function second()
    {
        return view('second');
    }
    public function third()
    {
        return view('third');
    }
    public function about()
    {
        return view('about');
    }
    public function contact()
    {
        return view('contact'); 
    }
    public function services()
    {
        return view('services');
    }
    public function properties()
    {
        return view('properties');
    }
    public function propertyDetail($id)
    {
        return view('property_detail', ['id' => $id]);
    }

    public function ourTeam()
    {
        return view('our_team');
    }
    public function blog()
    {
        return view('blog');
    }
    public function blogDetail($id)
    {
        return view('blog_detail', ['id' => $id]);
    }
    public function search(Request $request)
    {
        $query = $request->input('query');
        return view('search_results', ['query' => $query]);     
    }

    public function propertyList()
    {
        return view('property_listing');
    }
}
