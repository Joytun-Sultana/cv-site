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





class CvController extends Controller
{
    public function create()
    {
        return view('create-cv');
    }

}


