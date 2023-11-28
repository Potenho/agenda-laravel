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
    <link rel="icon" href="{{ asset('favicon.ico') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
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
            <div class='flex items-center gap-x-5 text-[#87C4FF]'>
                <a href="{{ route('home.index') }}" class='hover:text-[#39A7FF]'>Paginal Inicial</a>
                <a href="{{ route('home.documentation') }}" class='hover:text-[#39A7FF]'>Documentação</a>
                <a href="{{ route('category.index') }}" class='hover:text-[#39A7FF]'>Comunidades</a>
            </div>
            <!-- Login -->
            <div class=' hidden md:flex items-center space-x-10'>
                @if (auth()->check())
                    <div class='flex items-center space-x-2'>
                        <p>Logado | <b>{{ auth()->user()->username }}</b></p>
                        <img class='{{ 'bg-[#' . auth()->user()->pfpColor . ']' }} rounded-full relative border-4 border-[#ffffff]'
                            width="50" height="50" src="{{ asset(auth()->user()->pfp) }}" alt="">
                    </div>
                @else
                    <a href="{{ route('login.index') }}"
                        class='{{ request()->route()->getName() != 'login.index'? 'text-[#87C4FF] hover:text-[#AAAAAA]': 'text-[#AAAAAA]' }}'>
                        Entre em sua conta</a>

                    <a href="{{ route('register.index') }}"
                        class='{{ request()->route()->getName() != 'register.index'? 'bg-[#87C4FF] text-[#ffffff] hover:bg-[#39A7FF]': 'text-[#d4d4d4] bg-[#7ba0e4]' }} rounded-md p-2 transition-colors'>
                        Criar uma conta nova</a>
                @endif
                <div class="hidden relative md:inline-block text-left">
                    <button id="dropdown-btn" type="button"
                        class="inline-flex justify-center items-center py-2border border-transparent p-1 font-semibold text-white focus:outline-none focus:ring focus:border-blue-300">
                        <div class=''>@include('pages.svg-icons.menu')</div>
                    </button>

                    <div id="dropdown-menu"
                        class="origin-top-right absolute top-[25px] right-0 mt-2 w-56 rounded-md shadow-lg transition-all bg-white ring-1 ring-black ring-opacity-5 hidden">
                        <div class="py-1" role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
                            <a href="{{ route('home.index') }}"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 focus:bg-gray-300"
                                role="menuitem">Página Inicial </a>
                            <a href="{{ route('home.documentation') }}"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 focus:bg-gray-300 border-b-2"
                                role="menuitem">Documentação do Sistema</a>
                            @if (!auth()->check())
                                <a href="{{ route('login.index') }}"
                                    class="block px-4 py-2 text-sm text-blue-700 hover:bg-gray-100 focus:bg-gray-300 border-b-2"
                                    role="menuitem">Fazer Login </a>
                                <a href="{{ route('register.index') }}"
                                    class="block px-4 py-2 text-sm text-purple-700 hover:bg-gray-100 focus:bg-gray-300"
                                    role="menuitem">Criar Conta </a>
                            @else
                                <a href="{{ route('category.index') }}"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 focus:bg-gray-300 border-b-2"
                                    role="menuitem">Comunidades </a>
                                <!--<a href="#"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 focus:bg-gray-300"
                                    role="menuitem">Configurações</a>-->
                                <a href="{{ route('login.destroy') }}"
                                    class="block px-4 py-2 text-sm text-red-500 hover:bg-gray-100 focus:bg-gray-300"
                                    role="menuitem">Sair</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </nav>

    </header>
    <div class='pt-[80px]'>
        @yield('content')
    </div>

</body>

<script>
    // jQuery para tornar o menu dropdown interativo com focus e cliques nas opções
    $(document).ready(function() {
        $('#dropdown-btn').on('click', function() {
            $('#dropdown-menu').toggleClass('hidden'); // Alternar a visibilidade do menu
        });

        $('.button-spin').on('click', function() {
            $(this).html('<i class="fas fa-spinner fa-spin"></i>');
        })

        // Fechar o menu ao clicar fora do botão
        $(document).on('click', function(event) {
            if (!$(event.target).closest('#dropdown-btn').length && !$(event.target).closest(
                    '#dropdown-menu').length) {
                $('#dropdown-menu').addClass('hidden');
            }
        });
    });
</script>

</html>
