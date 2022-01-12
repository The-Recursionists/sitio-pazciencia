@extends('layouts.app')

@section('content')
@include('users.partials.header', [
'title' => __('Crea una nueva lección'),
'description' => __('Escribe el contenido de tu lección, agrega formato, videos, links y archivos.'),
'class' => 'col-lg-7'
])
<div class="container-fluid mt-7">
  <div id="form-container" class="container">
    <form id="add_lesson" target="/lecciones/crear" method="POST">
      @csrf
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label for="display_name">Título de la lección</label>
            <input class="form-control" name="title" type="text" value="">
          </div>
          <div class="form-group">
            <label for="category">Categoría</label>
            {{-- <input class="form-control" name="category" type="text" value=""> --}}
            <select name="category_id" class="form-control">
              @foreach ($categories as $category)
                  <option value="{{ $category->id }}">{{ $category->title }}</option>
              @endforeach
            </select>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <input name="content" type="hidden">
          <div id="editor-container">

          </div>
        </div>
      </div>
      {{-- Reference table --}}
      <div class="row my-6">
        <div class="text-right col-sm-12 my-3">
          <div id="NewReference" class="btn btn-sm btn-success">
            Agregar referencia
          </div>
        </div>
        <table class="table" id="ReferencesTable">
          <thead>
            <tr>
              <th class="col-xs-12 col-sm-6">Referencia</th>
              <th class="col-xs-12 col-sm-5">Enlace (url)</th>
              <th class="col-xs-12 col-sm-1"></th>
            </tr>
          </thead>
          <tbody>
              <tr id="CloneTemplate" class="d-none">
                <td>
                    <textarea type="text" class="form-control title" aria-label="Referencia"></textarea> 
                </td>
                <td>
                    <input type="text" class="form-control reference_url">
                </td>
                <td class="text-right">
                  <a href="#" class="text-default delete-template-unsaved">
                    <span>x</span>
                  </a>
                </td>
              </tr>
              <tr>
                <td>
                    <textarea name="data[references][0][title]" type="text" class="form-control title" aria-label="Referencia"></textarea> 
                </td>
                <td>
                    <input name="data[references][0][url]" type="text" class="form-control reference_url">
                </td>
                <td class="text-right">
                  <a href="#" class="text-default delete-template-unsaved">
                    <span>x</span>
                  </a>
                </td>
              </tr>
          </tbody>
        </table>
      </div>
      <div class="row my-6">
        <div class="col-md-6">
          <button class="btn btn-primary" type="submit">Guardar lección</button>
        </div>
      </div>
    </form>
  </div>
</div>

@endsection

@push('js')
<script src="{{ asset('assets') }}/vendor/quill/dist/quill.min.js"></script>
<script src="{{ asset('js') }}/lessons/add-lesson.js"></script>
<script>
  var quill = new Quill('#editor-container', {
    modules: {
      toolbar: [
        [{ header: [1, 2, false] }],
        ['bold', 'italic'],
        ['link', 'blockquote', 'image', 'video'],
        [{ list: 'ordered' }, { list: 'bullet' }]
      ]
    },
    placeholder: 'Escribe una lección...',
    readOnly: false,
    theme: 'snow'
  });

  var form = document.querySelector('#add_lesson');

  form.onsubmit = function () {
    var content = document.querySelector('input[name=content]');
    content.value = quill.container.firstChild.innerHTML;
  };
</script>
@endpush
