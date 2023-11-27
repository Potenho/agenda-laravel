@extends('main')

@section('content')
    <div class='bg-white shadow-xl w-[92%] mx-auto p-10 rounded-[5px] py-15 my-[5%]'>
        <h1 class=' font-bold'>Diagrama de Classes</h1><br>
        <img src="{{asset(config('images.images_path').'/diagramaClasse.png')}}" alt="">
    </div>
@endsection
