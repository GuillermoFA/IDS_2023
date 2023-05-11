<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite('resources/css/app.css')
    @vite('resources/css/app.js')
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Melody - @yield('title')</title>
</head>

<body class="bg-cyan-800">
    <header class="p-5 border-b border-blue-400 bg-blue-400">
        <div class="container mx-auto flex justify-between items-center">
            @auth
                <a href="{{ route('dashboard') }}" class="text-2xl font-black uppercase">
                    <img src="{{ asset('img/logo-Melody.jpg') }}" class="h-16 rounded">
                </a>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="font-bold uppercase hover:text-white transition">Cerrar Sesión</button>
                </form>
            @endauth
            @guest
                <a href="{{ route('home') }}" class="text-2xl font-black uppercase">
                    <img src="{{ asset('img/logo-Melody.jpg') }}" class="h-16 rounded">
                </a>
                <nav class="flex flex-col gap-2 items-center">
                    <script src="https://unpkg.com/flowbite@1.4.0/dist/flowbite.js"></script>
                    <a href="{{ route('login') }}" class="font-bold uppercase hover:text-white">Iniciar Sesión</a>
                    <a href="{{ route('register') }}" class="font-bold uppercase hover:text-white">Crear Cuenta</a>
                </nav>
            @endguest
        </div>
    </header>
    <main class="container mx-auto mt-10">
        <h2 class="text-white font-bold text-center text-3xl mb-10 uppercase">@yield('title-page')</h2>
        @yield('content')
    </main>
    <footer class="text-white text-center p-5 font-bold uppercase">
        Melody - Todos los derechos reservados {{ now()->year }}
    </footer>
</body>

</html>
