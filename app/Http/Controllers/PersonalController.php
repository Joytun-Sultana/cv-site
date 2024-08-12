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





class PersonalController extends Controller
{
    
    public function fillPersonalDetails()
    {
        $user = Auth::user();
        $personalDetails = $user->personalDetail;
        return view('fill-personal-details', compact('personalDetails'));
    }
    
    public function savePersonalDetails(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'github' => 'nullable|url|max:255',
            'linkedin' => 'nullable|url|max:255',
            'address' => 'required|string|max:500',
        ]);

        $user = Auth::user();
        $user->personalDetail()->updateOrCreate(
            ['user_id' => $user->id],
            $request->only([
                'first_name', 'last_name', 'phone', 'email', 'github', 'linkedin', 'address'
            ])
        );

        return redirect()->route('fill-strengths');
    }

}


