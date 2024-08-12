@extends('layouts.information')

@section('content')
    <h1 class="caption">Project Details</h1>
    <form action="{{ url('/save-project') }}" method="POST">
        
        @csrf
        <div id="project-container">
            @php
                $flag=0
            @endphp
            @foreach ($projects as $project)
                @php
                    $flag=1
                @endphp

                <div class="form-group">
                    <label for="project_name">Project Name:</label>
                    <input type="text" name="project_name[]" class="form-control" value="{{ $project->project_name }}" required>
                </div>
                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea name="description[]" class="form-control" required>{{ $project->description }}</textarea>
                </div>
                <div class="form-group">
                    <label for="github_link">GitHub Link:</label>
                    <input type="url" name="github_link[]" class="form-control" value="{{ $project->github_link }}" >
                </div>
            @endforeach    





            @if( $flag==0)
                <div class="form-group">
                    <label for="project_name">Project Name:</label>
                    <input type="text" name="project_name[]" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea name="description[]" class="form-control" required></textarea>
                </div>
                <div class="form-group">
                    <label for="github_link">GitHub Link:</label>
                    <input type="url" name="github_link[]" class="form-control">
                </div>
            @endif
        </div>
        <button type="button" class="btn btn-primary mt-3 add" id="add-project">Add More</button>
        <button type="submit" class="btn btn-primary mt-3">Save</button>
    </form>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('add-project').addEventListener('click', function() {
                const container = document.getElementById('project-container');
                const newProject = document.createElement('div');
                newProject.classList.add('form-group');
                newProject.innerHTML = `
                    <label for="project_name">Project Name:</label>
                    <input type="text" name="project_name[]" class="form-control" required>
                    <label for="description">Description:</label>
                    <textarea name="description[]" class="form-control" required></textarea>
                    <label for="github_link">GitHub Link:</label>
                    <input type="url" name="github_link[]" class="form-control">
                `;
                container.appendChild(newProject);
            });
        });
    </script>
@endsection













{{-- @extends('layouts.information')

@section('content')
    <h1>Fill in Your Projects</h1>
    <form action="{{ url('/save-projects') }}" method="POST">
        @csrf
        <div id="projects-container">
            <div class="form-group">
                <label for="project_name">Project Name:</label>
                <input type="text" name="project_name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea name="description" class="form-control" required></textarea>
            </div>
            <div class="form-group">
                <label for="project_github">Project GitHub Link:</label>
                <input type="url" name="project_github" class="form-control">
            </div>
        </div>
        <button type="button" class="btn btn-secondary" id="add-project">Add More Projects</button>
        <button type="submit" class="btn btn-primary mt-3">Finish</button>
    </form>
    <div id="projects-list">
        @foreach ($projects as $project)
            <div class="project-item">
                <p><strong>Project Name:</strong> {{ $project['project_name'] }}</p>
                <p><strong>Description:</strong> {{ $project['description'] }}</p>
                <p><strong>Project GitHub:</strong> {{ $project['project_github'] }}</p>
                <button class="btn btn-warning edit-project" data-id="{{ $loop->index }}">Edit</button>
            </div>
        @endforeach
    </div>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('add-project').addEventListener('click', function() {
                const container = document.getElementById('projects-container');
                const projectsList = document.getElementById('projects-list');
                const projectItem = {
                    project_name: document.querySelector('input[name="project_name"]').value,
                    description: document.querySelector('textarea[name="description"]').value,
                    project_github: document.querySelector('input[name="project_github"]').value,
                };
                const projectDiv = document.createElement('div');
                projectDiv.classList.add('project-item');
                projectDiv.innerHTML = `
                    <p><strong>Project Name:</strong> ${projectItem.project_name}</p>
                    <p><strong>Description:</strong> ${projectItem.description}</p>
                    <p><strong>Project GitHub:</strong> ${projectItem.project_github}</p>
                    <button class="btn btn-warning edit-project">Edit</button>
                `;
                projectsList.appendChild(projectDiv);

                // Clear the form
                document.querySelector('input[name="project_name"]').value = '';
                document.querySelector('textarea[name="description"]').value = '';
                document.querySelector('input[name="project_github"]').value = '';
            });

            document.querySelectorAll('.edit-project').forEach(button => {
                button.addEventListener('click', function() {
                    const projectIndex = this.getAttribute('data-id');
                    const projectItem = @json($projects)[projectIndex];
                    document.querySelector('input[name="project_name"]').value = projectItem.project_name;
                    document.querySelector('textarea[name="description"]').value = projectItem.description;
                    document.querySelector('input[name="project_github"]').value = projectItem.project_github;
                });
            });
        });
    </script>
@endsection --}}
