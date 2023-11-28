<script>
    var classLikeRequest = "bg-[var(--clr-like-request)]";
    var classLikeRequestHover = "hover:bg-[var(--clr-like-request)]";
    var classLikeLiked = "bg-[var(--clr-like-liked)]";
    var classLikeUnliked = "bg-[var(--clr-like-unliked)]";

    var classComments = "bg-[var(--clr-comments)]";
    var classCommenstRequest = "bg-[#00000000]"; //bg-[var(--clr-comments-request)]

    $(document).ready(function() {
        function handleLikeDislike(postId) {
            var likeButton = $('.like-button[data-post-id="' + postId + '"]');
            var isLiked = likeButton.hasClass('liked');
            var action = isLiked ? 'like' : 'unlike';

            likeButton.addClass(classLikeRequest);
            likeButton.addClass(classLikeRequestHover);
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
                    likeButton.removeClass(classLikeRequestHover);

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
                    likeButton.removeClass(classLikeRequestHover);
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

        $('.comments-button').click(function() {
            $(this).removeClass(classComments);
            $(this).addClass(classCommenstRequest);
        });
    });
</script>
