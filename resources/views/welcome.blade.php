
@extends('layouts.app')
@section('title')
    Inicio
@endsection
@section('title-page')
    <div class="container">
        <div class="mb-4">
            <h1 class="text-center">Bienvenido a Melody</h1>
        </div>
    </div>
@endsection

@section('content')

    <div class="container">
        <div class="mb-4 justify-content-md-center">

            {{-- agregando un slider de imagenes --}}
            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{ asset('img/concierto.jpg') }}" class="d-block rounded img-fluid mx-auto" alt="concert-image-1">
                    </div>
                    <div class="carousel-item">
                        <img src="https://cdn-3.expansion.mx/dims4/default/eb121a7/2147483647/strip/true/crop/1260x833+0+0/resize/1200x793!/format/webp/quality/60/?url=https%3A%2F%2Fcdn-3.expansion.mx%2F79%2F82%2F447e001b42a6ae180281dee501e0%2Fistock-1330424071.jpg" class="d-block rounded img-fluid mx-auto" alt="concert-image-2">
                    </div>
                    <div class="carousel-item">
                        <img src="https://s3.amazonaws.com/rtvc-assets-senalcolombia.gov.co/s3fs-public/styles/imagen_noticia/public/field/image/conciertos-febrero-2023-portada.jpg?itok=aS2rPuTP" class="d-block rounded img-fluid mx-auto" alt="concert-image-3">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>

    </div>
@endsection
