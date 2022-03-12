@extends('layouts.app')
@section('pageTitle', 'Lecciones Pendientes')
@section('content')
@include('users.partials.header', [
'title' => __('Lecciones pendientes'),
'description' => __('Aprueba o solicita cambios en una lección.'),
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
                                <th scope="col">Área</th>
                                <th scope="col">Estado</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody id="LessonsTable">
                            @foreach ($pending_lessons as $lesson)
                            <tr>
                                <td>
                                    {{ Str::limit($lesson->title, 30, $end = '...') }}
                                    <a href={{ route('lesson.public', ['id' => $lesson->id]) }}>
                                        <i class="fas fa-external-link-alt"></i>
                                    </a>
                                </td>
                                <td>{{ $lesson->area->title}}</td>
                                <td><span class="badge badge-primary">{{ $lesson->status }}</span></td>
                                <td class="text-right">
                                    <div>
                                        <button class="btn btn-sm btn-success approve-lesson" value="{{ $lesson->id }}" data-toggle="modal" data-target="#ApproveModal">Aprobar</button>
                                        <button class="btn btn-sm btn-danger reject_lesson" value="{{ $lesson->id }}"
                                            data-toggle="modal" data-target="#RejectModal">Rechazar</button>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{-- TODO: Center it --}}
                <div class="container text-right">
                    {{-- Pagination --}}
                    {{ $pending_lessons->links() }}
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
{{-- Approve Modal --}}
<div class="modal fade" id="ApproveModal" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="largeModalLabel">Aprobar Lección</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form method="POST" id="ApproveForm" enctype="multipart/form-data" class="form-horizontal">
                @csrf
                <div class="modal-body">
                    <p>¿Está seguro que desea aprobar esta lección?</p>
                    <p>La lección se publicará una vez sea aprobada.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Aprobar</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Reject Modal --}}
<div class="modal fade" id="RejectModal" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="largeModalLabel">Rechazar Lección</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form method="POST" id="RejectForm" enctype="multipart/form-data" class="form-horizontal">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="reject_reason">Razón de rechazo</label>
                        <textarea class="form-control" name="reject_reason" cols="30" rows="10"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Rechazar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('js')
<script>
    $('#LessonsTable').on('click', '.approve-lesson', function (event) {
        event.preventDefault();
        var lesson_id = $(this).val();
        $('#ApproveForm').attr('action', '/approve_lesson/' + lesson_id);
    });

    $('#LessonsTable').on('click', '.reject_lesson', function (event) {
        event.preventDefault();
        var lesson_id = $(this).val();
        $('#RejectForm').attr('action', '/reject_lesson/' + lesson_id);
    });

</script>

@endpush
