@extends('layouts.app')
@section('title')
    Dashboard
@endsection
@section('title-page')
    Bienvenido {{ auth()->user()->name }}
@endsection
@section('content')
    @if (auth()->user()->role === 1)
        {{-- Opciones Cliente --}}
    @endif

    @if (auth()->user()->role === 2)
        {{-- Opciones Administrador --}}
        <div>
            <h2>Selecciona una opción</h2>
            <div>
                <div>
                    <a href="#">Agregar Concierto</a>
                </div>
            </div>
        </div>
    @endif
@endsection


