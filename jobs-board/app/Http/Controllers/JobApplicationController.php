<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class JobApplicationController extends Controller
{
    
    public function create(Job $job)
    {
        Gate::authorize('apply', $job);
        return view('job_application.create',
            ['job' => $job]
        );
    }

    public function store(Job $job)
    {
        $attributes = request()->validate([
            'expected_salary' => 'required:min:1|max:100000',
            'cv' => 'required|file|mimes:pdf|max:2048'
        ]);

        $file = request()->file('cv');
        $path = $file->store('cvs', 'private');

        
        $attributes['cv_path'] = $path;

        //dd($attributes);


        $job->jobApplications()->create([
            ...$attributes,
            'user_id' => request()->user()->id
        ]);

        return redirect()->route('jobs.show', $job)
            ->with('success', 'Job application submitted.');
    }

    
}
