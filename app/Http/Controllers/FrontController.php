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


}
