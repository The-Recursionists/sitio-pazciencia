@extends('layouts.app')

@section('content')
    @include('users.partials.header', [
        'title' => $lesson->title,
        'description' => "Por " . $lesson->user->name,
        'class' => "col-12 text-center"
    ])
    <div class="container pt-4">
        @role(['manager', 'professional_volunteer'])
        <div class="alert mb-3 font-weight-bold {{ $lesson->status === 'aprobado' ? 'alert-info' : 'alert-warning' }}">
            Estado de publicación:
            <span class="badge {{ $lesson->status === 'aprobado' ? 'badge-info' : 'badge-warning' }} font-weight-bold">
                {{ $lesson->status }}
            </span>
        </div>
        @endrole
        <div id="content">
            {!! $lesson->content !!}
        </div>
        <div>
            <h3>Referencias:</h3>
            @foreach ($references as $reference)
            <p>
                <a href="{{ $reference->url }}" target="_blank">{{ $reference->title }}</a>
            </p>
            @endforeach
        </div>
        <div>
            <span class="badge badge-primary mb-3">
                {{ $lesson->area->title }}
            </span>
        </div>
        <div class="container text-right pt-2">
            @role(['manager', 'professional_volunteer'])
            <div>
                <button class="btn btn-sm btn-success">Aprobar</button>
                <button class="btn btn-sm btn-danger">Rechazar</button>
            </div>
            @endrole
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
