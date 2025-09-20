<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function index()
    {
        $countries = Country::latest()->paginate(10);
        return view('admin.countries.index', compact('countries'));
    }

    public function create()
    {
        return view('admin.countries.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:countries',
            'code' => 'nullable|string|size:2|unique:countries',
            'phone_code' => 'nullable|string|max:10',
            'currency' => 'nullable|string|max:10',
            'currency_symbol' => 'nullable|string|max:10',
            'status' => 'boolean'
        ]);

        Country::create($request->all());

        return redirect()->route('admin.countries.index')
            ->with('success', 'Country created successfully.');
    }

    public function show(Country $country)
    {
        return view('admin.countries.show', compact('country'));
    }

    public function edit(Country $country)
    {
        return view('admin.countries.edit', compact('country'));
    }

    public function update(Request $request, Country $country)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:countries,name,' . $country->id,
            'code' => 'nullable|string|size:2|unique:countries,code,' . $country->id,
            'phone_code' => 'nullable|string|max:10',
            'currency' => 'nullable|string|max:10',
            'currency_symbol' => 'nullable|string|max:10',
            'status' => 'boolean'
        ]);

        $country->update($request->all());

        return redirect()->route('admin.countries.index')
            ->with('success', 'Country updated successfully');
    }

    public function destroy(Country $country)
    {
        $country->delete();

        return redirect()->route('admin.countries.index')
            ->with('success', 'Country deleted successfully');
    }
}