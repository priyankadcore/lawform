<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PagesController extends Controller
{
    public function index()
    {
        $pages = Page::all();
        return view('admin.pages.index', compact('pages'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'   => 'required|string|max:255|unique:pages,name',
            'slug'   => 'required|string|max:255|unique:pages,slug',
            'status' => 'required|string',
        ]);

        Page::create([
            'name'   => $request->name,
            'slug'   => $request->slug,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.pages.index')
            ->with('success',  'Page added successfully.');
    }
}
