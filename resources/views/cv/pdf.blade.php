<!DOCTYPE html>
<html>
<head>
    <title>CV</title>
    <style>
        /* Add some basic styling */
        body { font-family: Arial, sans-serif; }
        .section { margin-bottom: 20px; }
        h1, h2 { color: #333; }
        p { margin: 5px 0; }
        .section-title { font-size: 18px; font-weight: bold; margin-top: 20px; }
    </style>
</head>
<body>
    <h1>{{ $personalDetails->first_name }} {{ $personalDetails->last_name }}</h1>
    <p><strong>Phone:</strong> {{ $personalDetails->phone }}</p>
    <p><strong>Email:</strong> {{ $personalDetails->email }}</p>
    <p><strong>GitHub:</strong> {{ $personalDetails->github }}</p>
    <p><strong>LinkedIn:</strong> {{ $personalDetails->linkedin }}</p>
    <p><strong>Address:</strong> {{ $personalDetails->address }}</p>

    <div class="section">
        <div class="section-title">Strengths</div>
        <ul>
            @foreach ($strengths as $strength)
                <li>{{ $strength->strength }}</li>
            @endforeach
        </ul>
    </div>

    <div class="section">
        <div class="section-title">Skills</div>
        <ul>
            @foreach ($skills as $skill)
                <li>{{ $skill->skill }}</li>
            @endforeach
        </ul>
    </div>

    <div class="section">
        <div class="section-title">Education</div>
        @foreach ($educations as $education)
            <p><strong>{{ $education->institution_name }}</strong></p>
            <p>{{ $education->degree }}, {{ $education->field_of_study }}</p>
            <p>Graduated: {{ $education->graduation_date }}</p>
        @endforeach
    </div>

    <div class="section">
        <div class="section-title">Experience</div>
        @foreach ($experiences as $experience)
            <p><strong>{{ $experience->company_name }}</strong></p>
            <p>{{ $experience->position }}</p>
            <p>{{ $experience->years_of_service }}</p>
        @endforeach
    </div>

    <div class="section">
        <div class="section-title">Projects</div>
        @foreach ($projects as $project)
            <p><strong>{{ $project->project_name }}</strong></p>
            <p>{{ $project->description }}</p>
            <p><strong>GitHub:</strong> <a href="{{ $project->github_link }}">{{ $project->github_link }}</a></p>
        @endforeach
    </div>
</body>
</html>
