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
        $user = Auth::user();
        $projects = $user->projects;
        return view('fill-project', compact('projects'));
    }

    public function saveProject(Request $request)
    {
        $request->validate([
            'project_name' => 'required|array',
            'description' => 'required|array',
            'github_link' => 'required|array',
        ]);

        $user = Auth::user();
        $user->projects()->delete(); // Clear previous projects


        
        foreach ($request->project_name as $key => $value) {
            $user->projects()->create([
                'project_name' => $value,
                'description' => $request->description[$key],
                'github_link' => $request->github_link[$key],
            ]);
        }

        return redirect()->route('show-cv');
    }

}


