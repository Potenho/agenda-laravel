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
                <div><a href="{{ route('category.specific', $category['id']) }}">< Voltar para os posts da comunidade</a></div>

                <div class='border-b-2'>
                    <div class='flex flex-col pt-2 gap-2 border-t-2'>
                        <div class='flex gap-x-3'>
                            <img loading="lazy"
                                class='flex-shrink-0 max-h-[45px] max-w-[45px] {{ $post->user['pfpColor'] ? 'bg-[#' . $post->user['pfpColor'] . ']' : 'bg-blue-950' }} rounded-full'
                                width='45px' height='45px' src="{{ asset($post->user['pfp']) }}" alt="">
                            <div class='flex gap-2'>
                                <b>{{ $post->user['username'] }}</b>
                                <div class='text-gray-400'>{{ $post['created_at'] }}</div>
                            </div>
                        </div>
                        <div class='flex flex-col w-full'>

                            <div class='w-[60%] pb-2 mr-auto break-words flex-grow max-w-[100vh] text-[20px]'>

                                {!! nl2br($post['message']) !!}

                            </div>
                            @if ($post['image'] != null)
                                <div>
                                    <img loading="lazy" class='rounded-[10px]' width="400" height="300"
                                        src="{{ asset($post['image']) }}" alt="">
                                </div>
                            @endif
                            <div class='flex p-0 m-0 justify-items-stretch relative right-2'>

                                <a class='comments-button bg-[var(--clr-comments)] w-fit flex items-center p-2 rounded-full transition-all transform hover:scale-110 hover:bg-[var(--clr-comments-hover)]'
                                    href="{{ route('category.specific', ['id' => $category['id'], 'post_id' => $post->id]) }}">@include('pages.svg-icons.comments')
                                    {{ $post->comments->count() }} </a>


                                <button
                                    class='w-fit flex fill-red-800 text-red-800 items-center p-2 rounded-full transition-all transform hover:scale-110 like-button hover:bg-[var(--clr-like-hover)] {{ $post->isAuthUserLikedPost() ? 'bg-[var(--clr-like-liked)] unliked' : 'bg-[var(--clr-like-unliked)] liked' }} '
                                    data-post-id="{{ $post->id }}">@include('pages.svg-icons.likes')
                                    <p class='like-count' data-post-id="{{ $post->id }}">
                                        {{ $post->likes->count() }}</p>
                                </button>
                                
                            </div>

                        </div>
                    </div><br>

                </div>
                

                <div class='italic'>Responder {{$post->user->username}}:</div>
                @include('pages.partials.create-post')

                @if ($post->comments->count() == 0)
                    <div class='text-[12px] text-gray-400 border-t-2 py-2'>Há nenhum comentário. Seja o primeiro comentar.
                    </div>
                @endif


                @foreach ($post->comments->sortByDesc('created_at') as $post)
                    @include('pages.partials.post')
                @endforeach
                <div class='border-b-2'></div>

            </div>
        </div>
    </div>
    @include('pages.partials.post-js')
@endsection
