@extends('layouts.app')
@section('title')
    Dashboard
@endsection
@section('title-page')
    <div class="container">
        <div class="mb-4">
            <h1 class="text-center">Bienvenido {{ auth()->user()->name }}</h1>
        </div>
    </div>
@endsection
@section('content')
    @if (auth()->user()->role === 1)
        {{-- Opciones Cliente --}}
        {{-- mostrar los conciertos disponibles --}}
    @endif

    @if (auth()->user()->role === 2)
        {{-- Opciones Administrador --}}
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body rounded-5">
                            <div>
                                <a href="{{ route('concert.create') }}" class="text-center rounded-5 customYellow">Agregar Concierto</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection


