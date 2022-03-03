@extends('layouts.app')
@section('pageTitle', 'Áreas')
@section('content')
@include('users.partials.header', [
    'title' => "Áreas de Lecciones",
    'description' => "Agrega, edita o elimina Áreas",
])
<div class="container-fluid mt--7">
    <div class="card shadhow">
        <div class="card-header border-0">
            <div class="d-flex justify-content-between">
                <h3 class="mb-0">Áreas</h3>
                <a href={{ route('areas.create') }} class="btn btn-sm btn-primary">Agregar Área</a>
            </div>
        </div> <!-- end card-header -->
        <div class="card-body">
            <div class="table-responsive">
                <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                        <th scope="col">Área</th>
                        <th scope="col">Lecciones</th>
                        <th scope="col"></th>
                    </thead>
                    <tbody>
                        @foreach($areas as $area)
                        <tr>
                            <td>{{ $area->title }}</td>
                            <td>{{ $area->lessons_count }}</td>
                            <td class="text-right">
                                <div class="dropdown">
                                    <a class="btn btn-sm btn-icon-only text-light" href="#" role="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                        <a class="dropdown-item" href="{{ route('areas.edit', ['area' => $area->id ]) }}">
                                            <i class="fas fa-edit"></i>
                                            Editar
                                        </a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div> <!-- end .table-responsive -->
        </div> <!-- end .card-body -->
    </div> <!-- end .card -->
    @include('layouts.footers.auth')
</div>
@endsection>
