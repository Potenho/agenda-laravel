<a class='' href="#">
    <div class='flex pt-2 gap-2 border-t-2'>
        <div class='flex'>
            <img loading="lazy"
                class='flex-shrink-0 sm:max-w-full md:max-w-full lg:max-w-full xl:max-w-full {{ $post->user['pfpColor'] ? 'bg-[#' . $post->user['pfpColor'] . ']' : 'bg-blue-950' }} rounded-full'
                width='45px' height='45px' src="{{ asset($post->user['pfp']) }}" alt="">
        </div>
        <div class='flex flex-col'>
            <div class='flex gap-2'>
                <b>{{ $post->user['username'] }}</b>
                <div class='text-gray-400'>{{ $post['created_at'] }}</div>
            </div>

            <div class='w-[100%] pb-2 mr-auto break-words flex-grow max-w-[100vh]'>

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
                    href="">@include('pages.svg-icons.comments')
                    {{ $post->comments->count() }} </a>


                <button
                    class='w-fit flex items-center p-2 rounded-full transition-all transform hover:scale-110 like-button hover:bg-[var(--clr-like-hover)] {{ $post->isAuthUserLikedPost() ? 'bg-[var(--clr-like-liked)] unliked' : 'bg-[var(--clr-like-unliked)] liked' }} '
                    data-post-id="{{ $post->id }}">@include('pages.svg-icons.likes')
                    <p class='like-count' data-post-id="{{ $post->id }}">
                        {{ $post->likes->count() }}</p>
                </button>
            </div>

        </div>
    </div>
</a>
