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
        <body>
            <div class="choose-color">
                <h1>choose color</h1>
                <a class="color-circle" href="/show-cv"><div style="height: 30px; width:30px; background-color:#0211b3; border-radius:50% "></div></a>
                <a class="color-circle" href="/show-cv-purple"><div style="height: 30px; width:30px; background-color:rgb(126, 12, 122); border-radius:50% "></div></a>
                <a class="color-circle" href="/show-cv-orange"><div style="height: 30px; width:30px; background-color:rgb(184, 120, 2); border-radius:50% "></div></a>
                <a class="color-circle" href="/show-cv-green"><div style="height: 30px; width:30px; background-color:rgb(10, 99, 1); border-radius:50% "></div></a>
                <a class="color-circle" href="/show-cv-black"><div style="height: 30px; width:30px; background-color:rgb(83, 82, 84); border-radius:50% "></div></a>
            
            </div>
        
        
            <div class="cv-container cv-default">
                <!-- Name Section -->
                <div class="cv-header">
                    <h1 class="cv-name">{{ $personalDetails->first_name ?? '' }} {{ $personalDetails->last_name ?? '' }}</h1>
                </div>
        
                <!-- Content Section -->
                <div class="cv-body">
                    <!-- Left Side -->
                    <div class="cv-left">
                        <!-- Personal Details -->
                      
                        @if(!empty($personalDetails->email) || !empty($personalDetails->phone) || !empty($personalDetails->github) || !empty($personalDetails->linkedin) || !empty($personalDetails->address))
                            <div class="cv-section personal">
                                <h2>Personal Details</h2>
                                @if(!empty($personalDetails->email))
                                    <p><b>Email:</b> {{ $personalDetails->email }}</p>
                                @endif
                                @if(!empty($personalDetails->phone))
                                    <p><b>Phone: </b>{{ $personalDetails->phone }}</p>
                                @endif
                                @if(!empty($personalDetails->github))
                                    <p><b>GitHub:</b> {{ $personalDetails->github }}</p>
                                @endif
                                @if(!empty($personalDetails->linkedin))
                                    <p><b>LinkedIn:</b> {{ $personalDetails->linkedin }}</p>
                                @endif
                                @if(!empty($personalDetails->address))
                                    <p><b>Address:</b> {{ $personalDetails->address }}</p>
                                @endif
                            </div>
                        @endif
                       
        
                        <!-- Strengths -->
                        @if($strengths->isNotEmpty())
                        <div class="cv-section">
                            <h2>Strengths</h2>
                            <ul>
                                @foreach ($strengths as $strength)
                                    <li>{{ $strength->strength }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
        
                        <!-- Skills -->
                        @if($strengths->isNotEmpty())
                        <div class="cv-section">
                            <h2>Skills</h2>
                            <ul>
                                @foreach ($skills as $skill)
                                    <li>{{ $skill->skill }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                    </div>
        
                    <!-- Right Side -->
                    <div class="cv-right">
                        <!-- Education -->
                        @if($educations->isNotEmpty())
                            <div class="cv-section">
                                <h2>Education</h2>
                                @foreach ($educations as $education)
                                    @if(!empty($education->degree) || !empty($education->field_of_study) || !empty($education->institution_name) || !empty($education->graduation_date))
                                        <p>
                                            @if(!empty($education->degree))
                                                <b>{{ $education->degree }}</b>
                                            @endif
                                            @if(!empty($education->field_of_study))
                                                <b>({{ $education->field_of_study }})</b>
                                            @endif
                                        </p>
                                        @if(!empty($education->institution_name))
                                            <p>{{ $education->institution_name }}</p>
                                        @endif
                                        @if(!empty($education->graduation_date))
                                            <p>Graduation date: ({{ $education->graduation_date }})</p>
                                        @endif
                                    @endif
                                @endforeach
                            </div>
                        @endif
        
                        <!-- Experience -->
                        @if($experiences->isNotEmpty())
                            <div class="cv-section">
                                <h2>Experience</h2>
                                @foreach ($experiences as $experience)
                                    @if(!empty($experience->company_name) || !empty($experience->position) || !empty($experience->years_of_service))
                                        @if(!empty($experience->company_name))
                                            <p><b>{{ $experience->company_name }}</b></p>
                                        @endif
                                        @if(!empty($experience->position) || !empty($experience->years_of_service))
                                            <p>{{ $experience->position }} 
                                            @if(!empty($experience->years_of_service))
                                                ({{ $experience->years_of_service }} years)
                                            @endif
                                            </p>
                                        @endif
                                    @endif
                                @endforeach
                            </div>
                        @endif
        
                        <!-- Projects -->
                        @if($projects->isNotEmpty())
                            <div class="cv-section">
                                <h2>Projects</h2>
                                @foreach ($projects as $project)
                                    @if(!empty($project->project_name) || !empty($project->description) || !empty($project->github_link))
                                        @if(!empty($project->project_name))
                                            <p><b>{{ $project->project_name }}</b></p>
                                        @endif
                                        @if(!empty($project->description))
                                            <p>{{ $project->description }}</p>
                                        @endif
                                        @if(!empty($project->github_link))
                                            <p><b>Github link:</b> <a href="{{ $project->github_link }}">{{ $project->github_link }}</a></p>
                                        @endif
                                    @endif
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        
    </body>
    </html>
    <div id="download-div">
        <a href="{{ route('download-cv-pdf') }}" class="btn btn-primary mt-5 download">Download as PDF</a>
    </div>

@endsection
