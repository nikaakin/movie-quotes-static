<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Movie Quotes</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link rel="shortcut icon" type="image/x-icon" href="favicon.png">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        @vite('resources/css/app.css')
    </head>
    <body class=" bg-radial-dark min-h-screen block">
        <nav class="fixed flex flex-col h-full justify-center ml-14 gap-4 top-0 left-0">
            @foreach (config('language') as $lang)
                <x-button-lang :lang="$lang" href="{{ route('switchLang', $lang) }}"/>
            @endforeach
        </nav>
        {{ $slot }}
    </body>
</html>
