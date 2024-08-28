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





class StrengthController extends Controller
{
    
    public function fillStrengths()
    {
        if (Auth::check() && Auth::user()->email_verification_token !== null) {
            // If not verified, redirect to the 'confirm' page
            return redirect('/verify-first')->with('error', 'Please verify your email before accessing this page.');
        }
        $user = Auth::user();
        $strengths = $user->strengths;
        return view('fill-strength', compact('strengths'));
    }

    public function saveStrengths(Request $request)
    {
        $request->validate([
            'strengths' => 'nullable|array',
            'strengths.*' => 'nullable|string|max:255',
        ]);

        $user = Auth::user();
        $user->strengths()->delete(); // Clear previous strengths

        foreach ($request->strengths as $strength) {
            if (!empty($strength)) {
            $user->strengths()->create(['strength' => $strength]);
            }
        }

        return redirect()->route('fill-skills');
    }

}


