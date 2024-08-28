<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cv;

class ProfileController extends Controller
{
    public function index()
    {
        // Get the authenticated user
        $user = Auth::user();

        // Retrieve the user's CVs
        $cvs = Cv::where('user_id', $user->id)->get();

        // Return the profile view with user and CVs
        return view('profile', compact('user', 'cvs'));
    }
    public function profile()
    {
        $user = auth()->user();
        $cvs = Cv::where('user_id', $user->id)->get();

        return view('profile', compact('user', 'cvs'));
    }
}
