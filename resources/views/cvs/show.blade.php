@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            {{ $cv->title }}
        </div>
        <div class="card-body">
            {!! nl2br(e($cv->content)) !!}
        </div>
    </div>
</div>
@endsection
