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





class ExperienceController extends Controller
{
    
    public function fillExperience()
    {
         $user = Auth::user();
         $experiences = $user->experiences;
         return view('fill-experience', compact('experiences'));
    }

    public function saveExperience(Request $request)
    {
        $request->validate([
            'company_name' => 'required|array',
            'position' => 'required|array',
            'years_of_service' => 'required|array',
        ]);

        $user = Auth::user();
        $user->experiences()->delete(); // Clear previous experiences

        foreach ($request->company_name as $key => $value) {
            $user->experiences()->create([
                'company_name' => $value,
                'position' => $request->position[$key],
                'years_of_service' => $request->years_of_service[$key],
            ]);
        }

        return redirect()->route('fill-project');
    }

}


