<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TeamMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TeamMemberController extends Controller
{
    public function index()
    {
        $members = TeamMember::latest()->paginate(10);
        return view('admin.team-members.index', compact('members'));
    }

    public function create()
    {
        return view('admin.team-members.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:20',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'bio' => 'nullable|string',
            'position' => 'nullable|string|max:255',
            'company' => 'nullable|string|max:255',
            'rating' => 'required|integer|min:1|max:5',
            'social_links.facebook' => 'nullable|url',
            'social_links.twitter' => 'nullable|url',
            'social_links.linkedin' => 'nullable|url',
            'social_links.instagram' => 'nullable|url',
            'status' => 'required|in:active,inactive'
        ]);

        if ($request->hasFile('photo')) {
            $validated['photo'] = $request->file('photo')->store('team-members', 'public');
        }

        TeamMember::create($validated);

        return redirect()->route('admin.team-members.index')
                        ->with('success', 'Team member created successfully.');
    }

    public function edit(TeamMember $teamMember)
    {
        return view('admin.team-members.edit', compact('teamMember'));
    }

    public function update(Request $request, TeamMember $teamMember)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:20',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'bio' => 'nullable|string',
            'position' => 'nullable|string|max:255',
            'company' => 'nullable|string|max:255',
            'rating' => 'required|integer|min:1|max:5',
            'social_links.facebook' => 'nullable|url',
            'social_links.twitter' => 'nullable|url',
            'social_links.linkedin' => 'nullable|url',
            'social_links.instagram' => 'nullable|url',
            'status' => 'required|in:active,inactive'
        ]);

        if ($request->hasFile('photo')) {
            // Delete old photo if exists
            if ($teamMember->photo) {
                Storage::disk('public')->delete($teamMember->photo);
            }
            $validated['photo'] = $request->file('photo')->store('team-members', 'public');
        }

        $teamMember->update($validated);

        return redirect()->route('admin.team-members.index')
                        ->with('success', 'Team member updated successfully');
    }

    public function destroy(TeamMember $teamMember)
    {
        // Delete photo if exists
        if ($teamMember->photo) {
            Storage::disk('public')->delete($teamMember->photo);
        }
        
        $teamMember->delete();

        return redirect()->route('admin.team-members.index')
                        ->with('success', 'Team member deleted successfully');
    }
}