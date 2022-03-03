@extends('layouts.app')
@section('pageTitle', 'Crear Área')
@section('content')
@include('users.partials.header', [
    'title' => __('Crea una nueva área'),
    'description' => __('Introduce el título de la nueva área.')
])

<div class="container-fluid mt-7">
  <div id="form-container" class="container">
    <form id="add_area" action="/areas/crear" method="POST">
      @csrf
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label for="display_name">Título del Área</label>
            <input class="form-control" name="title" type="text" value="">
          </div>
        </div>
      </div>
      <div class="row my-6">
        <div class="col-md-6">
          <button class="btn btn-primary" type="submit">Guardar área</button>
        </div>
      </div>
    </form>
  </div>
</div>

@endsection
