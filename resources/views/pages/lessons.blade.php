@extends('layouts.app')

@section('content')
@include('users.partials.header', [
'title' => __('Lecciones publicadas'),
'description' => __('Las últimas lecciones publicadas en Pazciencia'),
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
                        <tbody id="LessonsTable">
                            @foreach ($lessons as $lesson)
                            <tr>
                                <td>{{ Str::limit($lesson->title, 25, $end = '...') }}</td>
                                <td>{{ $lesson->category->title}}</td>
                                <td>{{ $lesson->user->name }}</td>
                                {{--  <td>{{ $user->role->name }}</td> --}}
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
{{-- Delete Modal --}}
<div class="modal fade" id="DeleteModal" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="largeModalLabel">Eliminar Lección</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form method="POST" id="DeleteForm" enctype="multipart/form-data" class="form-horizontal">
                @csrf
                @method('DELETE')
                <div class="modal-body">
                    <p>¿Está seguro que desea eliminar esta lección de la base de datos?</p>
                    <p>Esta acción no se puede revertir.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Eliminar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('js')
<script>
    $('#LessonsTable').on('click', '.delete-lesson', function (event) {
        event.preventDefault();
        var lesson_id = $(this).val();
        $('#DeleteForm').attr('action', '/lecciones/' + lesson_id);
    });
</script>
@endpush