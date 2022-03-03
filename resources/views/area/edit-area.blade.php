@extends('layouts.app')
@section('pageTitle', 'Editar Área')
@section('content')
@include('users.partials.header', [
    'title' => __('Modifica una área'),
    'description' => __('Actualiza la información del área'),
])

<div class="container-fluid mt-7">
  <div id="form-container" class="container">
  <form id="add_lesson" action="/areas/{{ $area->id }}/editar" method="POST">
      @csrf
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label for="display_name">Título del área</label>
            <input class="form-control" name="title" type="text" value="{{ $area->title }}"/>
          </div>
        </div>
      </div>
      <div class="row my-6">
        <div class="col-md-6">
          <button class="btn btn-primary" type="submit">Actualizar área</button>
        </div>
      </div>
    </form>
  </div>
</div>

@endsection
