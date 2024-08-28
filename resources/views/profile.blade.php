@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="profile-image">
            @if(Auth::user()->personalDetail && Auth::user()->personalDetail->image)
                <img src="{{ asset('storage/' . Auth::user()->personalDetail->image) }}" alt="Profile Image" class="img-fluid" style="width: 200px; height:200px; border-radius: 50%;">
            @else
                <p>No profile image uploaded.</p>
            @endif
        </div>
        <div class="col-md-4">
            <h3><br>{{ $user->name }}</h3>
            <p>{{ $user->email }}</p>
        </div>
        {{-- <div class="col-md-8">
            @if($cvs->isEmpty())
                <p>You have not created any CVs yet.</p>
            @else
                @foreach($cvs as $cv)
                    <h3>{{ $cv->title }}</h3>
                    <p>{{ $cv->content }}</p>
                    <!-- Add a link to download/view the CV -->
                @endforeach
            @endif
        </div> --}}
    </div>
</div>
@endsection
