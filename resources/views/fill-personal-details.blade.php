@extends('layouts.information')


@section('content')
    <h1 class="caption">Personal Details</h1>
    
    <form action="{{ url('/save-personal-details') }}" method="POST" id="personal">
        @csrf
        <div class="form-group form-row-person">
            <label for="first_name">First Name:</label>
            <input type="text" name="first_name" class="form-control" value="{{ $personalDetails->first_name ?? '' }}" required>
        </div>
        <div class="form-group form-row-person">
            <label for="last_name">Last Name:</label>
            <input type="text" name="last_name" class="form-control" value="{{ $personalDetails->last_name ?? '' }}" required>
        </div>
        <div class="form-group form-row-person">
            <label for="phone">Phone:</label>
            <input type="text" name="phone" class="form-control" value="{{ $personalDetails->phone ?? '' }}" required>
        </div>
        <div class="form-group form-row-person">
            <label for="email">Email:</label>
            <input type="email" name="email" class="form-control" value="{{ $personalDetails->email ?? '' }}" required>
        </div>
        <div class="form-group form-row-person">
            <label for="github">GitHub:</label>
            <input type="text" name="github" class="form-control" value="{{ $personalDetails->github ?? '' }}">
        </div>
        <div class="form-group form-row-person">
            <label for="linkedin">LinkedIn:</label>
            <input type="text" name="linkedin" class="form-control" value="{{ $personalDetails->linkedin ?? '' }}">
        </div>
        <div class="form-group form-row-person">
            <label for="address">Address:</label>
            <input type="text" name="address" class="form-control" value="{{ $personalDetails->address ?? '' }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
@endsection
