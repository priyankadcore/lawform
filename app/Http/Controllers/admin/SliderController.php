<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::latest()->paginate(10);
        return view('admin.sliders.index', compact('sliders'));
    }

    public function create()
    {
        return view('admin.sliders.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'button_text' => 'nullable|string|max:50',
            'button_link' => 'nullable|url|max:255',
            'status' => 'boolean'
        ]);

        $imagePath = $request->file('image')->store('sliders', 'public');

        Slider::create([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'description' => $request->description,
            'image' => $imagePath,
            'button_text' => $request->button_text,
            'button_link' => $request->button_link,
            'status' => $request->status ?? false
        ]);

        return redirect()->route('admin.sliders.index')
                        ->with('success', 'Slider created successfully.');
    }

    public function edit(Slider $slider)
    {
        return view('admin.sliders.edit', compact('slider'));
    }

    public function update(Request $request, Slider $slider)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'button_text' => 'nullable|string|max:50',
            'button_link' => 'nullable|url|max:255',
            'status' => 'boolean'
        ]);

        $data = $request->except('image');

        if ($request->hasFile('image')) {
            // Delete old image
            Storage::disk('public')->delete($slider->image);
            // Store new image
            $data['image'] = $request->file('image')->store('sliders', 'public');
        }

        $slider->update($data);

        return redirect()->route('admin.sliders.index')
                        ->with('success', 'Slider updated successfully.');
    }

    public function destroy(Slider $slider)
    {
        // Delete image
        Storage::disk('public')->delete($slider->image);
        
        $slider->delete();

        return redirect()->route('admin.sliders.index')
                        ->with('success', 'Slider deleted successfully.');
    }

    public function updateStatus(Request $request, Slider $slider)
    {
        $slider->update(['status' => $request->status]);
        return response()->json(['success' => 'Status updated successfully.']);
    }
}