@extends('layouts.app')

@section('content')
    <div class="container pt-5">
        <h2>{{ $lesson->title }}</h2>
        <p>{{ $lesson->content }}</p>
    </div>
@endsection
