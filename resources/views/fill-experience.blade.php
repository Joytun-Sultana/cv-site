

@extends('layouts.information')

@section('content')
    <h1 class="caption">Work Experiences</h1>
    <form action="{{ url('/save-experience') }}" method="POST" class="form-design">
        @csrf
        <div id="experience-container">
            @php
                $flag=0
            @endphp
            @foreach ($experiences as $experience)
                @php
                    $flag=1
                @endphp
                <div class="form-group">
                    <label for="company_name">Company Name:</label>
                    <input type="text" name="company_name[]" class="form-control" value="{{ $experience->company_name }}" placeholder="Enter compant name">
                </div>
                <div class="form-group">
                    <label for="position">Position:</label>
                    <input type="text" name="position[]" class="form-control" value="{{ $experience->position }}" placeholder="Enter position">
                </div>
                <div class="form-group">
                    <label for="years_of_service">Years of Service:</label>
                    <input type="text" name="years_of_service[]" class="form-control" value="{{ $experience->years_of_service }}" placeholder="Enter years of service">
                </div>
            @endforeach


            @if( $flag==0)
                <div class="form-group">
                    <label for="company_name">Company Name:</label>
                    <input type="text" name="company_name[]" class="form-control"  placeholder="Enter compant name">
                </div>
                <div class="form-group">
                    <label for="position">Position:</label>
                    <input type="text" name="position[]" class="form-control" placeholder="Enter position">
                </div>
                <div class="form-group">
                    <label for="years_of_service">Years of Service:</label>
                    <input type="text" name="years_of_service[]" class="form-control" placeholder="Enter years of service">
                </div>
            @endif
        </div>
        <button type="button" class="btn btn-primary mt-3 add" id="add-experience">Add More</button>
        <button type="submit" class="btn btn-primary mt-3">Save</button>
    </form>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('add-experience').addEventListener('click', function() {
                const container = document.getElementById('experience-container');
                const newExperience = document.createElement('div');
                newExperience.classList.add('form-group');
                newExperience.innerHTML = `
                    <label for="company_name">Company Name:</label>
                    <input type="text" name="company_name[]" class="form-control" placeholder="Enter compant name">
                    <label for="position">Position:</label>
                    <input type="text" name="position[]" class="form-control" placeholder="Enter position">
                    <label for="years_of_service">Years of Service:</label>
                    <input type="text" name="years_of_service[]" class="form-control" placeholder="Enter years of service">
                `;
                container.appendChild(newExperience);
            });
        });
    </script>
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
                background-color: #ffffff;
                line-height: 1.3;
            }

            .cv-left {
                width: 45%;
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

        @include('cv-body-default-card')

    </body>
    </html>
    <div id="download-div">
        <a href="{{ route('download-cv-pdf') }}" class="btn btn-primary mt-5 download">Download as PDF</a>
    </div>

@endsection


