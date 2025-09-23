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
            'slug' => 'nullable|string|max:255|unique:section_types',
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
            'slug' => 'nullable|string|max:255|unique:section_types,slug,' . $sectionType->id,
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
            'name' => 'required|string|max:255',
            'section_type_id' => 'required|exists:section_types,id',
            'style_variant' => 'required|string|max:255',
            'description' => 'nullable|string',
            'icon' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'config_properties' => 'nullable|integer|min:0',
            'status' => 'nullable|boolean',
        ]);

        try {
            $imagePath = null;
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('templates', 'public'); 
            }

            SectionTemplate::create([
                'name' => $request->name,
                'section_type_id' => $request->section_type_id,
                'style_variant' => $request->style_variant,
                'description' => $request->description,
                'icon' => $request->icon,
                'image' => $imagePath,
                'config_properties' => $request->config_properties ?? 1,
                'status' => $request->has('status') ? 1 : 0,
            ]);

            return redirect()->route('admin.section_template.index')
                ->with('success', 'Template added successfully!');

        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Failed to save template: ' . $e->getMessage());
        }
    }

     public function template_update(Request $request, $id)
    {
        $template = SectionTemplate::findOrFail($id);

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'section_type_id' => 'required|exists:section_types,id',
            'style_variant' => 'required|string|max:255',
            'description' => 'nullable|string',
            'icon' => 'nullable|string|max:255',
            'config_properties' => 'nullable|integer|min:0',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('templates', 'public');
        }

        $data['status'] = $request->has('status') ? 1 : 0;

        $template->update($data);

        return redirect()->back()->with('success', 'Template updated successfully!');
    }
    public function template_destroy($id)
    {
        $template = SectionTemplate::findOrFail($id);

        if ($template->image && \Storage::disk('public')->exists($template->image)) {
            \Storage::disk('public')->delete($template->image);
        }

        $template->delete();

        return response()->json(['success' => true]);
    }



}
