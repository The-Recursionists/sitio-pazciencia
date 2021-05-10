@extends('layouts.app')

@section('content')
@include('users.partials.header', [
'title' => __('Listado de Lecciones'),
'description' => __('Edita, elimina o agrega nuevas lecciones'),
'class' => 'col-lg-7'
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

                <div class="col-12">
                </div>

                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">Título</th>
                                <th scope="col">Categoría</th>
                                <th scope="col">Creador</th>
                                {{-- <th scope="col">Role</th> --}}
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($lessons as $lesson)
                            <tr>
                                <td>{{ Str::limit($lesson->title, 25, $end = '...') }}</td>
                                <td>{{ $lesson->category_id }}</td>
                                <td>{{ $lesson->user_id }}</td>
                                {{--  <td>{{ $user->role->name }}</td> --}}
                                <td class="text-right">
                                    <div class="dropdown">
                                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                            <a class="dropdown-item" href="{{ route('lessons.edit', ['id' => $lesson->id ]) }}">Editar</a>
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
