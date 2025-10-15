<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FooterSetting;
use Illuminate\Support\Facades\DB;

class FooterController extends Controller
{
   public function index()
    {
        $footer = FooterSetting::first();
        return view('admin.footer.index', compact('footer'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'about_us' => 'nullable|string|max:1000',
            'facebook' => 'nullable|url',
            'instagram' => 'nullable|url', 
            'linkedin' => 'nullable|url',
            'twitter' => 'nullable|url',
            'address' => 'nullable|string|max:500',
            'phone' => 'nullable|string|max:20',
            'email' => 'nullable|email',
            'timing' => 'nullable|string|max:100'
        ]);

        try {
            DB::beginTransaction();

            $footer = FooterSetting::first();
            
            if (!$footer) {
                $footer = new FooterSetting();
            }

            $footer->updateOrCreate(
                ['id' => $footer->id ?? null],
                $request->only([
                    'about_us', 'facebook', 'instagram', 'linkedin', 
                    'twitter', 'address', 'phone', 'email', 'timing'
                ])
            );

            DB::commit();

            return redirect()->route('admin.footer.index')
                ->with('success', 'Footer settings updated successfully!');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()
                ->with('error', 'Error updating footer settings: ' . $e->getMessage());
        }
    }
}
