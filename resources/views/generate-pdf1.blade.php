<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CV Preview</title>
    <style>
        @page {
            margin: 0mm;
        }
        
        body {
            font-family: 'Inria Serif', serif ;
            line-height: 1.6;
        }

        .cv-container {
            /* width: 818px;
            height: 1056px; */
            background-color: #ffffff
        }

        .cv-header {
            text-align: center;
            vertical-align: middle;
            background-color: #70adf7;
            color: #0211b3;
            height: 200px;
        }
        .cv-header {
            margin: 0;
            padding: 0;
            line-height: 2.8;
        }
        
        .cv-header h1, .cv-header h2, .cv-header p {
            margin: 0;
            padding: 0;
        }


        .inline-list li {
            display: inline;
            margin-right: 30px;
        }

        .cv-name {
            font-size: 3em;
            font-weight: bold;
        }

        .cv-body {
            display: flex;
            justify-content: space-between;
            background-color: #bdd7f3
        }
        .cv-left{
            background: linear-gradient(to right, #b1b2b3,  #ededef );
            /* height: 914px; */
            padding-left: 60px;
        }
        .cv-right{
            padding-right: 30px;
        }

        .personal b{
            color: #030d69

        }
        .cv-section h2 {
            font-size: 2em;
            color: #0211b3;
            border-bottom: 2px solid #0211b3;
            padding-bottom: 5px;
            margin-bottom: 10px; 
            width: 250px;
        }

        .cv-section p, .cv-section ul {
            margin: 0 0 0px;
            padding: 0;
        }

        .cv-section ul {
            padding-left: 20px;
        }
        .page-break {
            page-break-before: always;
        }

    </style>

    {{-- <link rel="stylesheet" href="{{ asset('css/cv-style.css') }}"> --}}
</head>
<body>
    <div class="cv-container">
        <div class="cv-header">
            <h1 class="cv-name">{{ $personalDetails->first_name ?? '' }} {{ $personalDetails->last_name ?? '' }}</h1>
            {{-- <div class="cv-section"> 
                <ul class="inline-list">     
                    <li>Email: {{ $personalDetails->email ?? '' }}</li>
                    <li>Phone: {{ $personalDetails->phone ?? '' }}</li>
                </ul>
                <ul class="inline-list">  
                    <li>GitHub: {{ $personalDetails->github ?? '' }}</li>
                    <li>LinkedIn: {{ $personalDetails->linkedin ?? '' }}</li>
                </ul>
                <ul class="inline-list">  
                    <li>Address: {{ $personalDetails->address ?? '' }}</li>
                </ul>
            </div> --}}
        </div>
        <div class="cv-body">
            <!-- Left Column -->
            <div class="left-column cv-left" style="float: left; width: 35%;">
                <div class="cv-section personal">   
                    <h2>Personal Details</h2>
                    <p><b>Email:</b> {{ $personalDetails->email ?? '' }}</p>
                    <p><b>Phone: </b>{{ $personalDetails->phone ?? '' }}</p>
                    <p><b>GitHub:</b> {{ $personalDetails->github ?? '' }}</p>
                    <p><b>LinkedIn:</b> {{ $personalDetails->linkedin ?? '' }}</p>
                    <p><b>Address:</b> {{ $personalDetails->address ?? '' }}</p>
                </div>

                <div class="cv-section">
                    <h2>Strengths</h2>
                    <ul>
                        @foreach ($strengths as $strength)
                            <li>{{ $strength->strength }}</li>
                        @endforeach
                    </ul>
                </div>

                <div class="cv-section">
                    <h2>Skills</h2>
                    <ul>
                        @foreach ($skills as $skill)
                            <li>{{ $skill->skill }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        
            <!-- Right Column -->
            <div class="right-column cv-right" style="float: right; width: 45%;">
                <div class="cv-section">
                    <h2>Education</h2>
                    @foreach ($educations as $education)
                        <p>{{ $education->degree }} in {{ $education->field_of_study }} from {{ $education->institution_name }} ({{ $education->graduation_date }})</p>
                    @endforeach
                </div>
        
                <div class="cv-section">
                    <h2>Experience</h2>
                        @foreach ($experiences as $experience)
                            <p>{{ $experience->position }} at {{ $experience->company_name }} ({{ $experience->years_of_service }})</p>
                        @endforeach
                </div>
        
                <div class="cv-section">
                    <h2>Projects</h2>
                        @foreach ($projects as $project)
                            <p>{{ $project->project_name }} - {{ $project->description }} ({{ $project->github_link }})</p>
                        @endforeach
                </div>
            </div>
        </div>
        <div style="clear: both;"></div>
    </div>
    

</body>
</html>
