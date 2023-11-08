<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src='https://cdn.tailwindcss.com'></script>
    <title>Agenda</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link type="image/png" sizes="16x16" rel="icon" href=".../icons8-social-16.png">
</head>
<!--<body class='bg-no-repeat bg-gradient-to-t from-[#ffe5e0] to-[#f1dcff] min-h-screen'> -->
<body class='bg-[#FFEED9]'>
    <header class='bg-white shadow-md whitespace-nowrap'>
        <nav class='flex justify-between mx-auto w-[92%]'>
            <!-- Logo -->
            <div class=' text-[#87C4FF] flex p-2'>
                <a href='/' class='flex items-center gap-[3%]'>
                    @include('pages.partials.logo-icon')
                    <b class='text-[30px]'>eFood</b>
                </a>
            </div>
            <!-- Menu -->
            <div class='hidden text-[#87C4FF] md:flex w-auto'>
                <ul class='flex items-center space-x-10'>
                    <li>
                        <a class="hover:text-[#AAAAAA] {{ auth()->check() ? '' : 'invisible' }}" href="{{ route('categories.index') }}">Comunidades</a>
                    </li>
                </ul>
            </div>
            <!-- Login -->
            <div class=' hidden md:flex items-center space-x-10'>
                @if (auth()->check())
                    <p>Logado | <b>{{ auth()->user()->username }}</b></p>
                    <a href="{{ route('login.destroy') }}" class='bg-[#87C4FF] text-[#ffffff] hover:bg-[#39A7FF] rounded-2xl p-2 transition-colors'>Sair</a>
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

    @yield('content')
</body>

</html>
