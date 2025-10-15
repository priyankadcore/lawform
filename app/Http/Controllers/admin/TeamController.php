<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Team;

class TeamController extends Controller
{
    public function index()
    {
        $teams = Team::latest()->get();
        return view('admin.team.index',compact('teams'));
    }

    // Store method
        public function store(Request $request)
        {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'role' => 'required|string|max:255',
                'team_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
            
            ]);

            if ($request->hasFile('team_image')) {
                $validated['team_image'] = $request->file('team_image')->store('team-images', 'public');
            }

            Team::create($validated);

            return redirect()->route('admin.team.index')->with('success', 'Team member added successfully!');
        }

        // Update method
        public function update(Request $request, Team $team)
        {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'role' => 'required|string|max:255',
                'team_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            if ($request->hasFile('team_image')) {
                // Delete old image if exists
                if ($team->team_image) {
                    Storage::disk('public')->delete($team->team_image);
                }
                $validated['team_image'] = $request->file('team_image')->store('team-images', 'public');
            }

            $team->update($validated);

            return redirect()->route('admin.team.index')->with('success', 'Team member updated successfully!');
        }

        // Destroy method
        public function destroy(Team $team)
        {
            if ($team->team_image) {
                Storage::disk('public')->delete($team->team_image);
            }
            
            $team->delete();

            return redirect()->route('admin.team.index')->with('success', 'Team member deleted successfully!');
        }
}
