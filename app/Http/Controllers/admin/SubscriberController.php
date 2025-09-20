<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SubscriberController extends Controller
{
    public function index()
    {
        $subscribers = Subscriber::latest()->paginate(20);
        return view('admin.subscribers.index', compact('subscribers'));
    }

    public function create()
    {
        return view('admin.subscribers.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:subscribers',
            'name' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:20',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        Subscriber::create([
            'email' => $request->email,
            'name' => $request->name,
            'phone' => $request->phone,
            'status' => 'active'
        ]);

        return redirect()->route('admin.subscribers.index')
            ->with('success', 'Subscriber added successfully.');
    }

    public function show(Subscriber $subscriber)
    {
        return view('admin.subscribers.show', compact('subscriber'));
    }

    public function edit(Subscriber $subscriber)
    {
        return view('admin.subscribers.edit', compact('subscriber'));
    }

    public function update(Request $request, Subscriber $subscriber)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:subscribers,email,' . $subscriber->id,
            'name' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:20',
            'status' => 'required|in:active,unsubscribed,bounced'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $subscriber->update($request->only(['email', 'name', 'phone', 'status']));

        return redirect()->route('admin.subscribers.index')
            ->with('success', 'Subscriber updated successfully.');
    }

    public function destroy(Subscriber $subscriber)
    {
        $subscriber->delete();

        return redirect()->route('admin.subscribers.index')
            ->with('success', 'Subscriber deleted successfully.');
    }

    public function verify(Subscriber $subscriber)
    {
        $subscriber->verify();
        return back()->with('success', 'Subscriber marked as verified.');
    }

    public function unsubscribe(Subscriber $subscriber)
    {
        $subscriber->unsubscribe();
        return back()->with('success', 'Subscriber has been unsubscribed.');
    }

    public function export()
    {
        $fileName = 'subscribers_' . date('Y-m-d') . '.csv';
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="' . $fileName . '"',
        ];

        $callback = function () {
            $handle = fopen('php://output', 'w');

            // Add CSV headers
            fputcsv($handle, ['Email', 'Name', 'Phone', 'Status', 'Subscribed At', 'Verified']);

            // Add data rows
            Subscriber::chunk(200, function ($subscribers) use ($handle) {
                foreach ($subscribers as $subscriber) {
                    fputcsv($handle, [
                        $subscriber->email,
                        $subscriber->name ?? '',
                        $subscriber->phone ?? '',
                        $subscriber->status,
                        $subscriber->created_at->format('Y-m-d H:i:s'),
                        $subscriber->email_verified_at ? 'Yes' : 'No'
                    ]);
                }
            });

            fclose($handle);
        };

        return response()->stream($callback, 200, $headers);
    }
}