<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    /**
     * Display a listing of the settings.
     */
    public function index()
    {
        $settings = Setting::latest()->paginate(10);
        return view('admin.settings.index', compact('settings'));
    }

    /**
     * Show the form for creating a new setting.
     */
    public function create()
    {
        return view('admin.settings.create');
    }

    /**
     * Store a newly created setting in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'site_name' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'favicon' => 'nullable|image|mimes:ico,png|max:1024',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string',
            'facebook' => 'nullable|url|max:255',
            'twitter' => 'nullable|url|max:255',
            'instagram' => 'nullable|url|max:255',
            'linkedin' => 'nullable|url|max:255',
            'about_us' => 'nullable|string',
            'terms_conditions' => 'nullable|string',
            'privacy_policy' => 'nullable|string',
        ]);

        // Handle file uploads
        if ($request->hasFile('logo')) {
            $validated['logo'] = $request->file('logo')->store('settings', 'public');
        }

        if ($request->hasFile('favicon')) {
            $validated['favicon'] = $request->file('favicon')->store('settings', 'public');
        }

        Setting::create($validated);

        return redirect()->route('admin.settings.index')
            ->with('success', 'Setting created successfully');
    }

    /**
     * Show the form for editing the specified setting.
     */
    public function edit(Setting $setting)
    {
        return view('admin.settings.edit', compact('setting'));
    }

    /**
     * Update the specified setting in storage.
     */
    public function update(Request $request, Setting $setting)
    {
        $validated = $request->validate([
            'site_name' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'favicon' => 'nullable|image|mimes:ico,png|max:1024',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string',
            'facebook' => 'nullable|url|max:255',
            'twitter' => 'nullable|url|max:255',
            'instagram' => 'nullable|url|max:255',
            'linkedin' => 'nullable|url|max:255',
            'about_us' => 'nullable|string',
            'terms_conditions' => 'nullable|string',
            'privacy_policy' => 'nullable|string',
        ]);

        // Handle logo upload/removal
        if ($request->hasFile('logo')) {
            // Delete old logo if exists
            if ($setting->logo) {
                Storage::delete($setting->logo);
            }
            $validated['logo'] = $request->file('logo')->store('settings', 'public');
        } elseif ($request->has('remove_logo')) {
            if ($setting->logo) {
                Storage::delete($setting->logo);
                $validated['logo'] = null;
            }
        }

        // Handle favicon upload/removal
        if ($request->hasFile('favicon')) {
            // Delete old favicon if exists
            if ($setting->favicon) {
                Storage::delete($setting->favicon);
            }
            $validated['favicon'] = $request->file('favicon')->store('settings', 'public');
        } elseif ($request->has('remove_favicon')) {
            if ($setting->favicon) {
                Storage::delete($setting->favicon);
                $validated['favicon'] = null;
            }
        }

        $setting->update($validated);

        return redirect()->route('admin.settings.index')
            ->with('success', 'Setting updated successfully');
    }

    /**
     * Remove the specified setting from storage.
     */
    public function destroy(Setting $setting)
    {
        // Delete associated files
        if ($setting->logo) {
            Storage::disk('public')->delete($setting->logo);
        }

        if ($setting->favicon) {
            Storage::disk('public')->delete($setting->favicon);
        }

        $setting->delete();

        return redirect()->route('admin.settings.index')
            ->with('success', 'Setting deleted successfully');
    }
}