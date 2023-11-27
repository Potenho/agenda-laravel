@extends('main')

@section('content')
    <div class=''>
        <div class='shadow-md rounded-[10px] w-[80%] m-auto my-6 h-fit'>
            <div
                class='flex {{ $category['backgroundColor'] ? 'bg-[#' . $category['backgroundColor'] . ']' : 'bg-green-700' }} rounded-t-[10px] items-center p-1'>
                <img loading="lazy"
                    class='{{ $category['pfpColor'] ? 'bg-[#' . $category['pfpColor'] . ']' : 'bg-blue-950' }} relative rounded-full top-5 left-2 border-4 border-[#ffffff]'
                    width="64" height="64" src="{{ asset($category['image']) }}" alt="">
                <div class='text-[20px] text-white mx-4'>{{ $category['name'] }}</div>
            </div>
            <div class='bg-white flex flex-col rounded-[10px] p-5 rounded-t-[0px] gap-y-2'>
                <div>{{ $category['description'] }}</div>
                @if ($category->posts->count() == 0)
                    <div class='text-[12px] text-gray-400 border-t-2 py-2'>Há nenhuma postagem. Seja o primeiro a postar.
                    </div>
                @else
                    <div class='text-[12px] text-gray-400 border-t-2 py-2'>Ultima postagem em:
                        {{ $category->posts->last()['created_at'] }}</div>
                @endif


                @include('pages.partials.create-post')

                
                @foreach ($category->posts->sortByDesc('created_at') as $post)
                    @if ($post->post_id != null)
                        @continue
                    @endif
                    @include('pages.partials.post')
                @endforeach
                <div class='border-b-2'></div>

            </div>
        </div>
    </div>
    @include('pages.partials.post-js')
@endsection
