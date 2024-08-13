@extends('layouts.information')

@section('content')
    <h1 class="caption">Your Skills</h1>
    <form action="{{ url('/save-skills') }}" method="POST">
        @csrf
        <div id="skills-container">
            @php
                $flag=0
            @endphp
            @foreach ($skills as $skill)
                @php
                    $flag=1
                @endphp
                <div class="form-group">
                    <label for="skills[]">Skill:</label>
                    <input type="text" name="skills[]" class="form-control" value="{{ $skill->skill }}" >
                </div>
            @endforeach
            @if( $flag==0)
                <div class="form-group">
                    <label for="skills[]">Skill:</label>
                    <input type="text" name="skills[]" class="form-control" placeholder="Enter your skill">
                </div>
            @endif
        </div>
        <button type="button" class="btn btn-primary mt-3 add" id="add-skill" style="background-color: #2470ff">Add More</button>
        <button type="submit" class="btn btn-primary mt-3">Save</button>
    </form>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('add-skill').addEventListener('click', function() {
                const container = document.getElementById('skills-container');
                const newSkill = document.createElement('div');
                newSkill.classList.add('form-group');
                newSkill.innerHTML = `
                    <label for="skills[]">Skill:</label>
                    <input type="text" name="skills[]" class="form-control" placeholder="Enter your skill">
                `;
                container.appendChild(newSkill);
            });
        });
    </script>
@endsection
