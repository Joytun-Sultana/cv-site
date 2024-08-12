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
        $user = Auth::user();
        $strengths = $user->strengths;
        return view('fill-strength', compact('strengths'));
    }

    public function saveStrengths(Request $request)
    {
        $request->validate([
            'strengths' => 'required|array',
            'strengths.*' => 'required|string|max:255',
        ]);

        $user = Auth::user();
        $user->strengths()->delete(); // Clear previous strengths

        foreach ($request->strengths as $strength) {
            $user->strengths()->create(['strength' => $strength]);
        }

        return redirect()->route('fill-skills');
    }

}


