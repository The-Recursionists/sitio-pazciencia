@extends('layouts.app', ['class' => 'bg-white'])

@section('content')
    <div class="header bg-gradient-primary py-7 py-lg-8">
        <div class="container">
            <div class="header-body text-center mt-7 mb-7">
                <div class="row justify-content-center">
                    <div class="col-lg-5 col-md-6">
                        <h1 class="text-white">{{ __('Aquí encontrarás la lista de lecciones disponibles.') }}</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <h1>Lista de lecciones disponibles</h1>
        <ul>
            @foreach ($lessons as $lesson)
            <li>
                <a href="#">{{ $lesson->title }}</a>
            </li>
            @endforeach
        </ul>
    </div>
@endsection
