<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\State;
use Illuminate\Http\Request;

class StateController extends Controller
{
    public function index()
    {
        $states = State::with('country')->latest()->paginate(10);
        return view('admin.states.index', compact('states'));
    }

    public function create()
    {
        $countries = Country::active()->get();
        return view('admin.states.create', compact('countries'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'country_id' => 'required|exists:countries,id',
            'name' => 'required|string|max:255|unique:states,name,NULL,id,country_id,'.$request->country_id,
            'code' => 'nullable|string|max:5',
            'status' => 'boolean'
        ]);

        State::create($request->all());

        return redirect()->route('admin.states.index')
                        ->with('success', 'State created successfully.');
    }

    public function edit(State $state)
    {
        $countries = Country::active()->get();
        return view('admin.states.edit', compact('state', 'countries'));
    }

    public function update(Request $request, State $state)
    {
        $request->validate([
            'country_id' => 'required|exists:countries,id',
            'name' => 'required|string|max:255|unique:states,name,'.$state->id.',id,country_id,'.$request->country_id,
            'code' => 'nullable|string|max:5',
            'status' => 'boolean'
        ]);

        $state->update($request->all());

        return redirect()->route('admin.states.index')
                        ->with('success', 'State updated successfully');
    }

    public function destroy(State $state)
    {
        $state->delete();

        return redirect()->route('admin.states.index')
                        ->with('success', 'State deleted successfully');
    }
}