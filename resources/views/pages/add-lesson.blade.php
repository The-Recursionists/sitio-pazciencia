@extends('layouts.app')

@section('content')
@include('users.partials.header', [
        'title' => __('Crea una nueva lección'),
        'description' => __('Escribe el contenido de tu lección, agrega formato, videos, links y archivos.'),
        'class' => 'col-lg-7'
    ])   

<div class="container-fluid mt-7">
  <div id="editor-container">

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
      ['bold', 'italic', 'underline'],
      ['image', 'code-block']
    ]
  },
  placeholder: 'Compose an epic...',
  theme: 'snow'  // or 'bubble'
});
</script>
@endpush