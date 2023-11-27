<div class='flex gap-2'>
    <div class='flex'>
        <img loading="lazy"
            class='flex-shrink-0 max-w-[45px] max-h-[45px] {{ auth()->user()->pfpColor ? 'bg-[#' . auth()->user()->pfpColor . ']' : 'bg-blue-950' }} rounded-full'
            width='45px' height='45px' src="{{ asset(auth()->user()->pfp) }}" alt="">
    </div>
    <div class='flex w-full'>
        <form class='flex flex-col gap-2 w-full' method="POST" action="{{ route('post.store') }} " enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="category_id" value="{{ $category->id }} " />
            <input type="hidden" name="post_id" value="{{ isset($post->id) ? $post->id : null }} " />
            <textarea class='block resize-none focus:outline-none focus:ring-0 w-[60%] max-w-[100vh]' id="message" maxlength='600' name="message" placeholder="O que você está pensando?"
                rows="1" oninput="autoResize(this)"></textarea>
            <div id='imageContainer' class='hidden bg-gray-500 rounded-[10px] w-fit'>
                <div id="cancel-btn" class='absolute'>
                    <i class="fas fa-time">
                        <div class='invert hover:cursor-pointer'>@include('pages.svg-icons.close')</div>
                    </i>
                </div>
                <div class='wrapper'>
                    <img class='imageUpload rounded-[10px]' src="" alt="" width="120px" height="100px">
                </div>
            </div>

            <div class='flex items-center'>
                <label id='imageSelect' class='mr-6 hover:text-[var(--clr-a-button-hover)] hover:cursor-pointer'
                    for="image">Selecionar imagem</label>
                <input class='hidden' type="file" id="image" name="image" accept="image/*">
                <button type="submit" id='submit'
                    class='button-spin relative cursor-pointer bg-[var(--clr-a-button)] text-[var(--clr-a-button-text)] hover:bg-[var(--clr-a-button-hover)] rounded-md px-3 py-2 transition-colors w-fit'>Postar</button>
            </div>

        </form>
    </div>

</div>


<script>
    function autoResize(textarea) {
        textarea.style.height = 'auto'; // Redefine a altura para auto
        textarea.style.height = (textarea.scrollHeight) + 'px'; // Define a altura conforme o conteúdo
    }
</script>

<script>
    const imageContainer = document.querySelector('#imageContainer')
    const wrapper = document.querySelector(".wrapper");
    const defaultBtn = document.querySelector("#image");
    const cancelBtn = document.querySelector("#cancel-btn i");
    const img = document.querySelector(".imageUpload");
    const imageSelect = document.querySelector("#imageSelect");
    let regExp = /[0-9a-zA-Z\^\&\'\@\{\}\[\]\,\$\=\!\-\#\(\)\.\%\+\~\_ ]+$/;

    function defaultBtnActive() {
        defaultBtn.click();
    }

    img.addEventListener('click', function() {
        defaultBtnActive();
    })

    defaultBtn.addEventListener("change", function() {
        const file = this.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function() {
                const result = reader.result;
                img.src = result;
                imageContainer.classList.remove('hidden');
                //imageSelect.classList.add('hidden');
            }
            cancelBtn.addEventListener("click", function() {
                img.src = "";
                $('#image').val('');
                $('input').trigger('input');
                imageContainer.classList.add('hidden');
                //imageSelect.classList.remove('hidden');
                $('#cancel-btn i').val('');
            })
            reader.readAsDataURL(file);
        }
        if (this.value) {
            let valueStore = this.value.match(regExp);
            console.log(1)
        }
    });
</script>

<script>
    $(document).ready(function() {

        // Associa um manipulador de eventos ao evento de entrada (input) de um elemento
        $('#submit').prop('disabled', true);
        $('#submit').addClass('bg-[#A0A0A0]');
        $('#submit').removeClass('hover:bg-[var(--clr-a-button-hover)]');

        $('input, textarea').on('input', function() {
            // Código a ser executado quando o valor do input é alterado
            console.log('Valor do input alterado:', $(this).val());
            var inputsNaoOcultos = $('input:not([type=hidden]), textarea');

            // Verifica se todos os campos estão vazios
            var todosVazios = true;

            inputsNaoOcultos.each(function() {
                if ($.trim($(this).val()) !== '') {
                    todosVazios = false;
                    return false; // Interrompe o loop, pois pelo menos um campo não está vazio
                }
            });

            $('#submit').prop('disabled', todosVazios);

            if (todosVazios){
                $('#submit').addClass('bg-[#A0A0A0]');
                $('#submit').removeClass('hover:bg-[var(--clr-a-button-hover)]');
            } else {
                $('#submit').removeClass('bg-[#A0A0A0]');
                $('#submit').addClass('hover:bg-[var(--clr-a-button-hover)]');
            }
        });
    });
</script>
