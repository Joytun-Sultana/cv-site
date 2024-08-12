@extends('layouts.app')

@section('content')

<div id="home-div">
    <div id="home-left">
        <h1 id="home-page">Free CV Maker<br> Build Your Professional CV <br> Online</h1>
        <a href="{{ url('/fill-personal-details') }}" class="btn btn-primary" id="create-cv">Create a CV</a>
    </div>
    <div id="home-right">
        <img src="{{ asset('images/cv1.png') }}" alt="Image 1" class="right-image" id="img1">
        <img src="{{ asset('images/cv2.png') }}" alt="Image 2" class="right-image" id="img2">
    </div>
    
</div>
    
@endsection

