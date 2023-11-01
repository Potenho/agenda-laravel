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

<body class='bg-no-repeat bg-gradient-to-t from-[#7aad8c] to-[#ffccc3] min-h-screen'>
    <header class='bg-[#FFFFFF] text-[#000000] shadow-[#ee8e8071] shadow-xl'>
        <nav class='flex justify-between items-center w-[92%] mx-auto'>
            <div>
                <a href='/' class='flex md:flex-row flex-col mx-auto items-center'>
                    <p class=' font-[Roboto+Condensed] text-[#c97c77] max-[770px]:hidden'><b>Tarefas e Agenda</b></p>
                    <img class='w-16' width="64" height="64" src="https://img.icons8.com/nolan/64/agenda.png"
                        alt="agenda" />
                </a>
            </div>
            <div class=''>
                <ul class='flex items-center gap-[4vw]'>
                    @if (auth()->check())
                        <li>
                            <a class='hover:text-[#AAAAAA]' href="#">Minha Agenda e Tarefas</a>
                        </li>
                        <li>
                            <a class='hover:text-[#AAAAAA]' href="#">Calendario</a>
                        </li>
                    @else
                        <li>
                            <a class='hover:text-[#AAAAAA] invisible' href="{{ route('login.index') }}">Minha Agenda e Tarefas</a>
                        </li>
                        <li>
                            <a class='hover:text-[#AAAAAA] invisible' href="{{ route('login.index') }}">Calendario</a>
                        </li>
                    @endif

                </ul>
            </div>
            <div class='flex items-center gap-[2vw]'>
                @if (auth()->check())
                    <p>Logado | <b>{{ auth()->user()->username }}</b></p>
                    <a href="{{ route('login.destroy') }}"
                        class='bg-[#e4a5ff] text-white px-5 py-2 rounded-full hover:bg-[#94dcb3] transition-all'>Sair</a>
                @else
                    @if (request()->route()->getName() != 'login.index')
                        <a href="{{ route('login.index') }}"
                            class='text-[#c97c77] px-5 py-2 rounded-full hover:text-[#92c574] transition-all'>
                            Entre em sua conta</a>
                    @else
                        <a href="{{ route('login.index') }}" class=' text-[#d0d0d0] px-5 py-2 rounded-full transition-all'>
                            Entre em sua conta</a>
                    @endif
                    @if (request()->route()->getName() != 'register.index')
                        <a href="{{ route('register.index') }}"
                            class='bg-[#e4a5ff] text-white px-5 py-2 rounded-full hover:bg-[#94dcb3] transition-all'>
                            Criar uma conta nova</a>
                    @else
                        <a href="{{ route('register.index') }}"
                            class='bg-[#89aa97] text-[#d0d0d0] px-5 py-2 rounded-full transition-all'>
                            Criar uma conta nova</a>
                    @endif
                @endif
            </div>
        </nav>

    </header>

    @yield('content')
</body>

</html>
