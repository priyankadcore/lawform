<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CareerJob;

class CareerJobController extends Controller
{
    public function index()
    {
        $jobs = CareerJob::all();
        return view('admin.jobs.index',compact('jobs'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'company_name' => 'required|string|max:255',
            'job_type' => 'required|string|in:full-time,part-time,contract,freelance',
            'location' => 'required|string|max:255',
            'contact_email' => 'required|email',
            'salary_min' => 'nullable|numeric|min:0',
            'salary_max' => 'nullable|numeric|min:0',
            'experience_level' => 'required|string|max:255',
            'description' => 'required|string',
            'requirements' => 'required|string',
        ]);

        try {
            CareerJob::create([
                'title' => $request->title,
                'company_name' => $request->company_name,
                'job_type' => $request->job_type,
                'location' => $request->location,
                'contact_email' => $request->contact_email,
                'salary_min' => $request->salary_min,
                'salary_max' => $request->salary_max,
                'experience_level' => $request->experience_level,
                'description' => $request->description,
                'requirements' => $request->requirements
            ]);

            return redirect()->route('admin.job.index')
                ->with('success', 'Job created successfully!');

        } catch (\Exception $e) {
             return redirect()->route('admin.job.index')
                ->with('error', 'Error creating job: ' . $e->getMessage());

        }
    }

    public function edit($id)
    {
        $job = CareerJob::findOrFail($id);
        return response()->json($job);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'company_name' => 'required|string|max:255',
            'job_type' => 'required|string|in:full-time,part-time,contract,freelance',
            'location' => 'required|string|max:255',
            'contact_email' => 'required|email',
            'salary_min' => 'nullable|numeric|min:0',
            'salary_max' => 'nullable|numeric|min:0',
            'experience_level' => 'required|string|max:255',
            'description' => 'required|string',
            'requirements' => 'required|string',
        ]);

        try {
            $job = CareerJob::findOrFail($id);
            
            $job->update([
                'title' => $request->title,
                'company_name' => $request->company_name,
                'job_type' => $request->job_type,
                'location' => $request->location,
                'contact_email' => $request->contact_email,
                'salary_min' => $request->salary_min,
                'salary_max' => $request->salary_max,
                'experience_level' => $request->experience_level,
                'description' => $request->description,
                'requirements' => $request->requirements
            ]);

            return redirect()->route('admin.job.index')
                ->with('success', 'Job updated successfully!');

        } catch (\Exception $e) {
            return redirect()->route('admin.job.index')
                ->with('error', 'Error updating job: ' . $e->getMessage());
        }
    }

     public function destroy($id)
    {
        $job = CareerJob::findOrFail($id);
         $job->delete();

        return redirect()->route('admin.job.index')
                        ->with('success', 'Job deleted successfully.');
    }
    
}
