@extends('layouts.app')

@section('content')
@include('users.partials.header', [
'title' => __('Modifica una lección'),
'description' => __('Actualiza la información de la lección'),
'class' => 'col-lg-7'
])

<div class="container-fluid mt-7">
  <div id="form-container" class="container">
  <form id="add_lesson" target="/lecciones/{{ $lesson->id }}/editar" method="POST">
      @csrf
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label for="display_name">Título de la lección</label>
            <input class="form-control" name="title" type="text" value="{{ $lesson->title }}"/>
          </div>
          <div class="form-group">
            <label for="category">Categoría</label>
            <input class="form-control" name="category" type="text" value=""/>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <input name="content" type="hidden">
          <div id="editor-container"></div>
        </div>
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

<script>
  var quill = new Quill('#editor-container', {
    modules: {
      toolbar: [
        [{ header: [1, 2, false] }],
        ['bold', 'italic'],
        ['link', 'blockquote', 'code-block', 'image'],
        [{ list: 'ordered' }, { list: 'bullet' }]
      ]
    },
    placeholder: 'Escribe una lección...',
    theme: 'snow'
  });

  quill.setContents({!! $lesson->content !!})

  var form = document.querySelector('#add_lesson');

  form.onsubmit = function () {
    // Populate hidden input on submit
    var content = document.querySelector('input[name=content]');
    content.value = JSON.stringify(quill.getContents());
  };
</script>
@endpush
