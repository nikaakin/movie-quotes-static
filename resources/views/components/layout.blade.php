<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        @vite('resources/css/app.css')
    </head>
    <body class=" bg-primary">
     <div class="top-5 left-5 absolute flex gap-2">
        <x-button class=" z-10 " href="{{ route('home') }}">Home</x-button>
        @auth
            <x-button class=" z-10 " href="{{ route('dashboard') }}">Dashboard</x-button>
            <form action="{{ route('logout') }}" method="post">
                @csrf
                <x-button class=" z-10 " type="submit">Logout</x-button>
            </form> 
        @endauth
        
        @guest
            <x-button class=" z-10 " href="/register">Register</x-button>
            <x-button class=" z-10 " href="/login">Login</x-button>
        @endguest

     </div>
        <nav class="fixed flex flex-col h-full justify-center ml-14 gap-4 top-0 left-0">
            @foreach (config('language') as $lang)
                <x-button-lang :lang="$lang" href="{{ route('switchLang', $lang) }}"/>
            @endforeach
        </nav>
        {{ $slot }}
    </body>
</html>
