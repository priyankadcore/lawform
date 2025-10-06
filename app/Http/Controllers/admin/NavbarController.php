<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Navigation;

class NavbarController extends Controller
{
     public function index()
    { 
        $parentNavigations = Navigation::whereNull('parent_id')->get();
        $Navigations = Navigation::all();
        return view('admin.navbar.create',compact('parentNavigations','Navigations'));
    }

    public function store(Request $request)
    {
        try {
            $data = $request->all();
            
            // Convert empty strings to null for parent_id and order
            $data['parent_id'] = $request->parent_id ?: null;
            $data['order'] = $request->order ?: null;

            $validated = validator($data, [
                'title' => 'required|string|max:255',
                'slug' => 'required|string|unique:navigations,slug|max:255|regex:/^[a-z0-9-]+$/',
                'parent_id' => 'nullable|exists:navigations,id',
                'order' => 'nullable|integer|min:0'
            ])->validate();

            // Auto-calculate order if not provided
            $order = $validated['order'];
            if ($order === null) {
                $lastOrder = Navigation::where('parent_id', $validated['parent_id'] ?? null)
                    ->max('order');
                $order = $lastOrder ? $lastOrder + 1 : 0;
            }

            Navigation::create([
                'title' => $validated['title'],
                'slug' => $validated['slug'],
                'parent_id' => $validated['parent_id'],
                'order' => $order,
            ]);

            return redirect()->route('admin.navbar.index')
                ->with('success', 'Navigation item created successfully.');

        } catch (\Illuminate\Validation\ValidationException $e) {
            $errorMessage = implode('<br>', array_flatten($e->errors()));
            return redirect()->back()
                ->withInput()
                ->with('error', $errorMessage);
                
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Error: ' . $e->getMessage());
        }
    }

    // public function edit($id)
    // {
    //     $navbar = Navigation::findOrFail($id);
    //     $parentNavigations = Navigation::whereNull('parent_id')
    //                                 ->where('id', '!=', $id) // Avoid self-parenting
    //                                 ->get();
        
    //     return view('admin.navbar.edit', compact('navbar', 'parentNavigations'));
    // }

   public function update(Request $request, $id)
    {
        try {
            $navbar = Navigation::findOrFail($id);
            
            $data = $request->all();
            
            // Convert empty strings to null for parent_id and order
            $data['parent_id'] = $request->parent_id ?: null;
            $data['order'] = $request->order ?: null;

            $validated = validator($data, [
                'title' => 'required|string|max:255',
                'slug' => 'required|string|unique:navigations,slug,' . $id . '|max:255|regex:/^[a-z0-9-]+$/',
                'parent_id' => 'nullable|exists:navigations,id',
                'order' => 'nullable|integer|min:0'
            ])->validate();

            // Convert "0" to NULL for parent_id (form se '0' aata hai main menu ke liye)
            $parentId = $validated['parent_id'];
            if ($parentId === '0') {
                $parentId = null;
            }
            
            // Prevent self-parenting
            if ($parentId == $id) {
                return redirect()->back()
                    ->withInput()
                    ->with('error', 'Cannot set itself as parent.');
            }

            // Prevent circular parenting (parent cannot be one of its children)
            if ($parentId) {
                $childIds = $navbar->children()->pluck('id')->toArray();
                if (in_array($parentId, $childIds)) {
                    return redirect()->back()
                        ->withInput()
                        ->with('error', 'Cannot set child menu as parent.');
                }
            }

            $navbar->update([
                'title' => $validated['title'],
                'slug' => $validated['slug'],
                'parent_id' => $parentId,
                'order' => $validated['order'] ?? $navbar->order, // Agar order null hai toh existing use kare
            ]);

            return redirect()->route('admin.navbar.index')
                ->with('success', 'Navigation item updated successfully.');

        } catch (\Illuminate\Validation\ValidationException $e) {
            $errorMessage = implode('<br>', array_flatten($e->errors()));
            return redirect()->back()
                ->withInput()
                ->with('error', $errorMessage);
                
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Error: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $navbar = Navigation::findOrFail($id);
            
            // Check if this menu has children
            if ($navbar->children()->exists()) {
                return redirect()->back()
                    ->with('error', 'Cannot delete menu item. It has sub-menus. Delete sub-menus first.');
            }
            
            $navbar->delete();
            
            return redirect()->route('admin.navbar.index')
                ->with('success', 'Navigation item deleted successfully.');
                
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Error: ' . $e->getMessage());
        }
    }
}
