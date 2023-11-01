@foreach ($errors->all() as $error)
    <div>
        <span>* {{ $error }}</span>
    </div>
@endforeach
@if (!$errors->all())
<div class='invisible'>
    <span>* O nome de usuário precisa ser preenchido!</span>
</div>
@endif
