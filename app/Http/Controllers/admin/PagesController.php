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
    //     $result = PageSectionFields::where('page_section_id',pageSectionId)->get();
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

    

//    public function updateSectionFields(Request $request)
//     {
//         $pageSectionId = $request->input('page_section_id');
    
//         $fieldKeys = $request->input('field_key', []);
//         $fieldLabels = $request->input('field_label', []);
//         $fieldTypes = $request->input('field_type', []);
//         $fieldValues = $request->input('field_value', []);

//         if (!$pageSectionId ) {
//             return response()->json([
//                 'success' => false,
//                 'message' => 'Invalid page section ID.'
//             ]);
//         }

//         try {

//             $savedFields = [];
//             foreach ($fieldKeys as $index => $fieldKey) {
//                 $fieldLabel = $fieldLabels[$index] ?? '';
//                 $fieldType = $fieldTypes[$index] ?? '';
//                 $fieldValue = $fieldValues[$index] ?? '';
                
//                 // Handle file upload
//                 if ($fieldType === 'file' && $request->hasFile("field_value.$index")) {
//                     $file = $request->file("field_value.$index");
//                     $fileName = time() . '_' . $fieldKey . '_' . $file->getClientOriginalName();
//                     $filePath = $file->storeAs('public/section_images', $fileName);
//                     $fieldValue = 'section_images/' . $fileName; // Store relative path
//                 }
                
//                 $existingField = PageSectionFields::where('page_section_id', $pageSectionId)
//                     ->where('field_key', $fieldKey)
//                     ->first();

//                 if ($existingField) {
//                     // Update existing field
//                     $existingField->update([
//                         'field_label' => $fieldLabel,
//                         'field_type' => $fieldType,
//                         'field_value' => $fieldValue
//                     ]);
//                     $savedFields[] = $existingField;
//                 } else {
//                     // Create new field
//                     $pageSectionField = PageSectionFields::create([
//                         'page_section_id' => $pageSectionId,
//                         'field_key' => $fieldKey,
//                         'field_label' => $fieldLabel,
//                         'field_type' => $fieldType,
//                         'field_value' => $fieldValue
//                     ]);
//                     $savedFields[] = $pageSectionField;
//                 }
//             }

//             return response()->json([
//                 'success' => true,
//                 'message' => 'Section fields updated successfully!',
//                 'saved_fields' => count($savedFields)
//             ]);

//         } catch (\Exception $e) {
//             return response()->json([
//                 'success' => false,
//                 'message' => 'Error updating section fields: ' . $e->getMessage()
//             ]);
//         }
//     }

public function getSectionFields($pageSectionId)
    {
        try {
            $fields = PageSectionFields::where('page_section_id', $pageSectionId)
                ->get()
                ->map(function($field) {
                    return [
                        'field_key' => $field->field_key,
                        'field_label' => $field->field_label,
                        'field_type' => $field->field_type,
                        'field_value' => $field->field_value
                    ];
                });

            return response()->json($fields);

        } catch (\Exception $e) {
            return response()->json([], 500);
        }
    }

    public function updateSectionFields(Request $request)
    {
        $pageSectionId = $request->input('page_section_id');

        $fieldKeys = $request->input('field_key', []);
        $fieldLabels = $request->input('field_label', []);
        $fieldTypes = $request->input('field_type', []);
        $fieldValues = $request->input('field_value', []);

        // List fields data
        $listItemIndexes = $request->input('list_item_index', []);
        $listFieldKeys = $request->input('list_field_key', []);
        $listFieldLabels = $request->input('list_field_label', []);
        $listFieldTypes = $request->input('list_field_type', []);
        $listFieldValues = $request->input('list_field_value', []);

        if (!$pageSectionId) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid page section ID.'
            ]);
        }

        try {
            $savedFields = [];
            
            // Process each field
            foreach ($fieldKeys as $index => $fieldKey) {
                $fieldLabel = $fieldLabels[$index] ?? '';
                $fieldType = $fieldTypes[$index] ?? '';
                $fieldValue = $fieldValues[$index] ?? '';
                
                // Check if field already exists
                $existingField = PageSectionFields::where('page_section_id', $pageSectionId)
                    ->where('field_key', $fieldKey)
                    ->first();

                // Handle different field types
                if ($fieldType === 'file' && $request->hasFile("field_value.$index")) {
                    // File upload handling - new file selected
                    $file = $request->file("field_value.$index");
                    
                    // Generate unique filename
                    $fileName = time() . '_' . uniqid() . '_' . $file->getClientOriginalName();
                    
                    // Store in public disk
                    $filePath = $file->storeAs('section_images', $fileName, 'public');
                    
                    // Save only the relative path for database
                    $fieldValue = 'section_images/' . $fileName;
                    
                    // Debug log
                    \Log::info("File uploaded: ", [
                        'original_name' => $file->getClientOriginalName(),
                        'stored_path' => $filePath,
                        'field_value' => $fieldValue
                    ]);
                    
                } elseif ($fieldType === 'file' && $existingField) {
                    // If it's a file field and no new file was uploaded, keep the existing value
                    $fieldValue = $existingField->field_value;
                    
                } elseif ($fieldType === 'list') {
                    // Handle list type field - store as JSON
                    $listData = $this->processListFieldData(
                        $index, 
                        $listItemIndexes, 
                        $listFieldKeys, 
                        $listFieldLabels, 
                        $listFieldTypes, 
                        $listFieldValues,
                        $request // Add request parameter for file handling
                    );
                    
                    $fieldValue = json_encode($listData, JSON_PRETTY_PRINT);
                }
                
                if ($existingField) {
                    // Update existing field
                    $existingField->update([
                        'field_label' => $fieldLabel,
                        'field_type' => $fieldType,
                        'field_value' => $fieldValue
                    ]);
                    $savedFields[] = $existingField;
                } else {
                    // Create new field
                    $pageSectionField = PageSectionFields::create([
                        'page_section_id' => $pageSectionId,
                        'field_key' => $fieldKey,
                        'field_label' => $fieldLabel,
                        'field_type' => $fieldType,
                        'field_value' => $fieldValue
                    ]);
                    $savedFields[] = $pageSectionField;
                }
            }

            return response()->json([
                'success' => true,
                'message' => 'Section fields updated successfully!',
                'saved_fields' => count($savedFields)
            ]);

        } catch (\Exception $e) {
            \Log::error('Error updating section fields: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Error updating section fields: ' . $e->getMessage()
            ]);
        }
    }

    private function processListFieldData($fieldIndex, $listItemIndexes, $listFieldKeys, $listFieldLabels, $listFieldTypes, $listFieldValues, $request = null)
    {
        $listData = [];
        
        // Check if we have data for this field index
        if (!isset($listItemIndexes[$fieldIndex]) || !isset($listFieldValues[$fieldIndex])) {
            return $listData;
        }
        
        $itemIndexes = $listItemIndexes[$fieldIndex];
        
        foreach ($itemIndexes as $itemIndex) {
            $itemData = [];
            
            // Get all sub-fields for this item
            if (isset($listFieldKeys[$fieldIndex][$itemIndex])) {
                $subFieldKeys = $listFieldKeys[$fieldIndex][$itemIndex];
                $subFieldLabels = $listFieldLabels[$fieldIndex][$itemIndex] ?? [];
                $subFieldTypes = $listFieldTypes[$fieldIndex][$itemIndex] ?? [];
                $subFieldValues = $listFieldValues[$fieldIndex][$itemIndex] ?? [];
                
                // Process each sub-field in this item
                foreach ($subFieldKeys as $subIndex => $subFieldKey) {
                    $subFieldLabel = $subFieldLabels[$subIndex] ?? '';
                    $subFieldType = $subFieldTypes[$subIndex] ?? '';
                    $subFieldValue = $subFieldValues[$subIndex] ?? '';
                    
                    // Handle file uploads in list fields
                    if ($subFieldType === 'file' && $request && $request->hasFile("list_field_value.$fieldIndex.$itemIndex.$subIndex")) {
                        $file = $request->file("list_field_value.$fieldIndex.$itemIndex.$subIndex");
                        
                        // Generate unique filename
                        $fileName = time() . '_' . uniqid() . '_' . $file->getClientOriginalName();
                        
                        // Store in public disk
                        $filePath = $file->storeAs('section_images', $fileName, 'public');
                        
                        // Save only the relative path for database
                        $subFieldValue = 'section_images/' . $fileName;
                        
                        \Log::info("List field file uploaded: ", [
                            'field_index' => $fieldIndex,
                            'item_index' => $itemIndex,
                            'sub_index' => $subIndex,
                            'stored_path' => $filePath
                        ]);
                    }
                    
                    $itemData[$subFieldKey] = [
                        'value' => $subFieldValue,
                        'label' => $subFieldLabel,
                        'type' => $subFieldType
                    ];
                }
            }
            
            if (!empty($itemData)) {
                $listData[] = $itemData;
            }
        }
        
        return $listData;
    }
}
