@extends('main')

@section('content')
    <div class=''>
        <a class='bg-white h-2' href="{{ route('category.index') }}">Voltar</a>
        <div class='shadow-md rounded-[10px] w-[80%] m-auto my-6 h-fit'>
            <div
                class='flex {{ $category['backgroundColor'] ? 'bg-[#' . $category['backgroundColor'] . ']' : 'bg-green-700' }} rounded-t-[10px] items-center p-1'>
                <img class='{{ $category['pfpColor'] ? 'bg-[#' . $category['pfpColor'] . ']' : 'bg-blue-950' }} rounded-full relative top-5 left-2 border-4 border-[#ffffff]'
                    width="64" height="64" src="{{ asset($category['image']) }}" alt="">
                <div class='text-[20px] text-white mx-4'>{{ $category['name'] }}</div>
            </div>
            <div class='bg-white flex flex-col rounded-[10px] p-5 rounded-t-[0px] gap-y-2'>
                <div>{{ $category['description'] }}</div>
                @if ($category->posts->count() == 0)
                    <div class='text-[12px] text-gray-400 border-t-2 py-2'>Há nenhuma postagem.</div>

                @else
                    <div class='text-[12px] text-gray-400 border-t-2 py-2'>Ultima postagem em:
                        {{ $category->posts[0]['created_at'] }}</div>
                @endif

            </div>
        </div>
    </div>
@endsection
