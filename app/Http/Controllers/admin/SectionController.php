<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\SectionType;
use App\Models\SectionTemplate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SectionController extends Controller
{
     public function section_type()
    {
        $sectionTypes = SectionType::all();
        return view('admin.section_type.index', compact('sectionTypes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:section_types',
            'type' => 'nullable|string|max:255|unique:section_types',
            'status' => 'required|boolean',
        ]);

        SectionType::create($request->all());

        return redirect()->route('admin.section_types.type')
            ->with('success', 'Section type created successfully.');
    }


    public function update(Request $request, SectionType $sectionType)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:section_types,name,' . $sectionType->id,
            'type' => 'nullable|string|max:255|unique:section_types,type,' . $sectionType->id,
            'status' => 'required|boolean',
        ]);

        $sectionType->update($request->all());

        return redirect()->route('admin.section_types.type')
            ->with('success', 'Section type updated successfully.');
    }

    public function destroy(SectionType $sectionType)
    {
        $sectionType->delete();

        return redirect()->route('admin.section_types.type')
            ->with('success', 'Section type deleted successfully.');
            
    }

    // Section Template


   public function index()
    {
        $templates = SectionTemplate::with('sectionType')->get();
        $sectionTypes = SectionType::all();
        return view('admin.section.index', compact('templates','sectionTypes'));
    }

  public function template_save(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'style_variant' => 'nullable|string|max:255',
            'section_type_id' => 'required|exists:section_types,id',
            'fields' => 'required|array', // 👈 ab array validate karo
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $data = [
            'title' => $request->title,
            'style_variant' => $request->style_variant,
            'section_type_id' => $request->section_type_id,
            'fields' => json_encode($request->fields), // 👈 array ko JSON string bna ke save karo
        ];

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('templates', 'public');
        }

        SectionTemplate::create($data);

        return redirect()->route('admin.section_template.index')
            ->with('success', 'Template created successfully.');
    }



    public function edit($id)
    {
        try {
          
            $template = SectionTemplate::findOrFail($id);
            
            return response()->json([
                'id' => $template->id,
                'title' => $template->title,
                'section_type_id' => $template->section_type_id,
                'style_variant' => $template->style_variant,
                'image' => $template->image,
                'fields' => $template->fields, // This should be your JSON string
            ]);

        } catch (\Exception $e) {
            return response()->json(['error' => 'Template not found'], 404);
        }
    }

    public function template_update(Request $request, $id)
    {
        $template = SectionTemplate::findOrFail($id);

        try {
            $request->validate([
                'title' => 'required|string|max:255',
                'style_variant' => 'nullable|string|max:255',
                'section_type_id' => 'required|exists:section_types,id',
                'fields' => 'required|array',
                'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            \Log::error('Validation failed: ' . json_encode($e->errors()));
            return response()->json(['success' => false, 'errors' => $e->errors()], 422);
        }

        try {
            // Process fields (array of objects to JSON)
            $fieldsArray = [];
            foreach ($request->fields as $field) {
                $fieldsArray[] = [
                    'key' => trim($field['key']),
                    'label' => trim($field['label']),
                    'type' => trim($field['type'])
                ];
            }

            $data = [
                'title' => $request->title,
                'style_variant' => $request->style_variant,
                'section_type_id' => $request->section_type_id,
                'fields' => json_encode($fieldsArray),
            ];

            if ($request->hasFile('image')) {
                // Delete old image if exists
                if ($template->image && Storage::disk('public')->exists($template->image)) {
                    Storage::disk('public')->delete($template->image);
                }
                $data['image'] = $request->file('image')->store('templates', 'public');
            }

            $template->update($data);

            return response()->json([
                'success' => true,
                'message' => 'Template updated successfully!'
            ]);

        } catch (\Exception $e) {
            \Log::error('Template update error: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to update template: ' . $e->getMessage()
            ], 500);
        }
    }


    public function template_destroy($id)
    {
        try {
            $template = SectionTemplate::findOrFail($id);

            if ($template->image && Storage::disk('public')->exists($template->image)) {
                Storage::disk('public')->delete($template->image);
            }

            $template->delete();

            return response()->json(['success' => true, 'message' => 'Template deleted successfully!']);

        } catch (\Exception $e) {
            \Log::error('Template delete error: ' . $e->getMessage());
            return response()->json(['success' => false, 'message' => 'Failed to delete template: ' . $e->getMessage()], 500);
        }
    }



}
