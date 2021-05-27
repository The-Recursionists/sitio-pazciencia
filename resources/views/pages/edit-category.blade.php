@extends('layouts.app')

@section('content')
@include('users.partials.header', [
    'title' => __('Modifica una categoría'),
    'description' => __('Actualiza la información de la categoría'),
])

<div class="container-fluid mt-7">
  <div id="form-container" class="container">
  <form id="add_lesson" action="/categorias/{{ $category->id }}/editar" method="POST">
      @csrf
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label for="display_name">Título de la categoría</label>
            <input class="form-control" name="title" type="text" value="{{ $category->title }}"/>
          </div>
        </div>
      </div>
      <div class="row my-6">
        <div class="col-md-6">
          <button class="btn btn-primary" type="submit">Actualizar categoría</button>
        </div>
      </div>
    </form>
  </div>
</div>

@endsection
