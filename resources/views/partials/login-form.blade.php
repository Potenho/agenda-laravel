@extends('main')

@section('content')
    <div class='flex items-center  mx-0 px-0 justify-center my-[9%] w-screen '>
        <div class='bg-[#905569] flex  py-10 rounded-2xl'>
            <div class='flex flex-col'>
                <div class='pl-10 text-white bg-[#c4845010] bg-clip-content text-[13px]'>
                    Não possui uma conta?
                    <a class='text-[#ff9892] hover:underline' href="{{ route('register.index') }}"> Crie uma conta agora.</a>
                </div>
                <div class='p-10'>
                    <form action="{{ route('login.store') }}" method='POST'>
                        @csrf
                        <label class='text-white' for="username">Nome de Usuário</label><br>
                        <input class='rounded-[3px]' type='text' name='username' id='username'
                            value={{ old('username') }}><br><br>
                        <label class='text-white' for="password">Senha</label><br>
                        <input class='rounded-[3px]' type='password' name='password' id='password'><br><br>
                        <input
                            class='bg-[#ed817b] text-white px-5 py-2 rounded-full hover:bg-[#94dcb3] transition-all hover:cursor-pointer'
                            type='submit' value='Logar'>
                    </form>
                </div>
            </div>

            <div class='p-10'>
                @include('partials/for-errors')
            </div>
        </div>

    </div>
@endsection
