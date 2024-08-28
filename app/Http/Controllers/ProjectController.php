<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PersonalDetail;
use App\Models\Strength;
use App\Models\Education;
use App\Models\Skill;
use App\Models\Project;
use App\Models\Experience;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;





class ProjectController extends Controller
{
    
    public function fillProject()
    {
        if (Auth::check() && Auth::user()->email_verification_token !== null) {
            // If not verified, redirect to the 'confirm' page
            return redirect('/verify-first')->with('error', 'Please verify your email before accessing this page.');
        }
        $user = Auth::user();
        $projects = $user->projects;
        return view('fill-project', compact('projects'));
    }

    public function saveProject(Request $request)
    {
        $validatedData=$request->validate([
            'project_name' => 'nullable|array',
            'description' => 'nullable|array',
            'github_link' => 'nullable|array',
        ]);

        $user = Auth::user();
        $user->projects()->delete(); // Clear previous projects

        
        foreach ($request->project_name as $key => $value) {
            if (!empty($value) || !empty($request->description[$key]) || !empty($request->github_link[$key])) {
            $user->projects()->create([
                'project_name' => $value ?? '',
                'description' => $request->description[$key] ?? '',
                'github_link' => $request->github_link[$key] ?? '',
            ]);
        }
        }

        return redirect()->route('show-cv');
    }

}


