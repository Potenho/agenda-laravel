<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src='https://cdn.tailwindcss.com'></script>
    <title>Agenda</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
</head>
<!--<body class='bg-no-repeat bg-gradient-to-t from-[#ffe5e0] to-[#f1dcff] min-h-screen'> -->
<body class='bg-[#FFEED9]'>
    <header class='bg-white shadow-[#fbac8d78] shadow-2xl whitespace-nowrap'>
        <nav class='flex justify-between mx-auto w-[92%]'>
            <!-- Logo -->
            <div class=' text-[#eb9183] flex'>
                <a href='/' class='flex items-center'>
                    @include('pages.partials.logo-icon')
                </a>
            </div>
            <!-- Menu -->
            <div class='hidden text-[#eb9183] md:flex w-auto'>
                <ul class='flex items-center space-x-10'>
                    <li>
                        <a class="hover:text-[#AAAAAA] {{ auth()->check() ? '' : 'invisible' }}" href="{{ route('todos.index') }}">Minha
                            Tarefas</a>
                    </li>
                    <li>
                        <a class='hover:text-[#AAAAAA] {{ auth()->check() ? '' : 'invisible' }}'
                            href="#">Eventos</a>
                    </li>

                </ul>
            </div>
            <!-- Login -->
            <div class=' hidden md:flex items-center space-x-10'>
                @if (auth()->check())
                    <p>Logado | <b>{{ auth()->user()->username }}</b></p>
                    <a href="{{ route('login.destroy') }}" class='bg-[#e76565] text-[#ffffff] hover:bg-[#7ba0e4] rounded-2xl p-2 transition-colors'>Sair</a>
                @else
                    <a href="{{ route('login.index') }}"
                        class='{{ request()->route()->getName() != 'login.index'? 'text-[#eb9183] hover:text-[#AAAAAA]': 'text-[#AAAAAA]' }}'>
                        Entre em sua conta</a>

                    <a href="{{ route('register.index') }}"
                        class='{{ request()->route()->getName() != 'register.index'? 'bg-[#e76565] text-[#ffffff] hover:bg-[#7ba0e4]': 'text-[#d4d4d4] bg-[#7ba0e4]' }} rounded-2xl p-2 transition-colors'>
                        Criar uma conta nova</a>
                @endif
            </div>
        </nav>

    </header>

    @yield('content')
</body>

</html>
