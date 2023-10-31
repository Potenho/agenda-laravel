<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    <title>Agenda</title>
</head>

<body>
    <div class='text-white bg-black px-3 py-10 text-right'>
        @if (auth()->check())
            <p>Logado |<b>{{ auth()->user()->username }}</b></p>
            <a class='' href="{{ route('login.destroy') }}">Sair</a>
        @else
            @if (request()->route()->getName() != 'login.index')
                <a class='text-white hover:text-green-300 m-2' href="{{ route('login.index') }}">Logar</a>
            @endif
            @if (request()->route()->getName() != 'register.index')
                <a class='text-white hover:text-green-300 m-2'href="{{ route('register.index') }}">Registrar</a>
            @endif

        @endif
    </div>
    @yield('content')
</body>

</html>
