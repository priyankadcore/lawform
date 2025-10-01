<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;
use App\Models\SectionType;
use App\Models\SectionTemplate;
use App\Models\PageSection;
use App\Models\PageSectionFields;
use App\Models\Upload;
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
        $upload_images = Upload::latest()->get();
     
        $pageSections = PageSection::with(['page', 'sectionType', 'sectionTemplate'])
            ->get()
            ->groupBy('page_id');
        
        return view('admin.pages.index', compact('pages', 'sectionTypes', 'pageSections','upload_images'));
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
            'meta_title' => $request->meta_title,
            'canonical_url' => $request->canonical_url,
            'meta_keywords' => $request->meta_keywords,
            'meta_description' => $request->meta_description,
            'og_title' => $request->og_title,
            'og_description' => $request->og_description,
            'og_image_url' => $request->og_image,
        ]);

        return redirect()->route('admin.pages.index')
            ->with('success',  'Page added successfully.');
    }
     public function destroyPage($id)
    {
        try {
            $page = Page::findOrFail($id);
            $page->delete();

            return response()->json(['status' => 'success', 'message' => 'Page deleted successfully.']);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => 'Failed to delete Page.'], 500);
        }
    }

    public function pageUpdate(Request $request, $id)
    {
        $page = Page::findOrFail($id);

        $request->validate([
            'name'   => 'required|string|max:255|unique:pages,name,' . $id,
            'slug'   => 'required|string|max:255|unique:pages,slug,' . $id,
            'status' => 'required|string|in:draft,published',
        ]);

        $page->update([
            'name' => $request->name,
            'slug' => $request->slug,
            'status' => $request->status,
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'meta_keywords' => $request->meta_keywords,
            'canonical_url' => $request->canonical_url,
            'og_title' => $request->og_title,
            'og_description' => $request->og_description,
            'og_image_url' => $request->og_image,
        ]);

        return redirect()->route('admin.pages-list.list')
            ->with('success', 'Page updated successfully.');
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
            return redirect()->back()
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
                        'template_id' => $section->sectionTemplate->id ?? null,
                        'fields' => $section->sectionTemplate->fields ?? null,
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

    

    //  update section fields functions
    public function updateSectionFields(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'page_section_id' => 'required|integer|exists:page_sections,id',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 422);
        }

        DB::beginTransaction();
        try {
            $pageSectionId = $request->input('page_section_id');
            $formData = $request->except(['_token', 'page_section_id']);

            foreach ($formData as $fieldKey => $fieldValue) {
                if (is_array($fieldValue)) {
                    $this->processArrayField($pageSectionId, $fieldKey, $fieldValue);
                } else {
                    $this->processSingleField($pageSectionId, $fieldKey, $fieldValue);
                }
            }

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Section data saved successfully!'
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            \Log::error('Section update error: ' . $e->getMessage());
            
            return response()->json([
                'success' => false,
                'message' => 'Failed to save section data: ' . $e->getMessage()
            ], 500);
        }
    }

    private function processSingleField($pageSectionId, $fieldKey, $fieldValue)
    {
        $existingRecord = PageSectionField::where([
            'page_section_id' => $pageSectionId,
            'field_key' => $fieldKey
        ])->first();

        if ($existingRecord) {
            $existingRecord->update([
                'field_value' => $fieldValue ?? '',
                'field_type' => $this->detectFieldType($fieldKey)
            ]);
        } else {
            PageSectionField::create([
                'page_section_id' => $pageSectionId,
                'field_key' => $fieldKey,
                'field_label' => $this->generateFieldLabel($fieldKey),
                'field_type' => $this->detectFieldType($fieldKey),
                'field_value' => $fieldValue ?? ''
            ]);
        }
    }

    private function processArrayField($pageSectionId, $fieldKey, $fieldArray)
    {
        PageSectionField::where('page_section_id', $pageSectionId)
            ->where('field_key', 'like', $fieldKey . '[%')
            ->delete();

        foreach ($fieldArray as $subKey => $values) {
            if (is_array($values)) {
                foreach ($values as $index => $value) {
                    PageSectionField::create([
                        'page_section_id' => $pageSectionId,
                        'field_key' => $fieldKey . '[' . $subKey . '][' . $index . ']',
                        'field_label' => $this->generateFieldLabel($subKey),
                        'field_type' => $this->detectFieldType($subKey),
                        'field_value' => $value ?? ''
                    ]);
                }
            }
        }
    }

    private function generateFieldLabel($fieldKey)
    {
        $cleanKey = preg_replace('/\[.*?\]/', '', $fieldKey);
        return ucwords(str_replace(['_', '-'], ' ', $cleanKey));
    }

    private function detectFieldType($fieldKey)
    {
        $key = strtolower($fieldKey);

        if (str_contains($key, 'image') || str_contains($key, 'img') || str_contains($key, 'photo')) {
            return 'file';
        } elseif (str_contains($key, 'description') || str_contains($key, 'content') || str_contains($key, 'text')) {
            return 'textarea';
        } elseif (str_contains($key, 'email')) {
            return 'email';
        } elseif (str_contains($key, 'url') || str_contains($key, 'link')) {
            return 'url';
        } elseif (str_contains($key, 'phone') || str_contains($key, 'mobile')) {
            return 'tel';
        } else {
            return 'text';
        }
    }
    // end update section fields functions
}
