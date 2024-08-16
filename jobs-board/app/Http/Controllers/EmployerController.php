<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employer;
use Illuminate\Support\Facades\Gate;

class EmployerController extends Controller
{
   
    
    public function create()
    {
        Gate::authorize('create');
        return view('employer.create');
    }

   
    public function store(Request $request)
    {
        $attributes = request()->validate([
            'company_name' => ['required', 'min:3', 'unique:employers,company_name']
        ]);

        auth()->user()->employer()->create([
            ...$attributes
        ]);

        return redirect()->route('jobs.index')
            ->with('success', 'Your Employer account was created!');
    }
   
}
