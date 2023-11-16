@extends('main')

@section('content')
    <div class='bg-white shadow-md rounded-[10px] w-[80%] mx-auto my-6 h-fit p-2 flex flex-col'>
        <h1>
            Configurações
        </h1>
        <div class='flex'>
            <img class='{{ 'bg-[#' . $user->pfpColor . ']' }} rounded-full relative border-4 border-[#ffffff]'
                width="64" height="64" src="{{ asset($user->pfp) }}" alt="">
            <div class='flex flex-col'>
                
            </div>
        </div>
    </div>
@endsection
