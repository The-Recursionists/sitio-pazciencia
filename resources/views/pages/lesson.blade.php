@extends('layouts.app')

@section('content')
    @include('users.partials.header', [
    'title' => $lesson->title,
    'description' => __('Quizá aquí podemos agregar una descripción de la lección, con mucho texto no se ve mal Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos ex fugiat corrupti et voluptatem ipsam cum voluptas vel ullam, itaque minima, atque deleniti modi tempore. Reiciendis recusandae mollitia consequuntur labore fugit molestias qui vitae, itaque perferendis molestiae, accusantium, ipsa voluptatum doloribus tenetur! Aperiam, nam alias!'),
    'class' => 'col-lg-7'
    ])
    <div class="container-fluid mt-7">
        <div id="content">
            {!! $lesson->content !!}    
        <div>
    </div>
@endsection