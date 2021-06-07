@extends('layouts.app')

@section('content')
@include('users.partials.header', [
    'title' => __('Crea una nueva lección'),
    'description' => __('Crea nuevas lecciones y consulta el estado de tus lecciones.')
])

<div class="container-fluid mt--7">
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">{{ __('Lecciones' )}}</h3>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{ route('lessons.create') }}" class="btn btn-sm btn-primary">Agregar Lección</a>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">Título</th>
                                <th scope="col">Categoría</th>
                                <th scope="col">Satus</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody id="LessonsTable">
                            @foreach ($lessons as $lesson)
                            <tr>
                                <td>{{ Str::limit($lesson->title, 30, $end = '...') }}</td>
                                <td>{{ $lesson->category->title}}</td>
                                <td><span class="badge badge-primary">Pendiente</span></td>
                                <td class="text-right">
                                    <div class="dropdown">
                                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                            <a class="dropdown-item"
                                                href="{{ route('lessons.edit', ['id' => $lesson->id ]) }}">Editar</a>
                                            <button class="dropdown-item delete-lesson" value="{{ $lesson->id }}"
                                                data-toggle="modal" data-target="#DeleteModal">Eliminar</button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer py-4">
                    <nav class="d-flex justify-content-end" aria-label="...">
                    </nav>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.footers.auth')
</div>


@endsection