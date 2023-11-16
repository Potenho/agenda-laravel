<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src='https://cdn.tailwindcss.com'></script>
    <title>eFood</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link type="image/png" sizes="16x16" rel="icon" href=".../icons8-social-16.png">
    <link rel="icon" href="{{ asset('favicon.png') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<!--<body class='bg-no-repeat bg-gradient-to-t from-[#ffe5e0] to-[#f1dcff] min-h-screen'> -->

<body class='bg-no-repeat bg-gradient-to-t  to-[#ffe5e0] from-[#ffdcf5] min-h-screen'>
    <header
        class='bg-gradient-to-t  from-[#fff1ef] to-[#ffffff] shadow-md whitespace-nowrap fixed left-0 right-0 top-0 z-30'>
        <nav class='flex justify-between mx-auto w-[92%]'>
            <!-- Logo -->
            <div class=' text-[#87C4FF] flex p-2'>
                <a href='/' class='flex items-center gap-[3%]'>
                    @include('pages.partials.logo-icon')
                    <b class='text-[30px]'>eFood</b>
                </a>
            </div>
            <!-- Menu -->
            <div class='hidden text-[#87C4FF] md:flex w-auto text-[17px]'>
                <ul class='flex items-center space-x-10'>
                    <li>
                        <a class="transition-colors hover:text-[#AAAAAA] {{ auth()->check() ? '' : 'invisible' }}"
                            href="{{ route('category.index') }}">Comunidades</a>
                    </li>
                </ul>
            </div>
            <!-- Login -->
            <div class=' hidden md:flex items-center space-x-10'>
                @if (auth()->check())
                    <a href="{{ route('config.index') }}" class='flex items-center space-x-2'>
                        <p>Logado | <b>{{ auth()->user()->username }}</b></p>
                        <img class='{{ 'bg-[#' . auth()->user()->pfpColor . ']' }} rounded-full relative border-4 border-[#ffffff]'
                            width="50" height="50" src="{{ asset(auth()->user()->pfp) }}" alt="">
                    </a>
                    <a
                        href="{{ route('login.destroy') }}"class='bg-[var(--clr-a-button)] text-[var(--clr-a-button-text)] hover:bg-[var(--clr-a-button-hover)] rounded-2xl px-3 py-2 transition-colors w-fit'>Sair</a>
                @else
                    <a href="{{ route('login.index') }}"
                        class='{{ request()->route()->getName() != 'login.index'? 'text-[#87C4FF] hover:text-[#AAAAAA]': 'text-[#AAAAAA]' }}'>
                        Entre em sua conta</a>

                    <a href="{{ route('register.index') }}"
                        class='{{ request()->route()->getName() != 'register.index'? 'bg-[#87C4FF] text-[#ffffff] hover:bg-[#39A7FF]': 'text-[#d4d4d4] bg-[#7ba0e4]' }} rounded-2xl p-2 transition-colors'>
                        Criar uma conta nova</a>
                @endif
            </div>
        </nav>

    </header>
    <div class='pt-[80px]'>
        @yield('content')
    </div>

</body>

</html>
