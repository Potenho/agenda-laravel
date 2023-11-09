@extends('main')

@section('content')
    <div class='flex items-center  mx-0 px-0 justify-center my-[9%] w-screen '>
        <div class='bg-[#ffffff] flex  py-10 rounded-2xl shadow-md'>
            <div class='flex flex-col'>
                <div class='pl-10 text-black bg-[#c4845010] bg-clip-content text-[13px]'>
                    Não possui uma conta?
                    <a class='text-[#87C4FF] hover:underline' href="{{ route('register.index') }}"> <b> Crie uma conta agora. </b></a>
                </div>
                <div class='p-10'>
                    <form action="{{ route('login.store') }}" method='POST'>
                        @csrf
                        <label class='text-black' for="username">Nome de Usuário</label><br>
                        <input class='rounded-[3px] border-2 border-gray-400' type='text' name='username' id='username'
                            value={{ old('username') }}><br><br>
                        <label class='text-black' for="password">Senha</label><br>
                        <input class='rounded-[3px] border-2 border-gray-400' type='password' name='password' id='password'><br><br>
                        <input
                            class='bg-[#ed817b] text-white px-5 py-2 rounded-full hover:bg-[#87C4FF] transition-all hover:cursor-pointer'
                            type='submit' value='Logar'>
                    </form>
                </div>
            </div>

            <div class='p-10'>
                @include('pages.partials.for-errors')
            </div>
        </div>

    </div>
@endsection
