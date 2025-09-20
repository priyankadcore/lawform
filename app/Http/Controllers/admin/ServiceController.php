<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::orderBy('sort_order')->paginate(10);
        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        return view('admin.services.create');
    }

    public function store(Request $request)
    {
       

        $validated = $request->validate([
            'title' => 'required|string|max:255|unique:services',
            'description' => 'nullable|string',
            'icon' => 'nullable|string|max:50',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'featured' => 'required|boolean',
            'status' => 'required|boolean',
            'sort_order' => 'nullable|integer'
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('services', 'public');
        }

        Service::create($validated);

        return redirect()->route('admin.services.index')
                        ->with('success', 'Service created successfully.');
    }

    public function edit(Service $service)
    {
        return view('admin.services.edit', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
       

        $validated = $request->validate([
            'title' => 'required|string|max:255|unique:services,title,'.$service->id,
            'description' => 'nullable|string',
            'icon' => 'nullable|string|max:50',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'featured' => 'required|boolean',
            'status' => 'required|boolean',
            'sort_order' => 'nullable|integer'
        ]);

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($service->image) {
                Storage::disk('public')->delete($service->image);
            }
            $validated['image'] = $request->file('image')->store('services', 'public');
        }

        $service->update($validated);

        return redirect()->route('admin.services.index')
                        ->with('success', 'Service updated successfully');
    }

    public function destroy(Service $service)
    {
        // Delete image if exists
        if ($service->image) {
            Storage::disk('public')->delete($service->image);
        }
        
        $service->delete();

        return redirect()->route('admin.services.index')
                        ->with('success', 'Service deleted successfully');
    }
}