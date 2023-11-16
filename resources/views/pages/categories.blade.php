@extends('main')

@section('content')
    <br>
    <div class='bg-white rounded-[10px] m-auto w-fit p-3 shadow-md'>
        <h1 class='flex justify-center font-bold text-[20px] md:text-[30px] text-[#488d69]  m-auto w-fit'>
            Visite uma comunidade</h1>
    </div>

    <br>
    <div class='flex flex-col flex-wrap md:flex-row justify-center'>
        @foreach ($categories as $category)
            <div
                class='shadow-md rounded-[10px] min-w-[330px] max-w-[330px] m-6 h-fit transition-transform transform hover:scale-110'>
                <a class='h-48' href="{{ route('category.specific', $category['id']) }}">
                    <div
                        class='flex {{ $category['backgroundColor'] ? 'bg-[#' . $category['backgroundColor'] . ']' : 'bg-green-700' }} rounded-t-[10px] items-center'>
                        <img loading="lazy" class='{{ $category['pfpColor'] ? 'bg-[#' . $category['pfpColor'] . ']' : 'bg-blue-950' }} rounded-full relative top-5 left-2 border-4 border-[#ffffff]'
                            width="64" height="64" src="{{ asset($category['image']) }}" alt="">
                        <div class='text-[20px] text-white mx-4'>{{ $category['name'] }}</div>
                    </div>
                    <div class='bg-white flex flex-col rounded-[10px] p-5 rounded-t-[0px] gap-y-2'>
                        <div>{{ $category['description'] }}</div>
                        @if ($category->posts->count() == 0)
                            <div class='text-[12px] text-gray-400'>Há nenhuma postagem.</div>
                        @else
                            <div class='text-[12px] text-gray-400'>Ultima postagem em: {{ $category->posts->last()['created_at'] }}</div>
                        @endif
                    </div>
                </a>
            </div>
        @endforeach
    </div>
@endsection
