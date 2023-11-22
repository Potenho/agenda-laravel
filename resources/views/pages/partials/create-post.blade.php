<div class='flex gap-2'>
    <div>
        <img loading="lazy"
            class='sm:max-w-full md:max-w-full lg:max-w-full xl:max-w-full {{ auth()->user()->pfpColor ? 'bg-[#' . auth()->user()->pfpColor . ']' : 'bg-blue-950' }} rounded-full'
            width='45px' height='45px' src="{{ asset(auth()->user()->pfp) }}" alt="">
    </div>
    <div>
        <form class='flex flex-col gap-2' method="POST" action="{{ route('post.store') }} " enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="category_id" value="{{ $category->id }} " />
            <textarea class='resize-none' id="message" maxlength='600' name="message" placeholder="O que você está pensando?"
                rows="1" cols="100" oninput="autoResize(this)"></textarea>
            <div id='imageContainer' class='hidden'>
                <div id="cancel-btn">
                    <i class="fas fa-times">b</i>
                </div>
                <div class='wrapper'>
                    <img class='imageUpload' src="" alt="">
                </div>
                <div class="file-name"></div>
            </div>

            <div class='flex items-center'>
                <label class='mr-6 hover:text-[var(--clr-a-button-hover)] hover:cursor-pointer'
                    for="image">Selecionar imagem</label>
                <input class='hidden' type="file" id="image" name="image" accept="image/*">
                <input type="submit"
                    class='cursor-pointer bg-[var(--clr-a-button)] text-[var(--clr-a-button-text)] hover:bg-[var(--clr-a-button-hover)] rounded-2xl px-3 py-2 transition-colors w-fit'
                    value="Postar">
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
    const fileName = document.querySelector(".file-name");
    const defaultBtn = document.querySelector("#image");
    const cancelBtn = document.querySelector("#cancel-btn i");
    const img = document.querySelector(".imageUpload");
    let regExp = /[0-9a-zA-Z\^\&\'\@\{\}\[\]\,\$\=\!\-\#\(\)\.\%\+\~\_ ]+$/;

    function defaultBtnActive() {
        defaultBtn.click();
    }
    defaultBtn.addEventListener("change", function() {
        const file = this.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function() {
                const result = reader.result;
                img.src = result;
                imageContainer.classList.remove('hidden');
            }
            cancelBtn.addEventListener("click", function() {
                img.src = "";
                imageContainer.classList.add('hidden');
                fileName.textContent = '';
                $('#cancel-btn i').val('');
            })
            reader.readAsDataURL(file);
        }
        if (this.value) {
            let valueStore = this.value.match(regExp);
            fileName.textContent = valueStore;
            console.log(1)
        }
    });
</script>
