@extends('main')

@section('content')
    <div class=''>
        <a class='bg-white h-2' href="{{ route('category.index') }}">Voltar</a>
        <div class='shadow-md rounded-[10px] w-[80%] m-auto my-6 h-fit'>
            <div
                class='flex {{ $category['backgroundColor'] ? 'bg-[#' . $category['backgroundColor'] . ']' : 'bg-green-700' }} rounded-t-[10px] items-center p-1'>
                <img loading="lazy" class='{{ $category['pfpColor'] ? 'bg-[#' . $category['pfpColor'] . ']' : 'bg-blue-950' }} rounded-full relative top-5 left-2 border-4 border-[#ffffff]'
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

                @foreach ($category->posts as $post)
                    <div class='flex bg-red-600 gap-2 border-t-2 border-b-2'>
                        <div>
                            <img loading="lazy" class='{{ $post->user['pfpColor'] ? 'bg-[#' . $post->user['pfpColor'] . ']' : 'bg-blue-950' }} rounded-full'
                                width="60" height="60" src="{{ asset($post->user['pfp']) }}" alt="">
                        </div>
                        <div class='flex flex-col'>
                            <div class='flex gap-2'>
                                <b>{{ $post->user['username'] }}</b>
                                <div class='text-gray-400'>{{ $post['created_at'] }}</div>
                            </div>
                            <div class='w-[60%] bg-blue-600'>
                                {{ $post['message'] }} Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor
                                ducimus provident ratione nisi sunt ea maxime itaque. In quod provident reiciendis sunt
                                reprehenderit illum, iste laboriosam ex quidem sit neque?
                            </div>
                            @if ($post['image'] != null)
                                <div>
                                    <img loading="lazy" class='rounded-[10px]' width="400" height="300"
                                        src="{{ asset($post['image']) }}" alt="">
                                </div>
                            @endif
                            <div class='flex gap-4'>

                                <a class='w-fit flex items-center rounded-full p-2 hover:bg-green-700 transition-colors'
                                    href="">@include('pages.svg-icons.comments')
                                    {{ $post->comments->count() }} </a>
                                

                                <button type="submit"
                                    class='w-fit flex items-center rounded-full p-2 transition-colors like-button {{ $post->isAuthUserLikedPost() ? 'bg-green-700 liked' : 'bg-green-100 unliked' }} hover:bg-green-700 '
                                    data-post-id="{{ $post['id'] }}">@include('pages.svg-icons.likes')
                                    {{ $post->likes->count() }} </button>

                            </div>

                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            function handleLikeDislike(postId) {
                var likeButton = $('.like-button[data-post-id="' + postId + '"]');
                var isLiked = likeButton.hasClass('liked');

                $.ajax({
                    type: 'POST',
                    url: '/like-button',
                    data: {
                        'postId': postId,
                        'action': isLiked ? 'like' : 'unlike',
                        _token: $('meta[name="csrf-token"]').attr('content'),
                    },
                    
                    success: function(response) {
                        // Lógica para adicionar ou remover a classe ao botão com base na resposta do servidor
                        if (response.success) {

                            if (isLiked) {
                                likeButton.removeClass('liked');
                                likeButton.addClass('unliked')
                            } else {
                                likeButton.removeClass('unliked');
                                likeButton.addClass('liked')
                            }
                        }
                    },
                    error: function(xhr, status, error) {
                        // Lógica para lidar com erros na requisição AJAX
                        console.error('Erro na requisição AJAX:', status, error, isLiked ? 'unlike' : 'like');
                        // Você pode adicionar lógica adicional aqui, como exibir uma mensagem de erro
                    }
                });
            }

            $('.like-button').click(function() {
                var postId = $(this).data('post-id');
                handleLikeDislike(postId);
            });
        });
    </script>
@endsection
