@extends('layouts.app', ['class' => 'bg-default'])

@section('content')
    <div class="header bg-gradient-primary py-7 py-lg-8">
        <div class="container">
            <div class="header-body text-center mt-7 mb-7">
                <div class="row justify-content-center">
                    <div class="col-lg-5 col-md-6">
                        <img class="img-fluid mb-3" src="/argon/img/brand/white.png" alt="Pazciencia"/>
                        <h1 class="text-white">{{ __('La educación como acto de rebeldía.') }}</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="separator separator-bottom separator-skew zindex-100">
            <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
                <polygon style="fill:#85C6AA" points="2560 0 2560 100 0 100"></polygon>
            </svg>
        </div>
    </div>
    <div class="py-8 text-dark" style="background-color:#85C6AA">
        <div class="container">
            <div class="row py-5">
                <div class="col col-12 col-md-6 order-2 order-md-1">
                    <img src="https://via.placeholder.com/600x400" alt="Crew Pazciencia" class="img-fluid">
                </div>
                <div class="col col-12 col-md-6 order-1 order-md-2 mb-4 mb-md-0">
                    <h2 class="bold text-dark">Nuestra misión</h2>
                    Elit consectetur perspiciatis optio cumque sapiente. Doloremque voluptatibus inventore harum quos temporibus. Nostrum amet quae quo ut nemo Dolore accusamus laudantium nobis inventore perferendis ipsam, maxime nihil. Accusantium accusamus blanditiis.
                </div>
            </div>
            <div class="row py-5">
                <div class="col col-12 col-md-6 mb-4">
                    <h2 class="bold text-dark">Nuestra visión</h2>
                    Numquam laudantium dolores reprehenderit necessitatibus vitae Excepturi id incidunt vitae doloribus ipsa Atque amet fuga molestias culpa dolorum. Itaque distinctio quibusdam dolores eos voluptatibus.
                </div>
                <div class="col col-12 col-md-6">
                    <img src="https://via.placeholder.com/600x400" alt="Crew Pazciencia" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
@endsection
