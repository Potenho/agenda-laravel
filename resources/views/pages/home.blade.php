@extends('main')

@section('content')
    <div class='bg-white shadow-xl w-[92%] mx-auto p-10 rounded-[5px] py-15 my-[5%]'>
        @if (auth()->check())
            <h1 class='text-[40px]'>Bem-vindo(a) <b>{{ auth()->user()->username }}</b>!</h1><br>
        @else
            <h1 class='text-[40px]'>Bem-vindo!</h1><br>
        @endif
        <p>Este é um trabalho feito por <b>Renato Gross</b>, <b>Vinícios Isael</b> e <b>Guilherme Minutti</b> para a
            disciplina de
            Desenvolvimento de Sistemas Web. Criado usando <b>Laravel 10</b> e <b>Tailwind CSS</b>, o sistema é uma simples
            rede social de comunidades.</p><br>
        <a class='text-[#87C4FF] hover:underline flex items-center gap-2' href="https://github.com/Potenho/agenda-laravel">Pagina do Github</a>
    </div>
@endsection
