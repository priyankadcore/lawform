<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PropertyStatus;
use Illuminate\Http\Request;

class PropertyStatusController extends Controller
{
    public function index()
    {
        $statuses = PropertyStatus::orderBy('sort_order')->paginate(10);
        return view('admin.property_statuses.index', compact('statuses'));
    }

    public function create()
    {
        return view('admin.property_statuses.create');
    }

    public function store(Request $request)
    {
       

        $request->validate([
            'name' => 'required|string|max:255|unique:property_statuses',
            'color' => 'required|string|max:20',
            'sort_order' => 'nullable|integer',
            'status' => 'required|boolean'
        ]);

        PropertyStatus::create($request->all());

        return redirect()->route('admin.property_statuses.index')
                        ->with('success', 'Property status created successfully.');
    }

    public function edit(PropertyStatus $propertyStatus)
    {
        return view('admin.property_statuses.edit', compact('propertyStatus'));
    }

    public function update(Request $request, PropertyStatus $propertyStatus)
    {
       
        $request->validate([
            'name' => 'required|string|max:255|unique:property_statuses,name,'.$propertyStatus->id,
            'color' => 'required|string|max:20',
            'sort_order' => 'nullable|integer',
            'status' => 'required|boolean'
        ]);

        $propertyStatus->update($request->all());

        return redirect()->route('admin.property_statuses.index')
                        ->with('success', 'Property status updated successfully');
    }

    public function destroy(PropertyStatus $propertyStatus)
    {
        $propertyStatus->delete();

        return redirect()->route('admin.property_statuses.index')
                        ->with('success', 'Property status deleted successfully');
    }
}