<?php

namespace App\Http\Controllers;

use App\Models\JobApplication;
use Illuminate\Http\Request;

class MyJobApplicationContorller extends Controller
{
    
    public function index()
    {
        return view('my-job-application.index', [
            'applications' => auth()->user()->jobApplication()
                ->with([
                    'job' => fn($query) => $query->withCount('jobApplications')
                        ->withAvg('jobApplications', 'expected_salary'),
                    'job.employer'
                    ])
                ->latest()->get()
        ]);
    } 

    
    public function destroy(JobApplication $my_job_application)
    {
        $my_job_application->delete();

        return redirect()->route('my-job-application.index')
            ->with('success', 'Job application removed');
    }
}
