@foreach ($errors->all() as $error)
    <div class=' w-60 bg-[#eb6464] text-[#FFFFFF] p-1 rounded-md m-2 italic shadow-md'>
        <span><b>*</b> {{ $error }}</span>
    </div>
@endforeach
@if (session('success'))
    <div class=' w-60 bg-[#76d795] text-[#FFFFFF] p-1 rounded-md m-2 italic shadow-md'>
        <span><b>*</b> {{ session('success') }}</span>
    </div>
@else
    <div class=' w-60 bg-[#d77676] text-[#FFFFFF] invisible p-1 rounded-md m-2 italic'></div>
@endif
