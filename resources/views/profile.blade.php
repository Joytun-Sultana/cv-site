@extends('layouts.information')

@section('content')
<div class="container">
    <div class="row">
        <div class="profile-image profile pro-image">
            @if(Auth::user()->personalDetail && Auth::user()->personalDetail->image)
                <img src="{{ asset('storage/' . Auth::user()->personalDetail->image) }}" alt="Profile Image" class="img-fluid" style="width: 250px; height:250px; border-radius: 50%;">
            @else
                <p>No profile image uploaded.</p>
            @endif
        </div>
        <div class="profile">
            <h1><br>{{ $user->name }}</h1>
            <p style="font-size:16px";>{{ $user->email }}</p>
        </div>
        
    </div>
</div>
@endsection


@section('content1')

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>CV Preview</title>
        {{-- <link rel="stylesheet" href="{{ asset('css/cv-style.css') }}"> --}}
        <style>
            body {
                font-family: 'Inria Serif', serif ;
                line-height: 1;
                color: black !important;
              
            }

            .cv-container {
               
                width: 375px;
                height: 500px;
                margin: 0 auto;
                padding: 0px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 1);
                background-color: rgb(255, 255, 255);
                display: flex;
                flex-direction: column;
                margin-left: 4vw;
            }

            .cv-header {
                
                display: flex;
                justify-content: center; /* Center horizontally */
                align-items: center; /* Center vertically */

                
            }

            .cv-header {
               
                text-align: center;
                background-color: #8cbefc; 
                color: #0211b3;
                height: 80px;
                box-shadow: 0px 4px 6px rgba(66, 66, 67, 0.4);
                margin-bottom: 10px;
            }

            .cv-header h1, .cv-header h2, .cv-header p {
                margin: 0;
                padding: 0;
            }

            .cv-name {
                font-size: 1.6em;
                font-weight: bold;
            }

            .cv-body {
                font-size: 8px;
                padding-top: 10px;
                display: flex;
                justify-content: space-between;
                background-color: #ffffff
            }

            .cv-left {
                width: 40%;
                padding-left: 25px;
            }
            .cv-right{
                width: 45%;
                padding-right: 30px;
            }

            .cv-section b{
                color: #030d69

            }

            .cv-section h2 {
                font-size: 1.3em;
                color: #0211b3;
                border-bottom: 1px solid #0211b3;
                padding-bottom: 2px;
                margin-bottom: 5px; 
                width: 115px;
                font-weight: bold;
            }

            .cv-section{
                padding: 3px;
            }

            .cv-section p, .cv-section ul {
                margin: 0 0 5px;
                padding: 0;
            }

            .cv-section ul {
                list-style-type: disc;
                padding-left: 10px;
            }

            .cv-footer {
                text-align: center;
                margin-top: 15px;
            }

            .btn-download {
                background-color: #007bff;
                color: #fff;
                padding: 5px 10px;
                border: none;
                border-radius: 5px;
                font-size: 0.5em;
                cursor: pointer;
            }

            .btn-download:hover {
                background-color: #0056b3;
            }
            .page-break {
                page-break-before: always;
            }
            .choose-color {
                display: flex;
                flex-direction: column;
                align-items: flex-start;
            }

            #color, #template {
                display: flex;
                align-items: center;
                gap: 6px; /* Space between the circles */
                margin-bottom: 0px; /* Space between the rows */
            }

            #color h2, #template h2 {
                margin-right: 10px; /* Space between the heading and the circles */
                margin-bottom: 0;
                margin-left: 10px;
            }

            .color-circle {
                display: inline-block;
            }
            
        </style>
    </head>

    <body >
        <?php
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


        $data = [
            'personalDetails' => $personalDetails,
            'strengths' => $strengths,
            'educations' => $educations,
            'skills' => $skills,
            'projects' => $projects,
            'experiences' => $experiences,
        ];
        ?>

        @include('cv-body-default-card-first')

    </body>
    </html>
    <div id="download-div">
        <a href="{{ route('download-cv-pdf') }}" class="btn btn-primary mt-5 download">Download as PDF</a>
    </div>

@endsection

