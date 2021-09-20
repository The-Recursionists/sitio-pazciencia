@extends('layouts.app')

@section('content')
@include('users.partials.header', [
    'title' => "Categorías de Lecciones",
    'description' => "Agrega, edita o elimina categorías para lecciones",
])
<div class="container-fluid mt--7">
    <div class="card shadhow">
        <div class="card-header border-0">
            <div class="d-flex justify-content-between">
                <h3 class="mb-0">Categorías</h3>
                <a href={{ route('categories.create') }} class="btn btn-sm btn-primary">Agregar categoría</a>
            </div>
        </div> <!-- end card-header -->
        <div class="card-body">
            <div class="table-responsive">
                <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                        <th scope="col">Categoría</th>
                        <th scope="col">Lecciones</th>
                        <th scope="col"></th>
                    </thead>
                    <tbody>
                        @foreach($categories as $category)
                        <tr>
                            <td>{{ $category->title }}</td>
                            <td>{{ $category->lessons_count }}</td>
                            <td class="text-right">
                                <div class="dropdown">
                                    <a class="btn btn-sm btn-icon-only text-light" href="#" role="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                        <a class="dropdown-item" href="{{ route('categories.edit', ['category' => $category->id ]) }}">
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
