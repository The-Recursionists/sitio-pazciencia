@extends('layouts.app', ['class' => 'bg-white'])
@section('pageTitle', 'Lecciones Publicadas')
@section('content')
    <div class="header bg-gradient-primary py-7 py-lg-8">
        <div class="container">
            <div class="header-body text-center mt-7 mb-7">
                <div class="row justify-content-center">
                    @if ($activeArea)
                        <h1 class="text-white">Lecciones sobre {{ $activeArea->title }}</h1>
                    @else
                        <h1 class="text-white">Lista de Lecciones</h1>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid py-5">
        <div class="row">
            <div class="col-12 col-sm-4 col-lg-3 mb-5">
                <h2 class="mb-1">Área</h2>
                <p class="mb-3 text-sm text-muted">Puedes buscar lecciones de cada área</p>
                @foreach ($areas as $area)
                    <a href="{{ route('lessons.public-lessons', ['area_id' => $area->id]) }}"
                       class="d-block mb-2 {{ $activeArea && $area->id == $activeArea->id ? "font-weight-bold" : "" }}">
                        <div class="badge badge-primary mr-2">{{ $area->lessons_count }}</div>
                        {{ $area->title }}
                    </a>
                @endforeach
            </div>
            <div class="col-12 col-lg-9 col-sm-8">
                <h2 class="mb-3">
                    Lecciones
                </h2>
                <div class="row">
                    @foreach ($lessons as $lesson)
                    <div class="col-12 col-lg-4 mb-3">
                        <div class="card h-100">
                            <div class="card-body h-100">
                                <div class="d-flex flex-column justify-content-between h-100">
                                    <div class="mb-1">
                                        <div class="badge badge-primary">
                                            {{ $lesson->area->title }}
                                        </div>
                                    </div>
                                    <h3 class="mb-3 text-truncate">{{ $lesson->title }}</h3>
                                    <a class="stretched-link" href="{{ route('lesson.public', $lesson->id) }}">Ver lección</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @if (count($lessons) == 0)
                        <div class="alert alert-secondary">
                            <i class="fas fa-info-circle mr-1"></i>
                            {{-- No se encontraron lecciones sobre {{ $activeArea->title }} --}}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
