<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;
use App\Models\SectionType;
use App\Models\SectionTemplate;
use App\Models\PageSection;
use Illuminate\Support\Facades\Storage;

class PagesController extends Controller
{
    // public function index()
    // {
    //     $pages = Page::all();
    //     $templates = SectionTemplate::all();
    //     $sectionTypes = SectionType::all();
    //     $PageSection = PageSection::all();
    //     return view('admin.pages.index', compact('pages','sectionTypes'));
    // }

    public function index()
    {
        $pages = Page::all();
        $sectionTypes = SectionType::all();
     
        $pageSections = PageSection::with(['page', 'sectionType', 'sectionTemplate'])
            ->get()
            ->groupBy('page_id');
        
        return view('admin.pages.index', compact('pages', 'sectionTypes', 'pageSections'));
    }

    

    public function list()
    {
        $pages = Page::all();
        
        return view('admin.pages.list', compact('pages'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'   => 'required|string|max:255|unique:pages,name',
            'slug'   => 'required|string|max:255|unique:pages,slug',
            'status' => 'required|string',
        ]);

        Page::create([
            'name'   => $request->name,
            'slug'   => $request->slug,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.pages.index')
            ->with('success',  'Page added successfully.');
    }

    

   public function getTemplates($section_type_id)
    {
        $templates = SectionTemplate::where('section_type_id', $section_type_id)
                    ->select('id', 'style_variant', 'image', 'fields')
                    ->get()
                    ->map(function($template) {
                        if ($template->image) {
                            $template->preview_image_url = asset('storage/' . $template->image);
                        } else {
                            $template->preview_image_url = null;
                        }
                        return $template;
                    });
        
        return response()->json($templates);
    }

    public function section_add(Request $request)
    {
        try {
            $request->validate([
                'page_id' => 'required|exists:pages,id',
                'section_type_id' => 'required|exists:section_types,id',
                'section_template_id' => 'required|exists:section_templates,id',
                'order' => 'required|integer|min:0',
            ]);

            // Create new section
            PageSection::create([
                'page_id' => $request->page_id,
                'section_type_id' => $request->section_type_id,
                'section_template_id' => $request->section_template_id,
                'order' => $request->order,
            ]);
            return redirect()->route('admin.pages.index')
                ->with('success', 'Page Section added successfully.');

        } catch (ValidationException $e) {
            return redirect()->back()
                ->withInput()
                ->withErrors($e->errors())
                ->with('error', 'Please fix the validation errors.');

        } catch (QueryException $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Database error occurred. Please try again.');

        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'An unexpected error occurred. Please try again.');
        }
    }

   public function getSections($id)
    {
        $sections = PageSection::with(['sectionType', 'sectionTemplate'])
            ->where('page_id', $id)
            ->get()
            ->map(function ($section) {
                return [
                    'id' => $section->id,
                    'order' => $section->order,
                    'sectionType' => [
                        'type' => $section->sectionType->type ?? 'N/A',
                    ],
                    'sectionTemplate' => [
                        'style_variant' => $section->sectionTemplate->style_variant ?? 'N/A',
                    ],
                ];
            });

        return response()->json($sections);
    }

    public function deletePageSection($id)
    {
        try {
            $section = PageSection::findOrFail($id);
            $section->delete();

            return response()->json(['status' => 'success', 'message' => 'Section deleted successfully.']);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => 'Failed to delete section.'], 500);
        }
    }
}
