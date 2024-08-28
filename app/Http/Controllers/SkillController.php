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
        if (Auth::check() && Auth::user()->email_verification_token !== null) {
            // If not verified, redirect to the 'confirm' page
            return redirect('/verify-first')->with('error', 'Please verify your email before accessing this page.');
        }
        $user = Auth::user();
        $skills = $user->skills;
        return view('fill-skills', compact('skills'));
    }

    public function saveSkills(Request $request)
    {
        $request->validate([
            'skills' => 'nullable|array',
            'skills.*' => 'nullable|string|max:255',
        ]);

        $user = Auth::user();
        $user->skills()->delete(); // Clear previous skills

        foreach ($request->skills as $skill) {
            if (!empty($skill)) {
            $user->skills()->create(['skill' => $skill]);
            }
        }

        return redirect()->route('fill-education');
    }

}


