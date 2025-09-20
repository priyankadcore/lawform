<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Property;
use App\Models\PropertyType;
use App\Models\PropertyStatus;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PropertyController extends Controller
{
    public function index()
    {
        $properties = Property::with(['propertyType', 'propertyStatus', 'city', 'agent'])
            ->latest()
            ->paginate(10);

        return view('admin.properties.index', compact('properties'));
    }

    public function create()
    {
        $types = PropertyType::all();
        $statuses = PropertyStatus::all();
        $countries = Country::all();
        $agents = User::where('is_admin', 1)->get();

        return view('admin.properties.create', compact('types', 'statuses', 'countries', 'agents'));
    }

    public function store(Request $request)
    {
        
        $validated = $this->validateProperty($request);

        // Handle images upload
        if ($request->hasFile('images')) {
            $images = [];
            foreach ($request->file('images') as $image) {
                $images[] = $image->store('properties', 'public');
            }
            $validated['images'] = $images;
        }

        // Handle floor plans upload
        if ($request->hasFile('floor_plans')) {
            $floorPlans = [];
            foreach ($request->file('floor_plans') as $plan) {
                $floorPlans[] = $plan->store('properties/floor-plans', 'public');
            }
            $validated['floor_plans'] = $floorPlans;
        }

        $validated['created_by'] = auth()->id();

        Property::create($validated);

        return redirect()->route('admin.properties.index')
            ->with('success', 'Property created successfully.');
    }

    public function edit(Property $property)
    {
        $types = PropertyType::all();
        $statuses = PropertyStatus::all();
        $countries = Country::all();
        $states = State::where('country_id', $property->country_id)->get();
        $cities = City::where('state_id', $property->state_id)->get();
        $agents = User::where('is_admin', 1)->get();

        return view('admin.properties.edit', compact('property', 'types', 'statuses', 'countries', 'states', 'cities', 'agents'));
    }

    public function update(Request $request, Property $property)
    {
       
        $validated = $this->validateProperty($request, $property->id);

        // Handle images upload
        if ($request->hasFile('images')) {
            // Delete old images
            if ($property->images) {
                foreach ($property->images as $image) {
                    Storage::disk('public')->delete($image);
                }
            }

            $images = [];
            foreach ($request->file('images') as $image) {
                $images[] = $image->store('properties', 'public');
            }
            $validated['images'] = $images;
        }

        // Handle floor plans upload
        if ($request->hasFile('floor_plans')) {
            // Delete old floor plans
            if ($property->floor_plans) {
                foreach ($property->floor_plans as $plan) {
                    Storage::disk('public')->delete($plan);
                }
            }

            $floorPlans = [];
            foreach ($request->file('floor_plans') as $plan) {
                $floorPlans[] = $plan->store('properties/floor-plans', 'public');
            }
            $validated['floor_plans'] = $floorPlans;
        }

        $property->update($validated);

        return redirect()->route('admin.properties.index')
            ->with('success', 'Property updated successfully.');
    }

    public function destroy(Property $property)
    {
        // Delete images
        if ($property->images) {
            foreach ($property->images as $image) {
                Storage::disk('public')->delete($image);
            }
        }

        // Delete floor plans
        if ($property->floor_plans) {
            foreach ($property->floor_plans as $plan) {
                Storage::disk('public')->delete($plan);
            }
        }

        $property->delete();

        return redirect()->route('admin.properties.index')
            ->with('success', 'Property deleted successfully.');
    }

    // In PropertyController.php
    public function getStates(Request $request)
    {
        $states = State::where('country_id', $request->country_id)->get();
        return response()->json($states);
    }

    public function getCities(Request $request)
    {
        $cities = City::where('state_id', $request->state_id)->get();
        return response()->json($cities);
    }

    protected function validateProperty(Request $request, $id = null)
    {
        return $request->validate([
            'title' => 'required|string|max:255|unique:properties,title' . ($id ? ",$id" : ''),
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'address' => 'required|string|max:255',
            'country_id' => 'required|exists:countries,id',
            'state_id' => 'required|exists:states,id',
            'city_id' => 'required|exists:cities,id',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
            'property_type_id' => 'required|exists:property_types,id',
            'property_status_id' => 'required|exists:property_statuses,id',
            'bedrooms' => 'required|integer|min:0',
            'bathrooms' => 'required|integer|min:0',
            'area' => 'required|integer|min:0',
            'year_built' => 'nullable|integer|min:1800|max:' . date('Y'),
            'featured' => 'boolean',
            'garage' => 'boolean',
            'garage_size' => 'nullable|integer|min:0',
            'amenities' => 'nullable|array',
            'images' => 'nullable|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'video_url' => 'nullable|url',
            'floor_plans' => 'nullable|array',
            'floor_plans.*' => 'file|mimes:pdf,jpeg,png,jpg|max:5120',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
            'status' => 'boolean',
            'created_by' => 'required|exists:users,id'
        ]);
    }
}
