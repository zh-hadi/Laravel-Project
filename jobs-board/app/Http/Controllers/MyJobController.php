<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class MyJobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        return view('my-jobs.index', [
            'jobs' => auth()->user()->employer->jobs()
                ->with('jobApplications', 'jobApplications.user')
                ->latest()
                ->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('my-jobs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $attributes = request()->validate([
            'title' => 'required:string|max:255',
            'location' => 'required:string|max:255',
            'salary' => 'required|numeric|min:5000',
            'description' => 'required|string',
            'experience' => 'required|in:'. implode(',', \App\Models\Job::$experience),
            'catagories' => 'required|in:'. implode(',', \App\Models\Job::$catagories),
        ]);

        auth()->user()->employer->jobs()->create($attributes);

        return redirect()->route('my-jobs.index')
            ->with('success', 'Job created successfully');
    }

    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Job $my_job)
    {
        return view('my-jobs.edit', ['job' => $my_job]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Job $my_job)
    {
        $attributes = request()->validate([
            'title' => 'required:string|max:255',
            'location' => 'required:string|max:255',
            'salary' => 'required|numeric|min:5000',
            'description' => 'required|string',
            'experience' => 'required|in:'. implode(',', Job::$experience),
            'catagories' => 'required|in:'. implode(',', Job::$catagories),
        ]);

        $my_job->update($attributes);

        return redirect()->route('my-jobs.index')
            ->with('success', 'Job update successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
