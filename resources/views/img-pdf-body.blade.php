<div class="cv-container">
    <div class="cv-header">
        {{-- <div id="imageId">
            @if($personalDetails->image)
                <img src="{{ asset('storage/' . $personalDetails->image) }}" alt="Profile Image">
            @endif
        </div> --}}

        <div id="imageId">
            @if($personalDetails->image)
                <img src="{{ url('storage/' . $personalDetails->image) }}" alt="Profile Image" class="profile-image">
            @endif
        </div>
        <div id="nameId">
            <h1 class="cv-name">{{ $personalDetails->first_name ?? '' }} {{ $personalDetails->last_name ?? '' }}</h1>
        </div>
    </div>
    <div class="cv-body">
        <!-- Left Column -->
        <div class="left-column cv-left" style="float: left; width: 40%;">
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
    
        <!-- Right Column -->
        <div class="right-column cv-right" style="float: right; width: 45%;">
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
    <div style="clear: both;"></div>
</div>