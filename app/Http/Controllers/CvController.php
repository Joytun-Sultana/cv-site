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
use App\Models\Cv;

ini_set('max_execution_time', 300); // 300 seconds = 5 minutes



class CvController extends Controller
{
    public function create()
    {
        return view('create-cv');
    }
    public function show($id)
    {
        $cv = Cv::findOrFail($id);
        return view('cvs.show', compact('cv'));
    }
    public function store(Request $request)
    {
        $cv = new Cv();
        $cv->user_id = auth()->user()->id;
        $cv->title = $request->input('title'); // Assuming you have a title field
        $cv->content = $request->input('content'); // Assuming you have content field or similar
        $cv->save();

        return redirect()->route('profile')->with('success', 'CV created successfully.');
    }
    // }
    public function showCvWithImage()
    {
        if (Auth::check() && Auth::user()->email_verification_token !== null) {
            // If not verified, redirect to the 'confirm' page
            return redirect('/verify-first')->with('error', 'Please verify your email before accessing this page.');
        }
        
        $user = Auth::user();
    
        $personalDetails = $user->personalDetail;
        $strengths = $user->strengths;
        $educations = $user->educations;
        $skills = $user->skills;
        $projects = $user->projects;
        $experiences = $user->experiences;
    
        // Retrieve the image from the personal details
        $image = $personalDetails ? $personalDetails->image : null;
    
        $data = [
            'personalDetails' => $personalDetails,
            'strengths' => $strengths,
            'educations' => $educations,
            'skills' => $skills,
            'projects' => $projects,
            'experiences' => $experiences,
            'image' => $image,  // Add the image field to the data array
        ];

        return view('cv-view', $data);
    }
    
    public function imgDownloadCvPdf()
    {
        $user = Auth::user();

        $personalDetails = $user->personalDetail;
        $strengths = $user->strengths;
        $educations = $user->educations;
        $skills = $user->skills;
        $projects = $user->projects;
        $experiences = $user->experiences;

        // Retrieve the image from the personal details
        $image = $personalDetails ? $personalDetails->image : null;

        $data = [
            'personalDetails' => $personalDetails,
            'strengths' => $strengths,
            'educations' => $educations,
            'skills' => $skills,
            'projects' => $projects,
            'experiences' => $experiences,
            'image' => $image,  // Add the image field to the data array
        ];

        $pdf = Pdf::loadView('img-generate-pdf', $data)
            ->setPaper([0, 0, 612, 792], 'portrait');  // Custom paper size and orientation

        return $pdf->download('img-generate-pdf.pdf');  // Updated filename to 'generate-cv.pdf'
    }





}


