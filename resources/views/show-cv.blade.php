@extends('layouts.information')



@section('content')

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
                line-height: 1.4;
                color: black !important;
              
            }

            .cv-container {
               
                width: 700px;
                height: 877px;
                margin: 0 auto;
                padding: 0px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 1);
                background-color: rgb(255, 255, 255);
                display: flex;
                flex-direction: column;
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
                height: 180px;
                box-shadow: 0px 4px 6px rgba(66, 66, 67, 0.4);
                margin-bottom: 20px;
            }

            .cv-header h1, .cv-header h2, .cv-header p {
                margin: 0;
                padding: 0;
            }

            .cv-name {
                font-size: 3em;
                font-weight: bold;
            }

            .cv-body {
                padding-top: 20px;
                display: flex;
                justify-content: space-between;
                background-color: #ffffff
            }

            .cv-left {
                width: 40%;
                padding-left: 50px;
            }
            .cv-right{
                width: 45%;
                padding-right: 30px;
            }

            .cv-section b{
                color: #030d69

            }

            .cv-section h2 {
                font-size: 1.8em;
                color: #0211b3;
                border-bottom: 2px solid #0211b3;
                padding-bottom: 5px;
                margin-bottom: 10px; 
                width: 250px;
                font-weight: bold;
            }

            .cv-section{
                padding: 10px;
            }

            .cv-section p, .cv-section ul {
                margin: 0 0 10px;
                padding: 0;
            }

            .cv-section ul {
                list-style-type: disc;
                padding-left: 20px;
            }

            .cv-footer {
                text-align: center;
                margin-top: 30px;
            }

            .btn-download {
                background-color: #007bff;
                color: #fff;
                padding: 10px 20px;
                border: none;
                border-radius: 5px;
                font-size: 1em;
                cursor: pointer;
            }

            .btn-download:hover {
                background-color: #0056b3;
            }
            .page-break {
                page-break-before: always;
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

        @include('cv-body-default')

    </body>
    </html>
    <div id="download-div">
        <a href="{{ route('download-cv-pdf') }}" class="btn btn-primary mt-5 download">Download as PDF</a>
    </div>

@endsection
