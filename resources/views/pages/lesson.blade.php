@extends('layouts.app')

@section('content')
    <div class="container pt-5">
        <h2>{{ $lesson->title }}</h2>
        <div id="content"><div>
    </div>
@endsection

@push('js')
    <script>
        document.querySelector('#content').innerHTML = '{!! $lesson->content !!}';
    </script>
@endpush