@extends('layouts.app')

@section('content')
<html>
    <h1 class="caption">Send Bulk Email</h1>
    <div style="justify-content: center; align-items: center; display: flex">
        <form action="{{ route('send.bulk') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="subject">Mail Subject</label>
                <input type="text" name="subject" placeholder="Email Subject" required>
            </div>
            <div class="form-group">
                <label for="message">Message Body:</label>
                <textarea name="message" placeholder="Email Message" required></textarea>
            </div>
            
            <button type="submit" class="btn btn-primary mt-3" style="width: 130px">Send Bulk Email</button>

        </form>
    </div>

</html>
@endsection

