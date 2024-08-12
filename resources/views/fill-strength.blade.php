@extends('layouts.information')

@section('content')
    <h1 class="caption">Strengths</h1>
    <form action="{{ url('/save-strengths') }}" method="POST">
        @csrf
        <div id="strengths-container">
            @php
                $flag=0
            @endphp
            @foreach ($strengths as $strength)
                @php
                    $flag=1
                @endphp
                <div class="form-group">
                    <label for="strengths[]">Strength:</label>
                    <input type="text" name="strengths[]" class="form-control" value="{{ $strength->strength }}" required>
                </div>
            @endforeach
            @if( $flag==0)
                <div class="form-group">
                    <label for="strengths[]">Strengths:</label>
                    <input type="text" name="strengths[]" class="form-control" required>
                </div>
            @endif
        </div>
        <button type="button" class="btn btn-primary mt-3 add" id="add-strength" >Add More</button>
        <button type="submit" class="btn btn-primary mt-3">Save</button>
    </form>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('add-strength').addEventListener('click', function() {
                const container = document.getElementById('strengths-container');
                const newStrength = document.createElement('div');
                newStrength.classList.add('form-group');
                newStrength.innerHTML = `
                    <label for="strengths[]">Strength:</label>
                    <input type="text" name="strengths[]" class="form-control" required>
                `;
                container.appendChild(newStrength);
            });
        });
    </script>
@endsection
