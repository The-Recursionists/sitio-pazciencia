@extends('layouts.app', ['class' => 'bg-default'])
<link rel="stylesheet" href="{{ asset('css/landing-page.css') }}">
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
                <polygon style="fill:#fff" points="2560 0 2560 100 0 100"></polygon>
            </svg>
        </div>
    </div>
    <div class="py-8 text-dark" style="background-color:#fff">
        <div class="container">
            <div class="row introduction">
                <div class="col-sm-12 col-md-6">
                    <h1><span>MISIÓN</span>MISIÓN</h1>
                    <div class="introduction-card">
                        <div class="introduction-card--shadow">
                            <div class="introduction-card__content">
                                MEDIANTE UN PROGRAMA EDUCATIVO BASADO EN LA EQUIDAD E IGUALDAD DE RAZA, SEXO, ORIGEN, IDIOMA, COLOR DE PIEL O CUALQUIER OTRA ÍNDOLE, BRINDAR A NIÑOS, ADOLESCENTES, ADULTOS Y ADULTOS MAYORES, ACCESO A UNA EDUCACIÓN DE CALIDAD, TRABAJANDO CONJUNTAMENTE CON ENTIDADES ESTATALES Y PRIVADAS.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-hidden col-md-2"></div>
                <div class="col-sm-12 col-md-4">
                    <div class="introduction-card">
                        <div class="introduction-card--shadow">
                            <div class="introduction-card__content">
                                LOGRAR QUE LOS ESTUDIANTES DE POBLACIONES RURALES Y URBANAS DE ESCASOS RECURSOS, TENGAN UNA NUEVA CULTURA EDUCATIVA A FAVOR DEL DESARROLLO INTELECTUAL Y ÉTICO DEL PERÚ.

                            </div>
                        </div>
                    </div>
                    <h1><span>VISIÓN</span>VISIÓN</h1>
                </div>
            </div>
            <div class="row py-5">
                <div class="col col-12 col-md-6 order-2 order-md-1">
                    <img src="/argon/img/lapiz_verde.png" alt="Crew Pazciencia" class="img-fluid">
                </div>
                <div class="col col-12 col-md-6 order-1 order-md-2 mb-4 mb-md-0">
                    <h2 class="bold text-dark">Nuestra misión</h2>
                    Somos un equipo basado en la equidad, justicia y respeto que busca llevar planes educativos de calidad donde no los hay y mejorar los existentes; despertando así en las personas la conciencia que el conocimiento debe servir para la construcción de una mejor sociedad.
                </div>
            </div>
            <div class="row py-5">
                <div class="col col-12 col-md-6 mb-4">
                    <h2 class="bold text-dark">Nuestra visión</h2>
                    Lograr que las personas tengan una nueva cultura educativa a favor del desarrollo intelectual y ético del Perú.
                </div>
                <div class="col col-12 col-md-6">
                    <img src="/argon/img/lapiz_verde.png" alt="Crew Pazciencia" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
@endsection
