<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Navigation;

class NavbarController extends Controller
{
     public function index()
    { 
        $parentNavigations = Navigation::where('parent_id', 0)->get();
        return view('admin.navbar.create',compact('parentNavigations'));
    }

    public function store(Request $request)
{
    try {
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|unique:navigations,slug',
            'parent_id' => 'nullable|exists:navigations,id',
            'order' => 'nullable|integer'
        ]);

        // Check if parent_id is valid
        if ($request->parent_id && !Navigation::find($request->parent_id)) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Selected parent menu does not exist.');
        }

        // Auto-calculate order if not provided
        $order = $request->order;
        if ($order === null || $order === '') {
            $lastOrder = Navigation::where('parent_id', $request->parent_id ?? null)
                ->max('order');
            $order = $lastOrder ? $lastOrder + 1 : 0;
        }

        Navigation::create([
            'title' => $request->title,
            'slug' => $request->slug,
            'parent_id' => $request->parent_id ?: null, // Use null instead of 0
            'order' => $order,
        ]);

        return redirect()->route('admin.navbar.index')
            ->with('success', 'Navigation item created successfully.');

    } catch (\Illuminate\Validation\ValidationException $e) {
        return redirect()->back()
            ->withInput()
            ->withErrors($e->errors())
            ->with('error', 'Please fix the validation errors below.');

    } catch (\Illuminate\Database\QueryException $e) {
        $errorCode = $e->errorInfo[1];
        
        if ($errorCode == 1062) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'This slug already exists. Please choose a different one.');
        }
        
        return redirect()->back()
            ->withInput()
            ->with('error', 'Database error occurred. Please try again.');

    } catch (\Exception $e) {
        return redirect()->back()
            ->withInput()
            ->with('error', 'An unexpected error occurred. Please try again.');
    }
}
}
