

@extends('layouts.information')

@section('content')
    <h1 class="caption">Work Experiences</h1>
    <form action="{{ url('/save-experience') }}" method="POST">
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
                    <input type="text" name="company_name[]" class="form-control" value="{{ $experience->company_name }}" required>
                </div>
                <div class="form-group">
                    <label for="position">Position:</label>
                    <input type="text" name="position[]" class="form-control" value="{{ $experience->position }}" required>
                </div>
                <div class="form-group">
                    <label for="years_of_service">Years of Service:</label>
                    <input type="text" name="years_of_service[]" class="form-control" value="{{ $experience->years_of_service }}" required>
                </div>
            @endforeach


            @if( $flag==0)
                <div class="form-group">
                    <label for="company_name">Company Name:</label>
                    <input type="text" name="company_name[]" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="position">Position:</label>
                    <input type="text" name="position[]" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="years_of_service">Years of Service:</label>
                    <input type="text" name="years_of_service[]" class="form-control" required>
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
                    <input type="text" name="company_name[]" class="form-control" required>
                    <label for="position">Position:</label>
                    <input type="text" name="position[]" class="form-control" required>
                    <label for="years_of_service">Years of Service:</label>
                    <input type="text" name="years_of_service[]" class="form-control" required>
                `;
                container.appendChild(newExperience);
            });
        });
    </script>
@endsection
