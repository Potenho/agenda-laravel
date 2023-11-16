<div class='flex gap-2'>
    <div>
        <img loading="lazy"
        class='sm:max-w-full md:max-w-full lg:max-w-full xl:max-w-full {{ auth()->user()->pfpColor ? 'bg-[#' . auth()->user()->pfpColor . ']' : 'bg-blue-950' }} rounded-full'
        width='45px' height='45px' src="{{ asset(auth()->user()->pfp) }}" alt="">
    </div>
    <div>
        <form class='flex flex-col gap-2' method="POST" action="{{ route('post.store') }} " enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="category_id" value="{{$category->id}} " />
            <textarea id="message" maxlength='600' name="message" placeholder="O que você está pensando?" rows="1" cols="100" oninput="autoResize(this)"></textarea>
            <input type="file" id="image" name="image" accept="image/*">
            <input type="submit"
                class='cursor-pointer bg-[var(--clr-a-button)] text-[var(--clr-a-button-text)] hover:bg-[var(--clr-a-button-hover)] rounded-2xl px-3 py-2 transition-colors w-fit'
                value="Postar">
        </form>
    </div>

</div>

<script>
    function autoResize(textarea) {
        textarea.style.height = 'auto'; // Redefine a altura para auto
        textarea.style.height = (textarea.scrollHeight) + 'px'; // Define a altura conforme o conteúdo
    }
</script>