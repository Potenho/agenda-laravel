@extends('main')

@section('content')
    <a href="{{ route('register.index') }}">Registrar</a>
    <form action="{{ route('login.store') }}" method='POST'>
        @csrf
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div>
                    <span>{{ $error }}</span>
                </div>
            @endforeach
        @endif
        <input type='text' name='username' id='username' value={{ old('username') }}><br>
        <input type='password' name='password' id='password'><br>

        <input type='submit' value='logar'>
    </form>
@endsection
