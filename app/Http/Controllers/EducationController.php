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





class EducationController extends Controller
{
    
    public function fillEducation()
    {
        // $educations = Education::all();
        $user = Auth::user();
        $educations = $user->educations;
        return view('fill-education', compact('educations'));
    }



    public function saveEducation(Request $request)
    {
        $request->validate([
            'institution_name' => 'required|array',
            'field_of_study' => 'required|array',
            'degree' => 'required|array',
            'graduation_date' => 'required|array',
        ]);

        $user = Auth::user();
        $user->educations()->delete(); // Clear previous educations

        foreach ($request->institution_name as $key => $value) {
            $user->educations()->create([
                'institution_name' => $value,
                'field_of_study' => $request->field_of_study[$key],
                'degree' => $request->degree[$key],
                'graduation_date' => $request->graduation_date[$key],
            ]);
        }

        return redirect()->route('fill-experience');
    }


}


