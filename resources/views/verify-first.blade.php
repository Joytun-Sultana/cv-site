@extends('layouts.app')


@section('content')

    
     {{-- <div id="home-left" >
        <h1 id="home-page" class="verify" > please confirm email first </h1>
    </div> --}}
    
<div id="email-div">
    <div style="margin-right: 20vw; font-weight:bold">
        <h1 >Please Verify Your Email First</h1>
    </div>
    <div id="mail-icon">
        <img src="{{ asset('images/798510_email_512x512.png') }}" alt="Image 1" style="width: 25vw;">
    </div>
    <div id="resend">
        <form class="d-inline" method="POST" action="{{ url('/resend-new') }}">
            @csrf
            <button style="width:200px; margin-top:0px" type="submit"  class="btn btn-primary mt-3">{{ __('Resend Verification Email')}}</button>.
        </form>
    </div>
</div>

@endsection