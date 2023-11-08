@extends('main')

@section('content')
    <br>
    <h1 class='flex justify-center font-bold'>Visite uma comunidade.</h1>
    <br>
    <div class='flex flex-col flex-wrap md:flex-row justify-center'>
        @foreach ($categories as $category)
            <div
                class='shadow-md rounded-[10px] min-w-[330px] max-w-[330px] m-6 h-fit transition-transform transform hover:scale-110'>
                <a class='h-48' href=" # ">
                    <div
                        class='flex {{ $category['backgroundColor'] ? 'bg-['.$category['backgroundColor'].']' : 'bg-green-700' }} rounded-t-[10px] items-center'>
                        <img class='{{ $category['pfpColor'] ? 'bg-['.$category['pfpColor'].']' : 'bg-blue-950' }} rounded-full relative top-5 left-2 border-4 border-[#ffffff]'
                            width="64" height="64" src="{{ asset($category['image']) }}" alt="">
                        <div class='text-[20px] text-white mx-4'>{{ $category['name'] }}</div>
                    </div>
                    <div class='bg-white flex flex-col rounded-[10px] p-5 rounded-t-[0px] gap-y-2'>
                        <div>{{ $category['description'] }}</div>
                        <div class='text-[12px] text-gray-400'>Ultima postagem em: {{ $category['updated_at'] }}</div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
@endsection
