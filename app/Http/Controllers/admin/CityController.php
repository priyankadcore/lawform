<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Country;
use App\Models\State;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function index()
    {
        $cities = City::with(['country', 'state'])->latest()->paginate(10);
        return view('admin.cities.index', compact('cities'));
    }

    public function create()
    {
        $countries = Country::active()->get();
        $states = State::active()->get();
        return view('admin.cities.create', compact('countries', 'states'));
    }

    public function store(Request $request)
    {


        $validated = $request->validate([
            'country_id' => 'required|exists:countries,id',
            'state_id' => 'required|exists:states,id',
            'name' => 'required|string|max:255|unique:cities,name,NULL,id,state_id,' . $request->state_id,
            'status' => 'required|boolean'
        ]);

        City::create($validated);

        return redirect()->route('admin.cities.index')
            ->with('success', 'City created successfully.');
    }

    public function edit(City $city)
    {
        $countries = Country::active()->get();
        $states = State::where('country_id', $city->country_id)->active()->get();
        return view('admin.cities.edit', compact('city', 'countries', 'states'));
    }


    public function update(Request $request, City $city)
    {
        // Convert checkbox to proper boolean

        $validated = $request->validate([
            'country_id' => 'required|exists:countries,id',
            'state_id' => 'required|exists:states,id',
            'name' => 'required|string|max:255|unique:cities,name,' . $city->id . ',id,state_id,' . $request->state_id,
            'status' => 'required|boolean'
        ]);

        $city->update($validated);

        return redirect()->route('admin.cities.index')
            ->with('success', 'City updated successfully');
    }

    public function destroy(City $city)
    {
        $city->delete();

        return redirect()->route('admin.cities.index')
            ->with('success', 'City deleted successfully');
    }

    public function getStates($countryId)
    {
        $states = State::where('country_id', $countryId)->active()->get();
        return response()->json($states);
    }
}
