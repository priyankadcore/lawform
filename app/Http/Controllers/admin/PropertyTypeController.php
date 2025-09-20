<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PropertyType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class PropertyTypeController extends Controller
{
    public function index()
    {
        $propertyTypes = PropertyType::latest()->paginate(10);
        return view('admin.property_types.index', compact('propertyTypes'));
    }

    public function create()
    {
        return view('admin.property_types.create');
    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:property_types',
            'icon' => 'nullable|string|max:50',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|boolean'
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('property_types', 'public');
        }

        PropertyType::create($validated);

        return redirect()->route('admin.property_types.index')
            ->with('success', 'Property type created successfully.');
    }
    public function edit(PropertyType $propertyType)
    {
        return view('admin.property_types.edit', compact('propertyType'));
    }

    public function update(Request $request, PropertyType $propertyType)
    {

        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:property_types,name,' . $propertyType->id,
            'icon' => 'nullable|string|max:50',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|boolean'
        ]);

        if ($request->has('remove_image')) {
            Storage::disk('public')->delete($propertyType->image);
            $validated['image'] = null;
        }

        if ($request->hasFile('image')) {
            if ($propertyType->image) {
                Storage::disk('public')->delete($propertyType->image);
            }
            $validated['image'] = $request->file('image')->store('property_types', 'public');
        }

        $propertyType->update($validated);

        return redirect()->route('admin.property_types.index')
            ->with('success', 'Property type updated successfully');
    }

    public function destroy(PropertyType $propertyType)
    {
        // Delete image if exists
        if ($propertyType->image) {
            Storage::disk('public')->delete($propertyType->image);
        }

        $propertyType->delete();

        return redirect()->route('admin.property_types.index')
            ->with('success', 'Property type deleted successfully');
    }
}