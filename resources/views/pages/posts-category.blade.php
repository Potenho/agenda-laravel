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
                                <div class='flex pr-4 '>

                                    <a class='w-fit flex items-center rounded-full p-2 m-1 hover:bg-green-700 transition-colors'
                                        href="">@include('pages.svg-icons.comments')
                                        {{ $post->comments->count() }} </a>


                                    <button
                                        class='w-fit flex items-center rounded-full p-2 m-1 transition-colors like-button hover:bg-[var(--clr-like-hover)] {{ $post->isAuthUserLikedPost() ? 'bg-[var(--clr-like-liked)] unliked' : 'bg-[var(--clr-like-unliked)] liked' }} '
                                        data-post-id="{{ $post->id }}">@include('pages.svg-icons.likes')
                                        <p class='like-count' data-post-id="{{ $post->id }}">
                                            {{ $post->likes->count() }}</p>
                                    </button>
                                </div>

                            </div>
                        </div>
                    </a>
                @endforeach
                <div class='border-b-2'></div>

            </div>
        </div>
    </div>
    <script>
        var classLikeRequest = "bg-[var(--clr-like-request)]";
        var classLikeLiked = "bg-[var(--clr-like-liked)]";
        var classLikeUnliked = "bg-[var(--clr-like-unliked)]";

        $(document).ready(function() {
            function handleLikeDislike(postId) {
                var likeButton = $('.like-button[data-post-id="' + postId + '"]');
                var isLiked = likeButton.hasClass('liked');
                var action = isLiked ? 'like' : 'unlike';

                likeButton.addClass(classLikeRequest);
                likeButton.removeClass(classLikeLiked);
                likeButton.removeClass(classLikeUnliked);

                $.ajax({
                    type: 'POST',
                    url: '/post/like-button',
                    data: {
                        'postId': postId,
                        'action': isLiked ? 'like' : 'unlike',
                        _token: $('meta[name="csrf-token"]').attr('content'),
                    },

                    success: function(response) {
                        // Lógica para adicionar ou remover a classe ao botão com base na resposta do servidor
                        likeButton.removeClass(classLikeRequest);

                        if (response.error === 'no_such_like') {
                            likeButton.removeClass('unliked');
                            likeButton.addClass('liked');
                            likeButton.addClass(classLikeLiked);
                            likeButton.removeClass(classLikeUnliked);
                        }
                        if (response.success) {

                            updateLikesCount(response.likesCount, postId)

                            if (isLiked) {
                                likeButton.addClass(classLikeLiked);
                                likeButton.removeClass(classLikeUnliked);
                                likeButton.removeClass('liked');
                                likeButton.addClass('unliked');

                            } else {
                                likeButton.removeClass(classLikeLiked);
                                likeButton.addClass(classLikeUnliked);
                                likeButton.removeClass('unliked');
                                likeButton.addClass('liked');
                            }
                        }
                    },
                    error: function(xhr, status, error) {
                        likeButton.removeClass(classLikeRequest);
                        console.log(1);
                        // Lógica para lidar com erros na requisição AJAX
                        console.error('Erro na requisição AJAX:', status, error, isLiked ? 'unlike' :
                            'like');
                        // Você pode adicionar lógica adicional aqui, como exibir uma mensagem de erro
                    }
                });
            }

            function updateLikesCount(likesCount, postId) {
                // Atualizar a interface do usuário para refletir o novo contador de likes
                console.log(postId);
                $('.like-count[data-post-id=' + postId + ']').text(likesCount);
            }

            $('.like-button').click(function() {
                var postId = $(this).data('post-id');
                handleLikeDislike(postId);
            });
        });
    </script>
@endsection
