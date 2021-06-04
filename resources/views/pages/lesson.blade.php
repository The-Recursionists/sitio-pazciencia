@extends('layouts.app')

@section('content')
    @include('users.partials.header', [
        'title' => $lesson->title,
        'description' => "Por " . $lesson->user->name,
        'class' => "col-12 text-center"
    ])
    <div class="container pt-4">
        <div id="content">
            {!! $lesson->content !!}
        <div>
        <span class="badge badge-primary mb-3">
            {{ $lesson->category->title }}
        </span>
    </div>
@endsection

@push('js')
<script>
    $(document).ready(function () {
       var video = $('iframe');
       video.removeClass('ql-video');
       video.addClass('embed-responsive-item');
       video.wrap('<div class="embed-responsive embed-responsive-16by9"></div>');
    });
</script>
@endpush
