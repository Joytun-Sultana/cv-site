@extends('layouts.app')

@section('content')
    <h1>Create Your CV</h1>
    <div class="row">
        <div class="col-md-4">
            <h2>Select Color</h2>
            <form id="cv-form" action="{{ url('/customize-cv') }}" method="POST">
                @csrf
                <div class="form-group-option">
                    <label for="color">Choose a color:</label>
                    <select id="color" name="color" class="form-control">
                        <option value="blue">Blue</option>
                        <option value="red">Red</option>
                        <option value="green">Green</option>
                        <option value="yellow">Yellow</option>
                    </select>
                </div>
        </div>
        <div class="col-md-8">
            <h2>Select Template</h2>
            <div class="form-group-option">
                <label for="template">Choose a template:</label>
                <div>
                    <input type="radio" id="template1" name="template" value="template1" required>
                    <label for="template1">Template 1</label>
                </div>
                <div>
                    <input type="radio" id="template2" name="template" value="template2">
                    <label for="template2">Template 2</label>
                </div>
                <div>
                    <input type="radio" id="template3" name="template" value="template3">
                    <label for="template3">Template 3</label>
                </div>
                <div>
                    <input type="radio" id="template4" name="template" value="template4">
                    <label for="template4">Template 4</label>
                </div>
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Next</button>
    </form>
@endsection