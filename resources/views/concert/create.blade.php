
@extends('layouts.app')
@section('title')
    Crear Concierto
@endsection
@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="font-weight-bold text-3xl card-header customYellow text-center">
                        <h4>Crear concierto</h4>
                    </div>
                    <div class="card-body rounded-5">
                        <form action="{{ route('concert')}}" method="POST" novalidate>
                            @csrf
                            <div class="mb-3 font-weight-bold text-3xl textRegister">
                                <label for="name" class="form-label">Nombre</label>
                                <input type="text"  id="name" name="name" placeholder="Ingrese el nombre del concierto" class="form-control
                            @error('name')
                                textRed
                            @enderror">
                                @error('name')
                                    <p class="textRed my-2 rounded-lg text-lg p-2">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3 font-weight-bold text-3xl textRegister">
                                <label for="ticket_price" class="form-label">Precio</label>
                                <input type="price" placeholder="Ingrese el precio" id="price" name="price" class="form-control
                            @error('price')
                                    textRed
                            @enderror">
                                @error('price')
                                    <p class="textRed my-2 rounded-lg text-lg p-2">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3 font-weight-bold text-3xl textRegister">
                                <label for="stock" class="form-label">Stock de entradas</label>
                                <input type="stock" placeholder="Ingrese stock de entradas" id="stock" name="stock" class="form-control
                            @error('stock')
                                textRed
                            @enderror">
                                @error('stock')
                                    <p class="textRed my-2 rounded-lg text-lg p-2">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3 font-weight-bold text-3xl textRegister">
                                <label for="date" class="form-label">Fecha</label>
                                <input type="date" placeholder="Ingrese la fecha" id="date" name="date" class="form-control
                            @error('password')
                                textRed
                            @enderror">
                                @error('password')
                                    <p class="textRed my-2 rounded-lg text-lg p-2">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class= "text-center rounded-5">
                                <button type="submit" class="customYellow " >Registrar</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
