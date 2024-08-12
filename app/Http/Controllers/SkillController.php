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





class SkillController extends Controller
{
    
    public function fillSkills()
    {
        $user = Auth::user();
        $skills = $user->skills;
        return view('fill-skills', compact('skills'));
    }

    public function saveSkills(Request $request)
    {
        $request->validate([
            'skills' => 'required|array',
            'skills.*' => 'required|string|max:255',
        ]);

        $user = Auth::user();
        $user->skills()->delete(); // Clear previous skills

        foreach ($request->skills as $skill) {
            $user->skills()->create(['skill' => $skill]);
        }

        return redirect()->route('fill-education');
    }

}


