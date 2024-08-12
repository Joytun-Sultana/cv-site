@extends('layouts.information')

@section('content')
    <h1 class="caption">Educational Details</h1>
    <form action="{{ url('/save-education') }}" method="POST">
        @csrf
        <div id="education-container">
            @php
                $flag=0
            @endphp
            @foreach( $educations as $education )
                @php
                    $flag=1
                @endphp
                <div class="form-group">
                    <label for="institution_name">Institution Name:</label>
                    <input type="text" name="institution_name[]" class="form-control" value="{{ $education->institution_name }}" required>
                </div>
                <div class="form-group">
                    <label for="field_of_study">Field of Study:</label>
                    <input type="text" name="field_of_study[]" class="form-control" value="{{ $education->field_of_study }}" required>
                </div>
                <div class="form-group">
                    <label for="degree">Degree:</label>
                    <input type="text" name="degree[]" class="form-control" value="{{ $education->degree }}" required>
                </div>
                <div class="form-group">
                    <label for="graduation_date">Graduation Date:</label>
                    <input type="date" name="graduation_date[]" class="form-control" value="{{ $education->graduation_date }}" required>
                </div>
            @endforeach       




            @if( $flag==0)
                <div class="form-group">
                    <label for="institution_name">Institution Name:</label>
                    <input type="text" name="institution_name[]" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="field_of_study">Field of Study:</label>
                    <input type="text" name="field_of_study[]" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="degree">Degree:</label>
                    <input type="text" name="degree[]" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="graduation_date">Graduation Date:</label>
                    <input type="date" name="graduation_date[]" class="form-control" required>
                </div>
            @endif
        </div>
        <button type="button" class="btn btn-primary mt-3 add" id="add-education">Add More</button>
        <button type="submit" class="btn btn-primary mt-3">Save</button>
    </form>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('add-education').addEventListener('click', function() {
                const container = document.getElementById('education-container');
                const newEducation = document.createElement('div');
                newEducation.classList.add('form-group');
                newEducation.innerHTML = `
                    <label for="institution_name">Institution Name:</label>
                    <input type="text" name="institution_name[]" class="form-control" required>
                    <label for="field_of_study">Field of Study:</label>
                    <input type="text" name="field_of_study[]" class="form-control" required>
                    <label for="degree">Degree:</label>
                    <input type="text" name="degree[]" class="form-control" required>
                    <label for="graduation_date">Graduation Date:</label>
                    <input type="date" name="graduation_date[]" class="form-control" required>
                `;
                container.appendChild(newEducation);
            });
        });
    </script>
@endsection








