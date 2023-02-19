@extends('layouts.app')

@section('content')
<div class="video-wrapper" style="z-index: -1;">
    <video autoplay muted loop id="video">
        <source src="{{ asset('video.mp4') }}" type="video/mp4">
    </video>
</div>
@endsection
